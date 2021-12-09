<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'shop');
define('ACTION', 'admin');

require_once '../system/controller.php';

require_once '../system/router.php';

require_once '../system/db.php';

require_once '../system/auth.php';

require_once '../system/layout.php';

$router = new Router();
$router->route();

//Routing
if (isset($_GET['route']) && $_GET['route'] == 'create_category') {

    require_once('views/category/category_create.html');

} elseif (isset($_GET['route']) && $_GET['route'] == 'category_edit'){

    require_once 'views/category/category_edit.html';

} elseif (isset($_GET['route']) && $_GET['route'] == 'category_delete'){

    require_once 'controllers/category/category_delete.php';

} elseif (isset($_GET['route']) && $_GET['route'] == 'products'){

    require_once 'views/product/products.html';

} elseif (isset($_GET['route']) && $_GET['route'] == 'product_create'){

    require_once 'views/product/product_create.html';

} elseif (isset($_GET['route']) && $_GET['route'] == 'product_edit'){

    require_once 'views/product/product_edit.html';

} elseif (isset($_GET['route']) && $_GET['route'] == 'product_delete'){

    require_once 'controllers/product/product_delete.php';

}

require_once 'views/footer.html';