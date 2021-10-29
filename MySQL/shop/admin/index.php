<?php

$db = mysqli_connect('localhost','root','','shop');

$query = mysqli_query($db,"SELECT * FROM categories;");

$categories = $query->fetch_all(MYSQLI_ASSOC);

require_once 'header.html';

if (!isset($_GET['route']) || $_GET['route'] == 'home'){
    require_once ('home.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'categories') {
    require_once ('categories.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'create_category') {
    require_once('create_category.html');
}

require_once 'footer.html';