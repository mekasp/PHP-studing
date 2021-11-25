<?php

class Product extends Controller {
    public function getProduct() {
        $result = $this->db->query("SELECT p.id,pd.name,pd.description,pp.price FROM products p LEFT JOIN products_description pd ON p.id = pd.product_id LEFT JOIN product_prices pp ON p.id = pp.product_id WHERE p.id = '18' AND pd.language_id = 2; ");
        $product = $result['result']->fetch_assoc();
        $this->layout->render('catalog/product.html',
            ['product' => $product ]
        );

    }
}