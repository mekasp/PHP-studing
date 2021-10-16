<?php

if (isset($_GET['category_name']) && isset($_GET['article_name'])){
    unlink('categories/' . $_GET['category_name'] .'/' . $_GET['article_name']);

}

header('Location: http://php.local/files/projectx/index.php?route=category&category_name=' . $_GET['category_name']);

?>