<?php


class Controller_Admin_Common extends \Controller_Template {

    //追加で読み込むCSSファイル群(静的ファイル)
    protected $plus_css;
    //追加で読み込むJavaScriptファイル群(静的ファイル)
    protected $plus_js;

    protected $context;
    
    protected $view_data;
    
    public function before() {
        //親クラスのbeforeを呼び出して, $this->templateを使えるようにしてもらう
        parent::before();
        $this->admin_flag = true;

        
        //その他のinitialze
        $this->context  = array();
        $this->plus_css = array();
        $this->plus_js  = array();
    }

    public function after($response) {
        //親クラスのafterを呼び出して, responseインスタンスをもらう
        parent::after($response);
        $response = parent::after($response);
        return $response;
    }
    
     protected function viewContent($path = null, $title = null) {        
        //Viewのtemplate.phpにそれぞれ渡す
        $this->template->content = \View::forge($path,  array('view_data' => $this->view_data));
        $this->template->header  = \View::forge('admin/inc/header', array('title' => $title, 'plus_css' => $this->plus_css));
        $this->template->footer  = \View::forge('admin/inc/footer', array('plus_js' => $this->plus_js));
        $this->template->menu    = \View::forge('admin/inc/menu');
    }

}