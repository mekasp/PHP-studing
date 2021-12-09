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

}