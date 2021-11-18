<?php

class Layout {

    private $viewPath = 'views/';

    public $data;

    public function render($template, $data = array()){
        $data = array_merge($this->data, $data);
        extract($data, EXTR_SKIP);

        require_once $this->viewPath . 'header.html';

        require_once $this->viewPath . $template;

        require_once $this->viewPath . 'footer.html';
    }
}