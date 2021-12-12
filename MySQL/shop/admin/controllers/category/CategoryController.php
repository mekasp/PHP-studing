<?php

class CategoryController extends Controller {
    public function index(){
        $query = "SELECT c.id,cd.name FROM categories c LEFT JOIN category_description cd ON c.id = cd.category_id WHERE cd.language_id = 2;";
        if (isset($_GET['filter']) && $_GET['filter'] != ''){
            $query .= " WHERE name LIKE '%" . $_GET['filter'] . "%'";
        }
        if (isset($_GET['sort']) && ($_GET['sort'] == 'ASC' || $_GET['sort'] == 'DESC')){
            $query .= " ORDER BY name " . $_GET['sort'];
        }
        $result = $this->db->query($query);

        $categories = $result['result']->fetch_all(MYSQLI_ASSOC);
        $this->layout->render('category/categories.html',
        [
          'categories' => $categories
        ]
        );


    }

    public function CreateCategoryPage(){
        $this->layout->render('category/category_create.html');
    }

    public function CreateCategory(){
        $this->db->query("INSERT INTO categories SET status = 1 ;");

        $query = $this->db->query("SELECT max(id) AS id FROM categories");
        $result = $query['result']->fetch_assoc();
        $category_id = $result['id'];

        foreach ($_POST['category_description'] as $language_id => $description){
            $this->db->query("INSERT INTO category_description SET `category_id` ='" . $category_id . "',`language_id` = '" . $language_id . "', `name` = '" . $description['name'] . "', `description` = '" . $description['description'] . "', `date_added` = now();");
        }

        header("location: http://mysql.local/shop/admin/index.php?route=categories");
    }

    public function EditCategoryPage(){
        if (isset($_GET['category_id'])){

            $query = $this->db->query("SELECT c.id,cd.category_id FROM categories c LEFT JOIN category_description cd ON c.id = cd.category_id WHERE id = ". $_GET['category_id'] .";");
            $category = $query['result']->fetch_assoc();
            $query = $this->db->query("SELECT * FROM category_description WHERE category_id = " . $_GET['category_id']);
            $category_description = $query['result']->fetch_all(MYSQLI_ASSOC);
        }
        $this->layout->render('category/category_edit.html',
            [
                'category' => $category,
                'category_description' => $category_description
            ]
        );
    }

    public function EditCategory(){
        foreach ($_POST['category_description'] as $language_id => $description){
            $update = $this->db->query("UPDATE category_description SET `name` = '" . $description['name'] ."' ,`description` = '" . $description['description'] . "' WHERE `category_id` = '" . $_POST['category_id'] . "' AND `language_id` = '" . $language_id . "';");
        }

        header('Location: http://mysql.local/shop/admin/index.php?route=categories');
    }

    public function DeleteCategory(){

        if (isset($_GET['category_id'])){
            $this->db->query("DELETE FROM categories WHERE `id` = '" . $_GET['category_id'] ."';");
            $this->db->query("DELETE FROM category_description WHERE `category_id` = '" . $_GET['category_id'] ."';");
        }

        header('Location: http://mysql.local/shop/admin/index.php?route=categories');
    }
}