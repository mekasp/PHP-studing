<?php

    if (isset($_POST['clear'])){
        unlink('text.txt');
    }

   if (!file_exists('text.txt')){
       fopen('text.txt','w+');
   }

    if (isset($_POST['text'])){
        file_put_contents('text.txt',$_POST['text'], FILE_APPEND);
    }

    $content = file_get_contents('text.txt');

    var_dump($_POST);


?>

<!DOCTYPE html>
<html>
<head></head>
<body>
    <div class="form">
        <form method="post">
            <input class="text" name="text" placeholder="Введите текс">
            <button type="submit">Отправить</button>
        </form>
        <p><?php echo $content ?></p>
        <form method="post">
            <button type="submit" name="clear">Очистить</button>
        </form>
    </div>
</body>
</html>
