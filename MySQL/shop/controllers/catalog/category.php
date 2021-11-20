<?php

class Category extends Controller {

    public function index(){
        $result = $this->db->query("SELECT c.id,cd.name FROM categories c LEFT JOIN category_description cd ON c.id = cd.category_id WHERE cd.language_id = 2;");
        $categories = $result['result']->fetch_all(MYSQLI_ASSOC);

        $this->layout->render('catalog/categories.html',
            [
                'categories' => $categories
            ]
        );

    }


}