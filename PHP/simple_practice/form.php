<?php
$number_1 = $_POST['number_1'];
$number_2 = $_POST['number_2'];
$operator = $_POST['operator'];
$result = 0;

if ($operator == '+'){
    $result = $number_1 + $number_2;
} elseif ($operator =='-'){
    $result = $number_1 - $number_2;
} elseif ($operator == '/'){
    $result = $number_1 / $number_2;
} elseif ($operator == '*'){
    $result = $number_1 * $number_2;
}
?>


<!DOCTYPE html>
<html>
<head></head>
<body>
    <form method="post">
        <input type="text" name="number_1"/>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="/">/</option>
            <option value="*">*</option>
        </select>
        <input type="text" name="number_2"/>
        <button type="submit">
            result
        </button>
    </form>
    <?php
    echo $number_1 . ' ' . $operator . ' ' . $number_2 . ' = ' . $result;
    ?>
</body>
</html>
