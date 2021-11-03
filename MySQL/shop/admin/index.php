<?php

if (isset($_GET['route']) && ($_GET['route'] == 'categories' ||  $_GET['route'] == 'product_create' || $_GET['route'] == 'product_edit')) {
    $db = mysqli_connect('localhost', 'root', '', 'shop');

    $query = "SELECT * FROM categories";
    if (isset($_GET['filter']) && $_GET['filter'] != ''){
        $query .= " WHERE name LIKE '%" . $_GET['filter'] . "%'";
    }
    if (isset($_GET['sort']) && ($_GET['sort'] == 'ASC' || $_GET['sort'] == 'DESC')){
        $query .= " ORDER BY name " . $_GET['sort'];
    }

    $result = mysqli_query($db, $query);

    $categories = $result->fetch_all(MYSQLI_ASSOC);
}

if (isset($_GET['route']) && $_GET['route'] == 'products') {
    $db = mysqli_connect('localhost', 'root', '', 'shop');

    $query = mysqli_query($db, "SELECT * FROM products;");

    $products = $query->fetch_all(MYSQLI_ASSOC);
}

if (isset($_GET['category_id'])){
    $db = mysqli_connect('localhost', 'root', '', 'shop');

    $query = mysqli_query($db, "SELECT * FROM categories WHERE id = ". $_GET['category_id'] .";");

    $category = $query->fetch_assoc();
}

if (isset($_GET['product_id'])){
    $db = mysqli_connect('localhost', 'root', '', 'shop');

    $query = mysqli_query($db, "SELECT * FROM products WHERE id = ". $_GET['product_id'] .";");

    $product = $query->fetch_assoc();
}

require_once 'header.html';

if (!isset($_GET['route']) || $_GET['route'] == 'home'){
    require_once ('home.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'categories') {
    require_once ('categories.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'create_category') {
    require_once('create_category.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'category_edit'){
    require_once 'category_edit.html';
} elseif (isset($_GET['route']) && $_GET['route'] == 'category_delete'){
    require_once 'category_delete.php';
} elseif (isset($_GET['route']) && $_GET['route'] == 'products'){
    require_once 'products.html';
} elseif (isset($_GET['route']) && $_GET['route'] == 'product_create'){
    require_once 'product_create.html';
} elseif (isset($_GET['route']) && $_GET['route'] == 'product_edit'){
    require_once 'product_edit.html';
} elseif (isset($_GET['route']) && $_GET['route'] == 'product_delete'){
    require_once 'product_delete.php';
}

require_once 'footer.html';