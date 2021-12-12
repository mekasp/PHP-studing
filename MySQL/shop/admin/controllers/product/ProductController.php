<?php

class ProductController extends Controller{

    public function index(){
        if (isset($_GET['route']) && $_GET['route'] == 'products') {
            $query = $this->db->query( "SELECT p.id,pd.name FROM products p LEFT JOIN products_description pd ON p.id = pd.product_id WHERE pd.language_id = 2;");

            $products = $query['result']->fetch_all(MYSQLI_ASSOC);
            $this->layout->render('product/products.html',
                [
                    'products' => $products
                ]
            );
        }
    }

    public function CreateProductPage(){

        $result = $this->db->query("SELECT c.id,cd.name FROM categories c LEFT JOIN category_description cd ON c.id = cd.category_id WHERE cd.language_id = 2;");

        $categories = $result['result']->fetch_all(MYSQLI_ASSOC);





        $this->layout->render('product/product_create.html',
        [
            'categories' => $categories,
        ]
        );
    }

    public function CreateProduct(){
        if ($_POST){
            $this->db->query('INSERT INTO products SET category_id = "' . $_POST['category_id'] . '" ;');

            $query = $this->db->query("SELECT max(id) AS product_id FROM products");
            $result = $query['result']->fetch_assoc();
            $product_id = $result['product_id'];

            $this->db->query("INSERT INTO product_prices SET product_id = '". $product_id . "' , price = '" . $_POST['price'] ."', status = 1, date_added = now();");

            foreach ($_POST['product_description'] as $language_id => $description){
                $this->db->query("INSERT INTO products_description SET `product_id` ='" . $product_id . "',`language_id` = '" . $language_id . "', `name` = '" . $description['name'] . "', `description` = '" . $description['description'] . "';");
            }
        }

        header("location: http://mysql.local/shop/admin/index.php?route=products");
    }

    public function EditProductPage(){
        $result = $this->db->query("SELECT c.id,cd.name FROM categories c LEFT JOIN category_description cd ON c.id = cd.category_id WHERE cd.language_id = 2;");

        $categories = $result['result']->fetch_all(MYSQLI_ASSOC);



        if (isset($_GET['product_id'])){
            $query = $this->db->query( "SELECT p.id,p.category_id,pp.price FROM products p LEFT JOIN product_prices pp ON p.id = pp.product_id WHERE id = ". $_GET['product_id'] .";");
            $product = $query['result']->fetch_assoc();
            $query = $this->db->query("SELECT * FROM products_description WHERE product_id = " . $_GET['product_id']);
            $product_description = $query['result']->fetch_all(MYSQLI_ASSOC);
        }

        $this->layout->render('product/product_edit.html',
            [
                'product' => $product,
                'product_description' => $product_description,
                'categories' => $categories
            ]
        );

    }

    public function EditProduct(){
        if ($_POST){
            $this->db->query("UPDATE products SET category_id = '" . $_POST['category_id'] . "' WHERE `id` = '" . $_POST['product_id'] . "';");

            foreach ($_POST['product_description'] as $language_id => $description){
                $this->db->query("UPDATE products_description SET `name` = '" . $description['name'] ."' ,`description` = '" . $description['description'] . "' WHERE `product_id` = '" . $_POST['product_id'] . "' AND `language_id` = '" . $language_id . "';");
            }

            $this->db->query("UPDATE product_prices SET `price` ='" . $_POST['price'] . "' WHERE `product_id` = '" . $_POST['product_id'] ."';");
        }

        header('Location: http://mysql.local/shop/admin/index.php?route=products');

    }

    public function DeleteProduct(){
        if (isset($_GET['product_id'])){
            $this->db->query( "DELETE FROM products WHERE `id` = '" . $_GET['product_id'] ."';");
            $this->db->query("DELETE FROM products_description WHERE `product_id` = '" . $_GET['product_id'] ."';");
        }

        header('Location: http://mysql.local/shop/admin/index.php?route=products');

    }




}