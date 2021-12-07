<?php

 class Basket extends Controller {

     public function index() {
         $ids = implode(',', array_keys($_SESSION['order']));
         $result = $this->db->query("SELECT p.id,pd.name,pp.price FROM products p LEFT JOIN products_description pd ON p.id = pd.product_id LEFT JOIN product_prices pp ON p.id = pp.product_id WHERE p.id IN (" . $ids . ") AND pd.language_id = 2; ");
         $products = $result['result']->fetch_all(MYSQLI_ASSOC);

         foreach ($products as $key => $product){
             $products[$key]['count'] = $_SESSION['order'][$product['id']];
             $products[$key]['total'] = $product['price'] * $_SESSION['order'][$product['id']];
         }

         $this->layout->render('catalog/basket.html',
             ['products' => $products ]
         );
     }

     public function Clear_Basket(){
         $_SESSION['order'] = [];

         header('Location: http://mysql.local/shop/index.php');
     }

     public function Create_Order(){
         if ($_POST){
//             $this->db->query('INSERT INTO order SET user_id = "' . $_SESSION['user_id'] . '", total = "' . $product['total'] . '";');
         }
     }

 }