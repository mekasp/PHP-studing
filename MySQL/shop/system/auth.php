<?php

class Auth {

    public $user;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function authorize()
    {
        if (isset($_SESSION['user_id'])) {
            $user = $this->db->query("SELECT u.id,u.name,u.email,u.phone,ui.avatar_path FROM users u LEFT JOIN user_images ui ON u.id = ui.user_id  WHERE u.id = '" . $_SESSION['user_id'] . "'");
            if ($user['result']->num_rows) {
                $this->user = $user['result']->fetch_assoc();
            }
        }
    }

    public function isAuthorized()
    {
        if (!$this->user || !isset($this->user['id']) || !$this->user['id']){
            $_SESSION = [];
            header("Location: http://mysql.local/shop/index.php?route=login_form");
        }
    }
}
