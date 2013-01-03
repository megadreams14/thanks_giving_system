var page = document.querySelectorAll('.page');

//ソケット通信用
var socket = io.connect('http://'+  document.domain +':8124'); 
 
//問題取得
var question_list = new Array();

var userNmae;

//音楽を再生する
function audioStart (fileName) {
    var audio = new Audio('assets/' + fileName);
    audio.play();
}

//sectionエリアのビューを見えなくする
function view_clone() {
    $.each($('.main-contents section'), function(i, data) {
        $(data).hide();
    });
}

//名前入力画面から次のページヘ
function to_second_page () {
     var myName = $("#name-input").val();
     userNmae = myName;

    //ここで名前を送信し，接続情報の登録を行う
     socket.emit('first_access', myName);
 }
 
 
 
 //名前登録が完了し，データを受信した時の処理
socket.on('to_second_page', function (name) {
    $('.myname').text(name);
    
     //画面の切替
    $('.first-page').hide();
    $('.second-page').show();   
});

//問題が始まったらオープニングを流す
socket.on('question_title', function (data) {
    console.log(data);
     //画面の切替
    view_clone();
    $('.question-title-area').show();
    $('.title').text(data['title']);
    
    
    //オープニングの音楽を流す
//    audioStart('audio/questionStart.mp3');
    
});


//出題された問題を取得し，第何問と表示する
socket.on('question_start', function (data) {
    console.log(data);
    //出された問題を
    question_list.push(data);
    
     //画面の切替
    view_clone();
    
    $('.question-area').show();
    
    $('.question-num').text(data['number']);
    $('.question-list-id').val(data['id']);
    //番号が出た時の音楽を流す
    audioStart('audio/questionStart.mp3');
    
});

//問題文を表示する
socket.on('open_question_view', function (data) {
    var num = question_list.length - 1 ;
    $('.question').text(question_list[num]['question']);
});

//回答受付開始
socket.on('answer_start', function (data) {
    view_clone();
   $('.answer-area').show();

    var num = question_list.length - 1 ;
    $('.select-a').text(question_list[num]['select_a']);
    $('.select-b').text(question_list[num]['select_b']);
    $('.select-c').text(question_list[num]['select_c']);
    $('.select-d').text(question_list[num]['select_d']); 

    audioStart('audio/questionTimer.mp3');

    //カウントダウン開始
    timer_start();
});


//カウントダウンと送信処理
var timer_count = 0;
var answer_flag = false;
var remaining_time = 10;
var timerId;
var buttons = document.querySelectorAll(".select-btn");

function timer_start () {
    
    //ボタンを押せるようにする
    for (var i = 0; i < buttons.length; i++) {
        buttons[i].disabled = false;
    }

    //タイマースタート
    timer_count = 0;
    remaining_time = 10;
    $('#timer').text(remaining_time);

    timerId = setInterval(function () {
        timer_count++;
        if (remaining_time === 0) {
            clearInterval(timerId);
            clearInterval(timerId_2);
            //ボタンを押せなくする
            //ボタンを押せなくする
            $.each($('.select-btn'), function(i, data) {
                $(data).attr('disabled','disabled');
            });
        } else {
           remaining_time--;
            $('#timer').text(remaining_time);            
        }
    }, 1000);

    timerId_2 = setInterval(function () {
        timer_count++;    
    }, 10);
}


//ボタンが押されたらの処理
$('.select-btn').click(function (){
    //タイマーを止めて回答時間を取得する
    clearInterval(timerId_2);
    var answerTime = timer_count;
    console.log(answerTime);

    //ボタンを押せなくする
    $.each($('.select-btn'), function(i, data) {
        $(data).attr('disabled','disabled');
    });
    
    //選択肢を取得する
    console.log(this.value);
    
    //問題番号IDと問題イベントIDを取得する
    

    sendData = {'answer':this.value,
        'user_name':userNmae,
        'time':answerTime,
        'question_list_id':$('.question-list-id').val()
        };
    //サーバに問題情報と共にデータを送信する
    $.ajax({
        dataType: 'json',
        url: 'http://127.0.0.1/thanks_giving_system/public/top/answer_regist/',
        data:sendData,
        type: "GET",
        success: function(data) {
               console.log(data);
        },
        error:function(msg) {
            alert('サーバでエラーが起きています');
            console.log(msg);
        }
    });


    
});



//回答情報受取
socket.on('answer_check', function (data) {
    console.log(data['a']);
    console.log(data['b']);
    console.log(data['c']);
    console.log(data['d']);
    //人数をそれぞれの枠に表示する
    $('.answer-a').text(data['a'][0]['count']);
    $('.answer-b').text(data['b'][0]['count']);
    $('.answer-c').text(data['c'][0]['count']);
    $('.answer-d').text(data['d'][0]['count']); 

    audioStart('audio/answerNum.mp3');

});

//問題の回答を受信する
socket.on('answer_view', function (data) {
    console.log(data);
    audioStart('audio/answerCheck.mp3'); 
    var count = 0;
    var animation_timer = setInterval( function () {
        count++;
        $(".area-" + data['answer']).fadeOut(300, function () { $(this).fadeIn(300) });

        if (count > 5) { 
            clearInterval(animation_timer);
        }
    }, 600, animation_timer);    
});

//トップ者を表示する
socket.on('ranking_asc', function (data) {
    console.log(data);
    
    $('.ranking-area').empty();
    var tbody;
    for (var i = 0; i < data.length; i++) {
        var rank = i + 1;
        tbody = '<div class="rank_box rank_' + rank + '">';
        tbody += '<div class="rank">' + rank + '位</div>';
        tbody += '<div class="name">' + data[i]['user_name']+ '</div>';
        tbody += '<div class="time">' + data[i]['time']+ '</div>';
        tbody += '</div>';
        $('.ranking-area').append(tbody);
    }
    
    
    view_clone();
    $('.ranking-area').show();    
    
    audioStart('audio/ranking.mp3');    

    
});

//総合成績を表示する
socket.on('total_ranking', function (data) {
    console.log(data);
    //総合成績とタイトルに表示する
    
    $('.ranking-area').show(); 
    
    
});



$(function(){
    $('.first-page').css('display','block');
    $("#name-input").keypress(function(ev) {
            if ((ev.which && ev.which === 13) || (ev.keyCode && ev.keyCode === 13)) {
                to_second_page();
                return false;
            } else {
                    return true;
            }
    });    
    
    $('.name-btn').click(function () {
        to_second_page();
        return ;
    });
});


