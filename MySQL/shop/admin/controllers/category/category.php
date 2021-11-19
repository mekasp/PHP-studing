<?php

if (isset($_GET['route']) && ($_GET['route'] == 'categories' ||  $_GET['route'] == 'product_create' || $_GET['route'] == 'product_edit')) {
    $query = "SELECT c.id,cd.name FROM categories c LEFT JOIN category_description cd ON c.id = cd.category_id WHERE cd.language_id = 2;";
    if (isset($_GET['filter']) && $_GET['filter'] != ''){
        $query .= " WHERE name LIKE '%" . $_GET['filter'] . "%'";
    }
    if (isset($_GET['sort']) && ($_GET['sort'] == 'ASC' || $_GET['sort'] == 'DESC')){
        $query .= " ORDER BY name " . $_GET['sort'];
    }

    $result = mysqli_query($db, $query);

    $categories = $result->fetch_all(MYSQLI_ASSOC);
}

if (isset($_GET['category_id'])){
   // $query = mysqli_query($db, "SELECT * FROM categories WHERE id = ". $_GET['category_id'] .";");
    $query = mysqli_query($db, "SELECT c.id,cd.category_id FROM categories c LEFT JOIN category_description cd ON c.id = cd.category_id WHERE id = ". $_GET['category_id'] .";");
    $category = $query->fetch_assoc();
    $query = mysqli_query($db,"SELECT * FROM category_description WHERE category_id = " . $_GET['category_id']);
    $category_description = $query->fetch_all(MYSQLI_ASSOC);
}