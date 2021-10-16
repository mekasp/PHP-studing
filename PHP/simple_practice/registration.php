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

        if (!isset($data['phone'])){
            $result = false;
            $errors['phone'] = 'Введите phone number';
        } elseif (preg_match('/^[0-9]{10}$/', $data['phone']) == 0){
            $result = false;
            $errors['phone'] = 'ВЫ ДОЛБАЕБ';
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

    $result = validate($_POST);

    $errors = $result['errors'];

?>


<!DOCTYPE html>
<html>
<head>
    <style>
        * {
            margin: 0 auto;
            padding: 0;
        }

        body {
            position: absolute;
            width: 100%;
        }

        form {
            position: relative;
            margin: 0 auto;
            width: 500px;
            background-color: antiquewhite;
            text-align: center;
        }

        .error {
            color: red;
        }

    </style>
</head>
<body>
    <div class="form">
        <form method="post">
            <div>
                <p>Email</p>
                <input type="text" name="email">
                <?php if (isset($errors['email'])){?>
                    <p class="error"><?php echo $errors['email']?></p>
                <?php } ?>
            </div>
            <div>
                <p>Name</p>
                <input type="text" name="name">
                <?php if (isset($errors['name'])){?>
                    <p class="error"><?php echo $errors['name']?></p>
                <?php } ?>
            </div>
            <div>
                <p>Phone</p>
                <input type="text" name="phone">
                <?php if (isset($errors['phone'])){?>
                    <p class="error"><?php echo $errors['phone']?></p>
                <?php } ?>
            </div>
            <div>
                <p>Password</p>
                <input type="password" name="password">
                <?php if (isset($errors['email'])){?>
                    <p class="error"><?php echo $errors['password']?></p>
                <?php } ?>
            </div>
            <div>
                <p>Password Confim</p>
                <input type="Password" name="passwordConfirm">
            </div>
            <button type="submit">Register</button>
        </form>
        <?php if ($result == true){
            echo 'Пользователь ' . $_POST['name'] . ' успешно зарегистрирован';
        }?>
    </div>
</body>
</html>
