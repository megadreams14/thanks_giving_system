<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_Top extends Controller_Common {
    public function action_index() {
        $this->viewContent('top/index', '大感謝祭');
        
//            return Response::forge(View::forge('top/index'));
    }
     //回答を受信し，サーバにデータを記録する
    public function action_answer_regist() {
        $answer    = $_REQUEST['answer'];
        $user_name = $_REQUEST['user_name'];
        $time      = $_REQUEST['time'];
        $question_list_id = $_REQUEST['question_list_id'];
        
        $answer_info = new Model_Answer_Info();
        $answer_info->user_profile_mst_id = 0;
        $answer_info->question_list_id = $question_list_id;
        $answer_info->answer = $answer;
        $answer_info->user_name = $user_name;
        $answer_info->time = $time;
        //保存
        $answer_info->save();
        
        /*        
user_profile_mst_id
question_list_id
answer
user_name 
  */      
        
        echo json_encode(array('error' => false, 'msg' => $_REQUEST));
        exit();
        
    }
}
