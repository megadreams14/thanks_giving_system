<style>

    .main-contents section{
        display:none;
    }
    
    /*回答時間の表示*/
    #timer-area {
        width:  65px;
        height: 65px;
        border: 1px solid black;
        border-radius: 50%;
        background: red;
        position: relative;
    }

    #timer {
        position: absolute;
        top: 35%;
        left: 17%;
        font-size: 45px;
    }
    
    /*問題文表示エリア*/
    .question-view {
        padding: 4% 1%;
        font-size: 130%;
        width: 77%;
        overflow: scroll;
    }
    .select-area {
        color:white;
        border:1px solid black;
        margin:1% 0;
        padding:1% 0;
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0.00, #4175ff), color-stop(1.00, #213fb1));
        background: -webkit-linear-gradient(#4175ff, #213fb1);
        background: -moz-linear-gradient(#4175ff, #213fb1);
        background: -o-linear-gradient(#4175ff, #213fb1);
        background: -ms-linear-gradient(#4175ff, #213fb1);
        background: linear-gradient(#4175ff, #213fb1);
        font-size: 18px;
    }
    .select-area div{
        overflow: hidden;
        
        float:left;
    }

    /*回答者人数エリア*/
    .select-num-area {
        font-size: 28px;
        padding:1% 0;
        color:white;
        border: 1px solid black;
        text-align:center;
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0.00, #b4ddfe), color-stop(1.00, #0d4996));
        background: -webkit-linear-gradient(#b4ddfe, #0d4996);
        background: -moz-linear-gradient(#b4ddfe, #0d4996);
        background: -o-linear-gradient(#b4ddfe, #0d4996);
        background: -ms-linear-gradient(#b4ddfe, #0d4996);
        background: linear-gradient(#b4ddfe, #0d4996);
/*
        visibility: hidden;
*/
    }
    
    /*選択エリアの見た目*/
    .select1 {
        width:20%;
        padding:1% 0;        
    }
    .select2 {
        width: 70%;
        margin: 0 -5%;
        padding: 4% 0;
    }
    .select3 {
        width:13%;
        margin: 0;
        padding: 4% 0;
    }
    
    /*ボタンの設定*/
    .btn-area {
        text-align:center;
    }
    .select-btn{
        width:20%;
    }
    
    /*問題番号*/
    .q_num img{
        width:45%;
    }
    
    /*ランキングエリア*/
    .rank_box {
        display: -webkit-box;
        -webkit-box-orient: horizontal;
        border: 1px solid black;
        border-radius: 20px;
        margin: 10px 0;
        padding:10px 0px;
        font-size:18px;
        color:white;
/*
        opacity:0;
*/
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0.00, #0b4ebd), color-stop(1.00, #0b1a67));
        background: -webkit-linear-gradient(#0b4ebd, #0b1a67);
        background: -moz-linear-gradient(#0b4ebd, #0b1a67);
        background: -o-linear-gradient(#0b4ebd, #0b1a67);
        background: -ms-linear-gradient(#0b4ebd, #0b1a67);
        background: linear-gradient(#0b4ebd, #0b1a67);
    }

</style>

<div class="main-contents">
    <section class="first-page">
        <h1>お名前を入力して下さい</h1>
        <form>
            <input id="name-input" type="text" name="user_name">
            <button class="name-btn"type="button">送信</button>
        </form>
    </section>
    
    <section class="second-page">
        <h1><span class="myname"></span>さん ようこそ</h1>
        <p>問題が表示されるまで，しばらくお待ち下さい</p>
    </section>
    
    <section class="question-title-area">
        <p><span class="myname"></span>さんの挑戦</p>
        <h1><span class="title"></span></h1>
    </section>
    
    
    <section class="question-area">
        <p><span class="myname"></span>さんの第<span class="question_num">１</span>問目</p>
        <h1>第<span class="question-num"></span>問</h1>
        <p class="question"></p>
    </section>

    <section class="answer-area">
        <p><span class="myname"></span>さんの第<span class="question-num"></span>問目</p>
        <div class="row">
            <div class="span question-view">
                問題：<span class="question">ここに問題文が表示されます</span>
            </div>
            <div id="timer-area" class="span">
                <span id="timer">０</span>
            </div>
        </div>

        <div>
            <div class="select-area area-a row">
                <div class="q_num select1"><?php echo Asset::img('number1.png'); ?></div>
                <div class="select-a select2">選択肢A</div>
                <div class="answer-a select-num-area select3">12</div>
            </div>
            <div class="select-area area-b row">
                <div class="q_num select1"><?php echo Asset::img('number2.png'); ?></div>
                <div class="select-b select2">選択肢B</div>
                <div class="answer-b select-num-area select3">5</div>
            </div>
            <div class="select-area area-c row">
                <div class="q_num select1"><?php echo Asset::img('number3.png'); ?></div>
                <div class="select-c select2">選択肢C</div>
                <div class="answer-c select-num-area select3">3</div>
            </div>
            <div class="select-area area-d row">
                <div class="q_num select1"><?php echo Asset::img('number4.png'); ?></div>
                <div class="select-d select2">選択肢D</div>
                <div class="answer-d select-num-area select3">2</div>
            </div>
        </div>
        <div class="btn-area">
            <button class="select-btn btn" value="a">１</button>
            <button class="select-btn btn" value="b">２</button>
            <button class="select-btn btn" value="c">３</button>
            <button class="select-btn btn" value="d">４</button>
            <input type="hidden" class="question-list-id">
        </div>
    </section>
    <section class="ranking-area">
        <div class="rank_box">
            <div class="rank">１位</div>
            <div class="user_name">けんと</div>
            <div class="time">1.25</div>
        </div>
    </section>

             
</div> 




<?php echo Asset::js('index.js'); ?>
