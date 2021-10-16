<?php

if (isset($_GET['product_id'])){
    require_once 'products.php';
    $product = $products[$_GET['product_id']];

    if (isset($_COOKIE['basket'])){
        $basket = json_decode($_COOKIE['basket'],1);
    }else{
        $basket = [];
    }
    $basket[] = $product;

    setcookie('basket', json_encode($basket),time() + 3600 * 24);
}

header('Location:http://php.local/basket/index.php');

?>