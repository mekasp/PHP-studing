<?php

class Product extends Controller {
    public function getProduct() {

        $result = $this->db->query("SELECT p.id,pd.name,pd.description,pp.price,pi.image_path FROM products p LEFT JOIN products_description pd ON p.id = pd.product_id LEFT JOIN product_prices pp ON p.id = pp.product_id LEFT JOIN product_images pi ON p.id = pi.product_id WHERE p.id = '" . $_GET['product_id'] . "' AND pd.language_id = 2; ");
        $product = $result['result']->fetch_assoc();
        $this->layout->render('catalog/product.html',
            ['product' => $product ]
        );
    }

    public function Buy() {
        if (isset($_COOKIE['order'])){
            $order = json_decode($_COOKIE['order'],1);
        } else {
            $order = [];
        }

        If (isset( $order[$_GET['product_id']] )) {
            $order[$_GET['product_id']] ++;
        } else {
            $order[$_GET['product_id']] = 1;
        }

        setcookie('order',json_encode($order),time() + 3600 * 24 * 30);


        if(isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('Location: http://mysql.local/shop/index.php?route=categories');
        }
    }
}