<?php

    $result = false;
if (isset($_POST['login'])){
    if (file_exists('users/' . $_POST['login'] . '.txt')){
        $file = json_decode(file_get_contents('users/' . $_POST['login'] . '.txt'),1);
        if ($file['password'] == $_POST['password']){
            $result = true;
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head></head>
<body>
    <form method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <button type="submit">Войти</button>
    </form>
    <?php if ($result == true){echo 'Добро пожаловать ' . $file['name'];}else {
        echo 'Неверные данные';
    } ?>
    <a href="http://php.local/files/authorization/registration.php">Регистрация</a>
</body>
</html>
