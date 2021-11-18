<?php

class Router {

    public function route()
    {
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
            $route['path'] = '.../controllers/account/AccountController.php';
            $route['class'] = 'AccountController';
            $route['method'] = 'edit';

            return $route;
        }

        return $route;
    }
}