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
            $user = $this->db->query("SELECT * FROM users WHERE id = '" . $_SESSION['user_id'] . "'");
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
