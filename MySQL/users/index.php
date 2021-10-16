<?php

$db = mysqli_connect('localhost','root','','testn1');

if ($_POST){
    $insert = mysqli_query($db,'INSERT INTO users SET email = "' . $_POST['email'] . '",name = "' . $_POST['name'] . '",password = "' . $_POST['password'] . '";');
    $eror = mysqli_error($db);
}

$query = mysqli_query($db,"SELECT * FROM users;");

$users = $query->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>email</th>
                    <th>name</th>
                    <th>password</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user){ ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['password']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <form method="post">
            <input type="text" name="email">
            <input type="text" name="name">
            <input type="text" name="password">
            <button type="submit">SEND</button>
        </form>
    </body>
</html>