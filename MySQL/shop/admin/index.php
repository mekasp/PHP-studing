<?php

$db = mysqli_connect('localhost', 'root', '', 'shop');

require_once 'controllers/category/category.php';

require_once 'controllers/product/product.php';

require_once 'views/header.html';

//Routing
if (!isset($_GET['route']) || $_GET['route'] == 'home'){

    require_once('views/home.html');

} elseif (isset($_GET['route']) && $_GET['route'] == 'categories') {

    require_once('views/category/categories.html');

} elseif (isset($_GET['route']) && $_GET['route'] == 'create_category') {

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