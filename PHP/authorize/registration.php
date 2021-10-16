<?php

function validate($data) {
    $result = true;
    $errors = [];

    if (!isset($data['email'])){
        $result = false;
        $errors['email'] = 'Введите email';
    } elseif (strlen($data['email']) < 5){
        $result = false;
        $errors['email'] = 'Не менее 5 символов';
    } elseif (strpos($data['email'], '@') === false){
        $result = false;
        $errors['email'] = 'Введите валидный email';
    }

    if (!isset($data['name'])){
        $result = false;
        $errors['name'] = 'Ввеите имя';
    } elseif (strlen($data['name']) < 5){
        $result = false;
        $errors['name'] = 'Name дожен быть не менее 5 символов';
    }

    if (!isset($data['password'])){
        $result = false;
        $errors['password'] = 'Введите пароль';
    } elseif (strlen($data['password']) < 8){
        $result = false;
        $errors['password'] = 'Password должен быть длинной не менее 8 символов';
    } elseif ($data['password'] != $data['passwordConfirm']){
        $result = false;
        $errors['password'] = 'Поле password должно совпадать с полем password confirm';
    }

    return [
        'result' => $result,
        'errors' => $errors,
    ];
}

if ($_POST){
    $validate = validate($_POST);
    if ($validate['result']){
        if (!file_exists('users.txt')){
            fopen('users.txt','w+');
        }
       $filesize = filesize('users.txt');
       if ($filesize > 0){
           $users = json_decode(file_get_contents('users.txt'));
       } else {
           $users = [];
       }
       $user = [
           'name' => $_POST['name'],
           'email' => $_POST['email'],
           'password' => $_POST['password'],
       ];

       $users[] = $user;
       file_put_contents('users.txt', json_encode($users));

       header('Location: http://php.local/authorize/index.php?route=login');
    } else {
        echo 'VALIDATE FAILS';
    }
}

?>