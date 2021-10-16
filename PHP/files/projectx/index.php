<?php
// categories
$categories = [];
foreach (scandir('categories') as $key => $dir){
    if ($key > 1){
        $categories[] = $dir;
    }
}

//articles
$articles = [];
if (isset($_GET['route']) && $_GET['route'] == 'category' && isset($_GET['category_name'])){
    foreach (scandir('categories/' . $_GET['category_name']) as $key => $file){
        if ($key > 1){
            $data = json_decode(file_get_contents('categories/' . $_GET['category_name'] . '/' . $file),1);
            $data['name'] = $file;
            $articles[] = $data;

        }
    }
}

//article
$article = [];

if (isset($_GET['route']) && ($_GET['route'] == 'article' || $_GET['route'] == 'edit_article')) {
    $data = file_get_contents('categories/' . $_GET['category_name'] . '/' . $_GET['article_name']);
    $article = json_decode($data,1);
}

//routing1
require_once ('header.html');

if (isset($_GET['route']) && $_GET['route'] == 'categories'){
    require_once ('categories.html');
} elseif (!isset($_GET['route']) || $_GET['route'] == 'home') {
    require_once ('home.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'create_category') {
    require_once ('create_category.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'category'){
    require_once ('category.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'create_article') {
    require_once ('create_article.html');
} elseif (isset($_GET['route']) && $_GET['route'] == 'article'){
    require_once 'article.html';
} elseif (isset($_GET['route']) && $_GET['route'] == 'delete_article'){
    require_once 'delete_article.php';
} elseif (isset($_GET['route']) && $_GET['route'] == 'delete_category'){
    require_once 'delete_category.php';
} elseif (isset($_GET['route']) && $_GET['route'] == 'edit_article'){
    require_once 'edit_article.html';
}


require_once ('footer.html');




?>