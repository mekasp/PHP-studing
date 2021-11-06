<?php

if (isset($_GET['route']) && ($_GET['route'] == 'categories' ||  $_GET['route'] == 'product_create' || $_GET['route'] == 'product_edit')) {
    $query = "SELECT * FROM categories";
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
    $query = mysqli_query($db, "SELECT * FROM categories WHERE id = ". $_GET['category_id'] .";");

    $category = $query->fetch_assoc();
}