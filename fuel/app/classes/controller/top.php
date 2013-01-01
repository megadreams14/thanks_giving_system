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
}
