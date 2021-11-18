<?php

class LoginController extends Controller {

    public function index(){
        $this->layout->render('auth/login.html');
    }

    public function login(){
        if($_POST){
            $result = $this->db->query('SELECT * FROM users WHERE `email` = "' . $_POST['email'] . '" AND `password` = "' . $_POST['password'] . '"');

            if($result['result']->num_rows > 0){
                $user = $result['result']->fetch_assoc();
                $_SESSION['user_id'] = $user['id'];
            }
        }

        header('Location:http://mysql.local/shop/index.php');
    }

}