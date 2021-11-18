<?php

session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'shop');

require_once 'system/controller.php';

require_once 'system/router.php';

require_once 'system/db.php';

require_once 'system/auth.php';

require_once 'system/layout.php';

$router = new Router();
$router->route();