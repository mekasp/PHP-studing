<?php
$result = 0;

if (isset($_POST['text'])){
    $result = strlen($_POST['text']);
}

$resultWOmat = '';

if (isset($_POST['text'])){
    //$resultWOmat = str_replace('сука','котик', $_POST['text']);
    $resultWOmat = str_replace(['сука','ебаная','блядюга'],['котик','любименький','солнышко'], $_POST['text']);
}



?>

<!DOCTYPE html>
<html>
<head>
    <style>

    </style>
</head>
<body>
    <div class="form">
        <form method="post">
            <input name="text" type="text" placeholder="Введите текст">
            <button type="submit">Отправить</button>
        </form>
        <div>
            <p><?php if ($result > 0){echo 'В тексте ' . $result . ' символов';} ?></p>
            <p><?php if ($resultWOmat > ''){echo $resultWOmat;}?></p>
        </div>
    </div>
</body>
</html>