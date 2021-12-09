<?php

class Router {

    public function route(){

        $route = $this->findRoute();

        if (!$route){
            var_dump("Route not exists");die();
        }

        if (!file_exists($route['path'])){
            var_dump("Path not exists");die();
        }

        require_once $route['path'];

        if (!class_exists($route['class'])){
            var_dump("Class not exists");die();
        }

        $class = new $route['class']();
        $class->startApp();

        if(!method_exists($class, $route['method'])){
            var_dump("Method not exists");die();
        }

        $method = $route['method'];
        $class->$method();
    }

    private function findRoute(){
        $route = [];
        if (ACTION == 'client'){
            if (!isset($_GET['route'])){
                $route['path'] = 'controllers/HomeController.php';
                $route['class'] = 'HomeController';
                $route['method'] = 'index';

                return $route;
            }

            if ($_GET['route'] == 'login_form') {
                $route['path'] = 'controllers/auth/LoginController.php';
                $route['class'] = 'LoginController';
                $route['method'] = 'index';

                return $route;
            }

            if ($_GET['route'] == 'login') {
                $route['path'] = 'controllers/auth/LoginController.php';
                $route['class'] = 'LoginController';
                $route['method'] = 'login';

                return $route;
            }

            if ($_GET['route'] == 'registration_form') {
                $route['path'] = 'controllers/auth/RegistrationController.php';
                $route['class'] = 'RegistrationController';
                $route['method'] = 'index';

                return $route;
            }

            if ($_GET['route'] == 'register') {
                $route['path'] = 'controllers/auth/RegistrationController.php';
                $route['class'] = 'RegistrationController';
                $route['method'] = 'register';

                return $route;
            }

            if ($_GET['route'] == 'account') {
                $route['path'] = 'controllers/account/AccountController.php';
                $route['class'] = 'AccountController';
                $route['method'] = 'index';

                return $route;
            }

            if ($_GET['route'] == 'account_edit') {
                $route['path'] = 'controllers/account/AccountController.php';
                $route['class'] = 'AccountController';
                $route['method'] = 'edit';

                return $route;
            }

            if ($_GET['route'] == 'account_update') {
                $route['path'] = 'controllers/account/AccountController.php';
                $route['class'] = 'AccountController';
                $route['method'] = 'update';

                return $route;
            }

            if ($_GET['route'] == 'categories'){
                $route['path'] = 'controllers/catalog/category.php';
                $route['class'] = 'Category';
                $route['method'] = 'index';

                return $route;
            }

            if ($_GET['route'] == 'category'){
                $route['path'] = 'controllers/catalog/category.php';
                $route['class'] = 'Category';
                $route['method'] = 'getCategory';

                return $route;
            }

            if ($_GET['route'] == 'product'){
                $route['path'] = 'controllers/catalog/product.php';
                $route['class'] = 'Product';
                $route['method'] = 'getProduct';

                return $route;
            }

            if ($_GET['route'] == 'buy_product'){
                $route['path'] = 'controllers/catalog/product.php';
                $route['class'] = 'Product';
                $route['method'] = 'Buy';

                return $route;
            }

            if ($_GET['route'] == 'basket'){
                $route['path'] = 'controllers/catalog/basket.php';
                $route['class'] = 'Basket';
                $route['method'] = 'index';

                return $route;
            }

            if ($_GET['route'] == 'clear_basket'){
                $route['path'] = 'controllers/catalog/basket.php';
                $route['class'] = 'Basket';
                $route['method'] = 'Clear_Basket';

                return $route;
            }

            if ($_GET['route'] == 'create_order'){
                $route['path'] = 'controllers/catalog/basket.php';
                $route['class'] = 'Basket';
                $route['method'] = 'Create_Order';

                return $route;
            }

            if ($_GET['route'] == 'order_success'){
                $route['path'] = 'controllers/catalog/basket.php';
                $route['class'] = 'Basket';
                $route['method'] = 'Order_Success';

                return $route;
            }
        }

        if (ACTION == 'admin'){

            if (!isset($_GET['route'])){
                $route['path'] = 'controllers/HomeController.php';
                $route['class'] = 'HomeController';
                $route['method'] = 'index';

                return $route;
            }

            if ($_GET['route'] == 'categories'){
                $route['path'] = 'controllers/category/CategoryController.php';
                $route['class'] = 'CategoryController';
                $route['method'] = 'index';

                return $route;
            }

        }

        return $route;
    }
}