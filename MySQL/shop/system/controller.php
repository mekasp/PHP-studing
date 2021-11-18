<?php

abstract class Controller {
    protected $data;
    protected $db;
    protected $auth;
    protected $layout;

    public function startApp(){
        $this->db = new DB();
        $this->db->connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        $this->auth = new Auth($this->db);
        $this->auth->authorize();

        $this->layout = new Layout();
        $this->layout->data['user'] = $this->auth->user;
    }
}