<?php

if (isset($_POST["name"]) && $_POST['name'] != '' && !is_dir('categories/' . $_POST['name'])){
    mkdir('categories/' . $_POST['name'], 0777);
}

header("location: http://php.local/files/projectx/index.php?route=categories");

?>