<?php

class RegistrationController extends Controller {

    public function index(){
        $this->layout->render('auth/register.html');
    }

    public function register(){
        if ($_POST){
            $this->db->query('INSERT INTO users SET email = "' . $_POST['email'] . '", name = "' . $_POST['name'] . '", phone = "' . $_POST['phone'] . '", password = "' . $_POST['password'] . '"');

            header('Location: http://mysql.local/shop/index.php?route=login_form');
        }
    }
}