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

    public function getCategory(){
        $result = $this->db->query("SELECT c.id,cd.name FROM categories c LEFT JOIN category_description cd ON c.id = cd.category_id WHERE id = '" . $_GET['category_id'] . "' AND cd.language_id = 2;");
        $category = $result['result']->fetch_assoc();
        $products = $this->getProducts($_GET['category_id']);

        $this->layout->render('catalog/category.html',
            ['category' => $category,'products' => $products]
        );
    }

    protected function getProducts($category_id){
        $result = $this->db->query("SELECT p.id,pd.name,pd.description,pp.price,pi.image_path FROM products p LEFT JOIN products_description pd ON p.id = pd.product_id LEFT JOIN product_prices pp ON p.id = pp.product_id LEFT JOIN product_images pi ON p.id = pi.product_id WHERE p.category_id = '" . $category_id . "' AND pd.language_id = 2;");

        $products = $result['result']->fetch_all(MYSQLI_ASSOC);

        return $products;
    }



}