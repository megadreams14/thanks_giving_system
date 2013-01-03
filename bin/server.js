var express = require('express');
var app = express.createServer(); 
var io = require('socket.io').listen(app);
var fs = require('fs');

var mysql = require('mysql');
var conf = require('./conf');

var client = mysql.createClient({
        user: conf.MYSQL_USER,
        password: conf.MYSQL_PASS
});
client.query('USE ' + conf.DATABASE);



var answer_log_file = 'logs/answer.log';
var acsses_log_file = 'logs/acsses.log';

//var app.listen(8080);
app.listen(8124);


//localhost:8124にアクセスしてきた時に呼ばれる
app.get('/', function (req, res) {
    res.sendfile(__dirname + '/index.html');
    
    var text = get_now_time() + ' '
                + req.connection.remoteAddress + ' '
                + req.headers['user-agent'] + ' '
                + '\n';
    write_data(text, acsses_log_file);    
    console.log('ようこそ');
    res.cookie('rememberme', 'yes', { expires: new Date(Date.now() + 900000), httpOnly: true });
    
 
//    console.log("ua is "+JSON.stringify(req.headers['user-agent']));
    //他ヘッダー
//    console.log("headers is "+JSON.stringify(req.headers));

});
    
app.configure(function () {
    app.use(express.static(__dirname));    
});
    

io.configure(function () {
// socket.ioのログ出力を抑制する
    io.set('log level', 1);
});
    
function get_now_time () {
    var now   = new Date();
    var year  = now.getFullYear();  //年
    var month = now.getMonth() + 1; //月
    var day   = now.getDate();      //日
    var hour  = now.getHours(); 　  //時
    var min   = now.getMinutes();   //分
    var sec   = now.getSeconds();   //秒

    // 数値が1桁の場合、頭に0を付けて2桁で表示する指定
    if (hour < 10) hour = "0" + hour;
    if (min < 10)  min = "0" + min; 
    if (sec < 10)  sec = "0" + sec; 

    return  year + '/' + month + '/' + day + ' ' + hour + ':' + min + ':' + sec;
}

//ファイル書き込みメソッド　引数は書き込み文字とファイル名
function write_data(text_data, file_name) {
    var fd = fs.openSync(file_name, "a");
    fs.writeSync(fd, text_data, -1, "utf-8");
    fs.closeSync(fd);
}

var total_question_num = 0;
var root_user_id;
var add_q_id;
var question_answer;

//問題リストの取得
var question_list = new Array();
//以下ランキングで使用する
var rankingAnswer;
var question_start_time;

io.sockets.on('connection', function (socket) {
    console.log('on connect');
    
    //名前が入力されたらここにアクセスが来る
    socket.on('first_access', function(name){
       console.log(name);

       //DBにユーザ情報を照会する
       
       //cookieにユーザIDを保存する

       //自分のみに返信する       
     　 sockets.emit('to_second_page', name);
    });
    
    
    //管理者から問題開始の合図があれば，送信する
    //data：クイズタイトル クイズグループID クイズNum
    socket.on('admin_opening_start', function(data){
        root_user_id = socket.id; 
        console.log(data);

        //クイズのタイトルをユーザに返す
      　socket.broadcast.emit('question_title', data);
    });
    
    
    
    //出題された時の処理
    socket.on('admin_question_start', function (data) {
        
        //operaterのsocket_idが変わっていないかチェックする
        
        console.log(data);

        question_list.push(data);
        
        //ユーザに問題番号と内容を送信する
     　socket.broadcast.emit('question_start', data);
    });
    
    //問題文を表示する
    socket.on('admin_open_question_view', function (data) {
        
        //operaterのsocket_idが変わっていないかチェックする
        
        console.log(data);
        
        //ユーザに問題番号と内容を送信する
     　socket.broadcast.emit('open_question_view', data);
    }); 
    
    //回答受付開始
    socket.on('admin_answer_start', function (startTime) {
        
        //operaterのsocket_idが変わっていないかチェックする
        
        console.log(startTime);
        
        
        question_start_time = startTime;
        //ユーザに問題番号と内容を送信する
     　socket.broadcast.emit('answer_start', null);
    }); 
    
    //アンサーチェック    
    socket.on('admin_answer_check', function (data) {
        console.log(data);
        
        
        //DBからランキングを取得する
        var num = question_list.length - 1;
        console.log(question_list);

        var selectCount = new Object();
        
        var sql = 'select count(*) as count from answer_infos where question_list_id = ' + question_list[num]['id'] + ' AND answer = "a" AND created_at > ' + question_start_time + ' ORDER BY time'; 
        client.query(sql, function (err, result) {
            if (err === null) {
                console.log(result);
                selectCount.a = result;
                
            } else {
                console.log('問題リストから問題データを取得出来ませんでした');
            }
        });
        sql = 'select count(*) as count from answer_infos where question_list_id = ' + question_list[num]['id'] + ' AND answer = "b" AND created_at > ' + question_start_time + ' ORDER BY time'; 
        client.query(sql, function (err, result) {
            if (err === null) {
                console.log(result);
                selectCount.b = result;
            } else {
                console.log('問題リストから問題データを取得出来ませんでした');
            }
        });
        sql = 'select count(*) as count from answer_infos where question_list_id = ' + question_list[num]['id'] + ' AND answer = "c" AND created_at > ' + question_start_time + ' ORDER BY time'; 
        client.query(sql, function (err, result) {
            if (err === null) {
                console.log(result);
                selectCount.c = result;
            } else {
                console.log('問題リストから問題データを取得出来ませんでした');
            }
        });
        sql = 'select count(*) as count from answer_infos where question_list_id = ' + question_list[num]['id'] + ' AND answer = "d" AND created_at > ' + question_start_time + ' ORDER BY time'; 
        client.query(sql, function (err, result) {
            if (err === null) {
                console.log(result);
                selectCount.d = result;

                
            } else {
                console.log('問題リストから問題データを取得出来ませんでした');
            }
        });        
        setTimeout(function(){
            console.log(selectCount);
            //自分以外
            socket.broadcast.emit('answer_check', selectCount);            
        }, 600);

        
    });
    
    //回答を送信する
    
    socket.on('admin_answer_view', function (data) {
        console.log(data);
        rankingAnswer = data['answer'];
        //自分以外
        socket.broadcast.emit('answer_view', data);
    });


    //ランキング表示
    socket.on('admin_ranking_asc', function (data) {
        //DBからランキングを取得する
        var num = question_list.length - 1;
        console.log(question_list);
        var sql = 'select * from answer_infos where question_list_id = ' + question_list[num]['id'] + ' AND answer = "' + rankingAnswer + '" AND created_at > ' + question_start_time + ' ORDER BY time'; 
        console.log(sql);
        client.query(sql, function (err, result) {
            if (err === null) {
                console.log(result);
                //自分以外に送信
                socket.broadcast.emit('ranking_asc', result);                
            } else {
                console.log('問題リストから問題データを取得出来ませんでした');
            }
        });        
        
    });
    
    //総合成績を表示する
    
    socket.on('admin_total_ranking', function (data) {
        console.log(data);
        //自分以外
        socket.broadcast.emit('total_ranking', data);
    });
    
    
/*
        question_id = data['id'];
        console.log('問題を受信：番号＝' + question_id);

        //問題番号が送られてきた
        //DBに問題を取得しに行く
        var sql = 'select * from question where id = ' + question_id;
        client.query(sql, function (err, results) {
            if (err === null) {
                //取得したquestion_idを出題問題情報DBへ登録する
                question_id = results[0]['id'];
                question_answer = results[0]['answer'];

                var sql = 'INSERT INTO set_question_info (question_id ) VALUES (' + question_id + ')';
                client.query(sql, function (err, results) {
                    if (err !== null) {
                        console.log('出題問題情報に登録できませんでした！');
                    } else {
                        //出題情報に登録されているIDをグローバルで使用する
                        // もう１回DBに問い合わせてIDを取得する
                        var sql = "SELECT LAST_INSERT_ID() as add_id FROM set_question_info";

                        client.query(sql, function (err, results) {
                            if (err !== null) {
                                console.log('出題問題からID取れない');
                            } else {
                                add_q_id = results[0]['add_id'];
                              
                            }

                        });
                    }
                });
                
                //クライアントに送信
                var send = {'data':results, 'total_num':data['num']};
                socket.broadcast.emit('get_question', send);
                
            } else {
                console.log('問題リストから問題データを取得出来ませんでした');
            }
        
        });

        return ;        
        //ログとして問題を書き出す
        
        var text = '\n - - - - - \n';
        text += 'total_num:' + data['total_num'] + ', ';
        text += 'question_num:' + data['question_num'] + ', ';
        text += 'question:' + data['question'] + ', ';
        text += 'select_a:' + data['select_a'] + ', ';
        text += 'select_b:' + data['select_b'] + ', ';
        text += 'select_c:' + data['select_c'] + ', ';
        text += 'select_d:' + data['select_d'] + ', ';
        text += 'answer:' + data['answer'] + '\n';

        write_data(text, answer_log_file);    
    });
*/            
/*
    //問題文を表示する 
    socket.on('question_start_flag', function (data) {
        //自分以外
        socket.broadcast.emit('get_question_display', data);
    });




    //回答を受け付け開始！
    var answer_flag = false;
    socket.on('answer_start_flag', function (data) {
        answer_flag = true;
        //自分以外
        socket.broadcast.emit('answer_start', data);
    });


    //回答情報をデータベースに保持する
    socket.on('question_answer', function (data) {
        var sql = 'INSERT INTO answer_info (user_name, set_q_id, answer_time, user_select ) VALUES ("' + data['name']   + '",' + add_q_id    + ','+ data['time']   + ',' + data['answer'] + ')';
        client.query(sql, function (err, results) {
           if (err !== null) {
               console.log('回答情報に登録できませんでした！');
           } else {
                //管理者に情報を送信する
                io.sockets.socket(root_user_id).emit('answer_data', data);
           }
       });

        
    });

    //回答者の人数を表示する
    socket.on('people_num_flag', function () {
        //DBに回答者の情報を取得しに行く
//        var sql ='SELECT * FROM answer_info where set_q_id = ' + add_q_id +' and user_select = 1'; 
        var sql ='SELECT * FROM answer_info where set_q_id = ' + add_q_id; 

        //1と答えた人
        client.query(sql, function (err, results) {
           if (err !== null) {
               console.log('回答者人数を取得できません');
           } else {
                var select_a = [];
                var select_b = [];
                var select_c = [];
                var select_d = [];
               
               //１〜４ごとに分けてデータを代入する
               for (var i = 0; i < results.length; i++) {
                   var answer_num = results[i]['user_select'];
                   if (answer_num === 1) {
                       select_a.push(results[i]);
                   } else if (answer_num === 2) {
                       select_b.push(results[i]);
                   } else if (answer_num === 3) {
                       select_c.push(results[i]);
                   } else if (answer_num === 4) {
                       select_d.push(results[i]);
                   }
               }
               
               console.log('選択肢Aの人');
               console.log(select_a);
               console.log('選択肢Bの人');
               console.log(select_b);
               console.log('選択肢Cの人');
               console.log(select_c);
               console.log('選択肢Dの人');
               console.log(select_d);


                var select_data = {'select_a' : select_a,
                                   'select_b' : select_b,
                                   'select_c' : select_c,
                                   'select_d' : select_d };

                //自分以外
                socket.broadcast.emit('people_num', select_data);
           }

        });       
    });



    //回答表示
    socket.on('answer_check_flag', function () {

        //自分以外
//        socket.broadcast.emit('answer_check', question_answer);
    });
    
    //ランキング表示
    socket.on('ranking_check_flag', function () {
        //自分以外
        socket.broadcast.emit('ranking_check', null);
    });
    
    */
});