

<?php echo Asset::js('socket.io.js'); ?>

<h1>【<?php echo $view_data['question_info']->title;?>】 操作画面</h1>

<button class="opening-start-btn">オープニング</button>
<button class="send-question-btn">問題送信（第何問と表示）</button>
<button class="open-question-btn">問題表示</button>
<button class="answer-start-btn">回答受付開始</button>
<button class="answer-check-btn">アンサーチェック</button>
<button class="answer-view-btn">回答送信</button>
<button class="ranking-asc-btn">ランキング送信</button>    
<button class="total-ranking-btn">トータル成績</button>    

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>title</th>
            <th>description</th>
            <th>start</th>
            <th>end</th>
        </tr>
    </thead>
    <tbody>
        <tr class="question-info-list">
            <td class="id"><?php echo $view_data['question_info']->id; ?></td>
            <td class="title"><?php echo $view_data['question_info']->title; ?></td>
            <td class="description"><?php echo $view_data['question_info']->description; ?></td>
            <td class="start"><?php echo $view_data['question_info']->start; ?></td>
            <td class="end"><?php echo $view_data['question_info']->end; ?></td>
        </tr>
    </tbody>
</table>

<h2>問題リスト</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>問題番号</th>
            <th>ID</th>
            <th>選択肢A</th>
            <th>選択肢B</th>
            <th>選択肢C</th>
            <th>選択肢D</th>
            <th>答え</th>
        </tr>
    </thead>
    <tbody>
        <?php $number = 1; ?>
        <?php foreach ($view_data['question_list'] as $question_list):?>
        <tr class="question_<?php echo $number;?>">
            <td class="number"><?php echo $number; ?></td>            
            <td class="id"><?php echo $question_list->id; ?></td>
            <td class="question"><?php echo $question_list->question; ?></td>
            <td class="select_a"><?php echo $question_list->select_a; ?></td>
            <td class="select_b"><?php echo $question_list->select_b; ?></td>
            <td class="select_c"><?php echo $question_list->select_c; ?></td>
            <td class="select_d"><?php echo $question_list->select_d; ?></td>
            <td class="answer"><?php echo $question_list->answer; ?></td>
        </tr>
        <?php $number++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<p>番号リスト</p>
<form>
    <label>
        問題番号：
        <select class="question_number">
            <?php $number = 1; ?>            
            <?php foreach ($view_data['question_list'] as $question_list): ?>
                <option value="question_<?php echo $question_list->id;?>"><?php echo $number++;?></option>
            <?php endforeach;?>
        </select>
    </label>

</form>




<script>
   var socket = io.connect('http://localhost:8124'); 
   var className;
   $('.opening-start-btn').click(function() {
       
       console.log('オープニングスタート');
       var sendData = {};
       $.each($('.question-info-list td'), function(i, data) {
           console.log($(data).text());
           console.log($(data).attr('class'));
           sendData[$(data).attr('class')] = $(data).text();
       });
       console.log(sendData);
       socket.emit('admin_opening_start', sendData);
       
   });
   
   //問題の送信と番号表示
   $('.send-question-btn').click(function() {
       //問題番号取得
       className = $('.question_number').val();
       console.log(className);
       
       var sendData = {};
       $.each($('.' + className + ' td'), function(i, data) {
//           console.log($(data).text());
//           console.log($(data).attr('class'));
           sendData[$(data).attr('class')] = $(data).text();
       });
       console.log(sendData);

       socket.emit('admin_question_start', sendData);
       
   });
   
   $('.open-question-btn').click(function() {
       socket.emit('admin_open_question_view', null);
   });
   
   $('.answer-start-btn').click(function() {
       var startTime = parseInt( new Date() /1000 );
       socket.emit('admin_answer_start', startTime);
   });


   $('.answer-check-btn').click(function() {
       sendData = {'select_a':8,'select_b':12,'select_c':10,'select_d':100};
       socket.emit('admin_answer_check', sendData);
   });

   //回答を送信する
   $('.answer-view-btn').click(function() {
       var answer = $('.' + className + ' .answer').text();
       console.log(answer);
       socket.emit('admin_answer_view', {'answer' : answer});
   });
   
   //ランキングを送信する
   $('.ranking-asc-btn').click(function (){
       var sendData = null;
       socket.emit('admin_ranking_asc', {'ranking' : sendData});
   });
   
   //総合成績
   
   $('.total-ranking-btn').click(function (){
       //成績の受信
       
       //成績を送信する
       socket.emit('admin_total_ranking', {'ranking' : null});
   });
   
   
</script>

