<?php

if (isset($_POST['title']) && isset($_POST['description'])){
    $content = [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'image' => '',
    ];

    if ($_FILES && isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $tmp_name = $file['tmp_name'];
        $path = 'imgs/' . $file['name'];
        move_uploaded_file($tmp_name, $path);
        $content['image'] = $path;
    }

    file_put_contents('categories/' . $_POST['category_name'] . '/' . $_POST['article_name'], json_encode($content));


}

header('Location: http://php.local/files/projectx/index.php?route=article&category_name=' .$_POST['category_name'] . '&article_name=' . $_POST['article_name']);
?>