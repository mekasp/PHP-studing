<?php

class HomeController extends Controller {

    public function index(){

        $this->auth->isAuthorized();

        $result = $this->db->query("SELECT p.id,pd.name,pp.price,pi.image_path FROM products p LEFT JOIN products_description pd ON p.id = pd.product_id LEFT JOIN product_prices pp ON p.id = pp.product_id LEFT JOIN product_images pi ON p.id = pi.product_id WHERE pd.language_id = 2 ORDER BY date_created ASC LIMIT 4;");

        $products = $result['result']->fetch_all(MYSQLI_ASSOC);

        $this->layout->render('home.html',
        [
            'products' => $products
        ]
        );

    }
}