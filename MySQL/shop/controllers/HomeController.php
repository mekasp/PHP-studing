<?php

class HomeController extends Controller {

    public function index()
    {
        $this->auth->isAuthorized();

        $this->layout->render('home.html');
    }

}