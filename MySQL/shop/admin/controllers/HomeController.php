<?php

class HomeController extends Controller {

    public function index()
    {
        $this->layout->render('home.html');
    }

}