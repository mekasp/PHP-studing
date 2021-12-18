<?php

 class Basket extends Controller {
     public function index() {
         $products = [];
         $total = 0;
         if (isset($_COOKIE['order'])){
             $order = json_decode($_COOKIE['order'],1);
         } else {
             $order = [];
         }

         if($order){
             $ids = implode(',', array_keys($order));
             $result = $this->db->query("SELECT p.id,pd.name,pp.price FROM products p LEFT JOIN products_description pd ON p.id = pd.product_id LEFT JOIN product_prices pp ON p.id = pp.product_id WHERE p.id IN (" . $ids . ") AND pd.language_id = 2; ");
             $products = $result['result']->fetch_all(MYSQLI_ASSOC);

             foreach ($products as $key => $product){
                 $products[$key]['count'] = $order[$product['id']];
                 $products[$key]['total'] = $product['price'] * $order[$product['id']];
                 $total += $products[$key]['total'];
             }
         }
         $this->layout->render('catalog/basket.html',
             ['products' => $products, 'total' => $total ]
         );
     }

     public function Clear_Basket(){
         setcookie('order','',time() - 1);

         header('Location: http://mysql.local/shop/index.php');
     }

     public function Create_Order(){
         if (isset($_COOKIE['order'])){
             $order = json_decode($_COOKIE['order'],1);
         } else {
             $order = [];
         }

         $ids = implode(',', array_keys($order));
         $result = $this->db->query("SELECT p.id,pd.name,pp.price FROM products p LEFT JOIN products_description pd ON p.id = pd.product_id LEFT JOIN product_prices pp ON p.id = pp.product_id WHERE p.id IN (" . $ids . ") AND pd.language_id = 2; ");
         $products = $result['result']->fetch_all(MYSQLI_ASSOC);

         if ($_POST){
             $total = 0;
             foreach ($products as $key => $product){
                 $total +=  $product['price'] * $order[$product['id']];
             }
             $this->db->query('INSERT INTO `order` SET user_id = "' . $_SESSION['user_id'] . '", total = "' . $total . '", email = "' . $_POST['email'] . '", phone = "' . $_POST['phone'] . '", address = "' . $_POST['address'] . '";');

             $query = $this->db->query("SELECT max(id) AS id FROM `order`");
             $result = $query['result']->fetch_assoc();
             $order_id = $result['id'];

             foreach ($products as $product){
             $this->db->query('INSERT INTO order_product SET order_id = "' . $order_id . '", product_id = "' . $product['id'] . '";');
             }

             setcookie('order','',time() - 1);

             header('Location: http://mysql.local/shop/index.php?route=order_success');
         }
     }

     public function Order_Success(){
         $this->layout->render('catalog/basket_success.html');
     }
 }