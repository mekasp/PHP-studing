<?php
$answer = $_GET['answer'];
$result = '';

if ($answer == 'Фомик'){
    $result = 'Правильно';
} else {
    $result = 'НЕТ,ты дебил';
}

?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <form method="get">
            <p>Кто лежал в дурке?</p>
            <select name="answer">
                <option value="Фомик">Фомик</option>
                <option value="Петя">Петя</option>
            </select>
            <button type="submit">
                ответ
            </button>
        </form>
        <?php
        echo $result
        ?>
    </body>
</html>
