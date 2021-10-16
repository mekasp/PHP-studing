<?php

if (isset($_POST['name']) && isset($_POST['title']) && isset($_POST['description'])) {
    $data = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'image' => '',
    ];
    if ($_FILES && isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $tmp_name = $file['tmp_name'];
        $path = 'imgs/' . $file['name'];
        move_uploaded_file($tmp_name, $path);
        $data['image'] = $path;
    }


    $path = 'categories/' . $_POST['category'] . '/' . $_POST['name'] . '.txt';
    $file = fopen($path,'w+');
    fwrite($file, json_encode($data));
}

if (isset($_POST['category'])){
    header("Location: http://php.local/files/projectx/index.php?route=category&category_name=" . $_POST['category']);
} else {
    header("Location: http://php.local/files/projectx/index.php");
}


?>