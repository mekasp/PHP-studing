<?php

if (isset($_COOKIE['basket'])){
    $basket = json_decode($_COOKIE['basket'],1);
}

require_once 'products.php';

require_once 'header.html';

if (!isset($_GET['route']) || $_GET['route'] == 'main'){
    require_once 'home.html';
}elseif (isset($_GET['route']) && $_GET['route'] == 'success'){
    require_once 'successful_transaction.html';
}elseif (isset($_GET['route']) && $_GET['route'] == 'basket'){
    require_once 'basket.html';
}

require_once 'footer.html';

?>