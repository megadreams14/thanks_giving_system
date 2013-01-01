<?php

/*
 * @Admin
 */
class Controller_Admin_Top extends Controller_Admin_Common {

	public function action_index() {

           $this->view_data['question_mst']= Model_Question_Mst::find('all');
           $this->viewContent('admin/top', '問題管理画面');
            
        
//		return Response::forge(View::forge('admin/index'));
	}

}