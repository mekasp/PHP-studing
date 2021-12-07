<?php

class Product extends Controller {
    public function getProduct() {
        $result = $this->db->query("SELECT p.id,pd.name,pd.description,pp.price FROM products p LEFT JOIN products_description pd ON p.id = pd.product_id LEFT JOIN product_prices pp ON p.id = pp.product_id WHERE p.id = '" . $_GET['product_id'] . "' AND pd.language_id = 2; ");
        $product = $result['result']->fetch_assoc();
        $this->layout->render('catalog/product.html',
            ['product' => $product ]
        );
    }

    public function Buy() {

        If (isset( $_SESSION['order'][$_GET['product_id']] )) {
            $_SESSION['order'][$_GET['product_id']] ++;
        } else {
            $_SESSION['order'][$_GET['product_id']] = 1;
        }

        if(isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('Location: http://mysql.local/shop/index.php?route=categories');
        }
    }
}