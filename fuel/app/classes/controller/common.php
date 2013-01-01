<?php


class Controller_Common extends \Controller_Template {

    //追加で読み込むCSSファイル群(静的ファイル)
    protected $plus_css;
    //追加で読み込むJavaScriptファイル群(静的ファイル)
    protected $plus_js;

    protected $context;
    
    protected $view_data;
    
    public function before() {
        //親クラスのbeforeを呼び出して, $this->templateを使えるようにしてもらう
        parent::before();        
    }

    public function after($response) {
        //親クラスのafterを呼び出して, responseインスタンスをもらう
        parent::after($response);
        $response = parent::after($response);
        return $response;
    }
    
     protected function viewContent($path = null, $title = '大感謝祭') {        
        //Viewのtemplate.phpにそれぞれ渡す
        
        $this->template->content = \View::forge($path,  array('view_data' => $this->view_data, 'title' => $title));
    }

}