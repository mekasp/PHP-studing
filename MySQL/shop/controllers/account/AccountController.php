<?php

class AccountController extends Controller {

    public function index(){
        $result = $this->db->query("SELECT * FROM `order` WHERE user_id = '" . $_SESSION['user_id'] . "';");
        $orders = $result['result']->fetch_all(MYSQLI_ASSOC);

        $this->layout->render('account/account.html',
            [
                'orders' => $orders
            ]
        );
    }

    public function edit(){
        $this->layout->render('account/account_edit.html');
    }

    public function update(){
        if ($_POST) {
            $this->db->query("UPDATE users SET `name` = '" . $_POST['name'] . "' ,`email` = '" . $_POST['email'] . "' , `phone` = '" . $_POST['phone'] . "' WHERE `id` = '" . $_SESSION['userid'] . "'");

            if ($_FILES){
                $path = "images/avatars/" . $_FILES['avatar']['name'];
                $loaded = move_uploaded_file($_FILES['avatar']['tmp_name'],$path);
                if ($loaded){
                    $this->db->query("DELETE FROM user_images WHERE `user_id` ='" . $_SESSION['user_id'] . "'");

                    $this->db->query("INSERT INTO user_images SET `user_id` ='" . $_SESSION['user_id'] . "', avatar_path ='" . $path . "',date_added = NOW()");
                }
            }
        }

        header('Location: http://mysql.local/shop/index.php?route=account');
    }

}