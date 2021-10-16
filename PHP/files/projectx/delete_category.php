<?php


if (isset($_GET['category_name'])){
    $files = scandir('categories/' .  $_GET['category_name']);
    foreach (scandir('categories/' . $_GET['category_name']) as $key => $file) {

        if ($key > 1) {

            unlink('categories/' . $_GET['category_name'] . '/' . $file);

        }
    }
    rmdir('categories/' . $_GET['category_name']);
}

header('Location: http://php.local/files/projectx/index.php?route=categories');

?>