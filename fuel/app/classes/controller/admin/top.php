<?php

/*
 * @Admin
 */
class Controller_Admin_Top extends Controller_Admin_Common {

    public function action_index() {

       //問題情報を取得する
       $this->view_data['question_info']= Model_Question_Info::find('all');
       $this->viewContent('admin/top', '問題操作画面');


//		return Response::forge(View::forge('admin/index'));
    }
        
    public function action_operation($question_info_id = null) {
        if ($question_info_id === null) {
            if (isset($_REQUEST['question_info_id']) === true) {
                $question_info_id = $_REQUEST['question_info_id'];
            } else {
                echo 'エラー';
                exit();
            }
        }
        
        //DBからデータを取得する
       $this->view_data['question_info']= Model_Question_Info::find('first',
            array(
                'where' => array(
                    array('id', $question_info_id)
                ),
                
           )
       );
       
        //DBからデータを取得する
       $question_lists = Model_Question_List::find('all',
            array(
                'where' => array(
                    array('question_infos_mst_id', $question_info_id)
                ),                
            )
       );   
       
       $question_list = array();
       foreach ($question_lists as $data) {
           $__question = array();
           //問題リストを取得する
           $question = Model_Question_Mst::find('first',
                array(
                    'where' => array(
                        array('id', $data->question_mst_id)
                    ),                
                 )
           );
           /*
           $__question['id'] = $question->id;
           $__question['question'] = $question->question;
           $__question['select_a'] = $question->select_a;
           $__question['select_b'] = $question->select_b;
           $__question['select_c'] = $question->select_c;
           $__question['select_d'] = $question->select_d;

           $question_list[] = $__question;
            */
            
           $question_list[] = $question;
       }
       $this->view_data['question_list'] = $question_list;
              
       
       $this->viewContent('admin/operation', 'オペレーション画面');
        
    }
    
    
}