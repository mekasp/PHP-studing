<?php

/*
 * PHP - выполняется только один раз,при отправке запроса
интерпритатор - это программа,которая выпоняет написаный код
компиляция - это процесс преобразования кода в машинный(нули и единыцы)
PHP - это интерпритируемый язык,его код выполняется интерпритатором
PHP - выполняется сверху вниз,выполняется только один раз,при вызове скрипта

 * */

/**В PHP динамическая типизация

//комментарии - однострочный

/**
комментарии
комментарии
комментарии - многострочный комментарий
комментарии
комментарии
 **/

//переменныйе
$luba = 1;

$lubA = 2;

//echo $luba;

//echo $lubA;

/**
 PHP поддерживает 10 простых типов
   4 скалярных типа:
        1 Bool - булевский true,false
        2 Int - целые числа ( 1 )
        3 Float - число с остатком( 1.5)
        4 String - строковый (можно записывать все

   4 смешанных типа:
       5 Array - массив(включает себя мног строчек по типу таблицы)
       6 Object - обьект
       7 Callable - функции (все,что можно вызвать)
       8 Iterable - итерируемые обьекти(можно перебирать циклом)

   2 специальных типа:
       9 Resource - русурсы(ссылка на внешний ресурс)
       10 Null - обозначающий пустоту
 */


//1 bool
$var = true;
//var_dump($var);

//2 int
$var = 1;
//var_dump($var);

//3 float
$var = 1.78;
//var_dump($var);

//4 string
$var = 'knbddd 244 jnfdbd';
$var = "bwejgj57 387t7 hdhbhwe1 3";
//var_dump($var);

//5 array
$var = array('1',2,'maxim');
//var_dump($var);
$var = ['1',2.47,'maxim'];
//var_dump($var);

//6 object
class Maxim {
}
$var = new Maxim();
//var_dump($var);

//7 callable
$var = function (){
};
//var_dump(is_callable($var));

//8 iterable
$var = [1,2,3];
//var_dump (is_iterable($var));

//9 resource
$var = curl_init();
//var_dump($var);

//10 null
$var = null;
//var_dump($var);

/** Арифметические операции */

$var = 789 * 167 / 4891 + 8 *(987+1892);
//var_dump($var);

$x = 5;
$y = 10;
$result = $x * $y + ($x + $y);
$x += 3;
$x -= 3;
//инкремент и декремент
$x++;
$x--;
//echo $result;

/** Строковые операции (конкатенация) */

$firstname = "Maxim";
$lastname = "Papkov";
$result = $firstname . ' ' . $lastname;
//echo $result;
//echo $firstname;
$firstname .= $lastname;
//echo $firstname;

$value = 4;
$string1 = "У меня $value яблока"; //можно вставить переменную без канкатенации
$string2 = 'У меня $value яблока'; //нельзя вставить переменную без канкатенации
//var_dump($string1);
//var_dump($string2);


/** логические операторы */

// ==  равенство
// != неравенство
// === сравнивает и значение, и тип данных
//!== сравнивает и значение, и тип данных
// < меньше
// > больше
// <= меньше или равно
// >= больше или равно
// && и
// || или
// += добавление к текущему цислу нового
// -= вычитание от текущего числа
//==
$nubber1 = 2;
$nubber2 = 3;
$var = $nubber1 == $nubber2;
//var_dump($var);

//===
$nubber1 = 2;
$nubber2 = '3';
$var = $nubber1 === $nubber2;
//var_dump($var);

//!=
$nubber1 = 2;
$nubber2 = 3;
$var = $nubber1 != $nubber2;
//var_dump($var);

//!==
$nubber1 = 2;
$nubber2 = '2';
$var = $nubber1 !== $nubber2;
//var_dump($var);

//<
$nubber1 = 2;
$nubber2 = 3;
$var = $nubber1 < $nubber2;
//var_dump($var);

//>
$nubber1 = 2;
$nubber2 = 3;
$var = $nubber1 > $nubber2;
//var_dump($var);

//&&
$nubber1 = 2;
$nubber2 = 3;
$var = ($nubber1 ==2 && $nubber2 ==2);
//var_dump($var);

//||
$nubber1 = 2;
$nubber2 = 3;
$var = $nubber1 == 1 || $nubber2 ==3;
//var_dump($var);

$x = 2;
$y = 1;
$name = "Max";

$var = ( (($x *$x) ==4 && $name == "Mesha") || ($y + $y * $x) == 3 || ($name == "Max" && $x == 2) );
//var_dump($var);

$x = 0;
$y = 1;
$var = (!$x && $y);
//var_dump($var);

/** конструкция if else */

//$x = 5;
//$x--;
//if ($x == 5) {
//    echo 'okay';
//} else {
//    echo 'no';
//}
//echo 'end';

$x = rand(1,5);

//if ($x == 1) {
//    echo 'one';
//} elseif ($x == 2) {
//    echo 'two';
//} elseif ($x == 3) {
//    echo 'three';
//} else {
//    echo 'other';
//}


/** Глобальные переменные */

//$_SERVER

//echo $_SERVER['REMOTE_ADDR'];

//$_GET - данные HTTP get запросы

//$_POST - данные HTTP post запросы

//$_FILES - переменные файлов,загруженных по HTTP

//$_COOKIE - список всех cookies

//$_SESSION - список всех сессий

//$_REQUEST - переменные HTTP запроса (POST/GET)

//$_ENV - переменная окружения


/** Тернарные операторы  */

//$num = 10;
//
//$result = $num == 10 ? 'max' : 'norm';
//
//var_dump($result);

//$num = 10;
////
////$result = $num == 10 && is_integer($num) ? 'integer' : 'string';
////
////var_dump($result);

//$x = 2;
//
//$y = 1;
//
//$result = $x > $y ? 'x больше y' : 'x меньше y';
//
//var_dump($result);

//$x = 1;
//
//$y = 2;
//
//if ($x > 0 && $y > 0) {
//    echo "Ваши координаты " . $x . ',' . $y ;
//} else {
//    echo 'Вы указали не верные координаты';
//}

//$number = 10;
//
//if (is_integer($number / 2)) {
//    echo $number . ' четное';
//} else {
//    echo $number . ' нечетное';
//}

/** Конструкция SWITCH */

//$root = 2;
//
//switch ($root) {
//    case 1;
//        echo 'можете просматривать записи';
//        break;
//    case 2;
//        echo 'можете просматривать,редактировать записи';
//        break;
//    case 3;
//        echo 'можете просматривать,редактировать,удалять записи';
//        break;
//    case 4;
//        echo '...';
//        break;
//    default: echo 'та пошел ты на хуй';
//}

//$var = [1,5,4];
//
//switch ($var) {
//    case (is_integer($var));
//        echo 'integer';
//        break;
//    case (is_float($var));
//        echo  'float';
//        break;
//    case (is_string($var));
//        echo 'string';
//        break;
//    case (is_array($var));
//        echo 'array';
//        break;
//    default: 'other';
//}

/** Массивы */

//$var = [1,2,3];
//
//var_dump($var);

/** неассоциативный массив */
//$var = [
//    0 => 1,
//    2 => 2,
//    3 => 3,
//];
//
//var_dump($var);



/** ассоциативный массив */

//$zoo = [
//    'lions' => 3,
//    'rats' => 4,
//    'elephants' => 2,
//];
//
//var_dump($zoo);

/** ключи массива */

//$var = [1,2,3];
//$var[] = 4;
//$var[] =5;
//
//$var[0] =10;
//$var[10] =10;
//$var[] =1;
//$var[6] =1;
//$var[] =1;
//$var['author'] = 'Maxim';
//
//var_dump($var['author']);

/** многомерные массивы */

//$users = [
//    0 => [
//        'name' => 'Max',
//        'age' => 21,
//    ],
//    1 => [
//        'name' => 'Misha',
//        'age' => 23,
//    ]
//];
//$users[] = [
//    'name' => 'Natya',
//    'age' => 24,
//];
//
//
//var_dump($users);

/** Циклы */

// Итерация - один шаг итерационного,циклического процесса
// Итератор - указатель текущей итерации

//for ($i = 0; $i < 10; $i++) {
//    echo $i . "\r\n";
//}

//$users = ['musha','igor','vova','max','lesha'];
//
//for ($i = 0; $i < count($users); $i++) {
//    echo $users[$i] . "<br/>";

//for ($i = 10; $i > 0; $i--) {
//    echo $i . "<br/>";
//}

//for ($i = 0; $i <5; $i++) {
//    for ($x = 0; $x <= $i; $x++){
//        echo "x";
//    }
//    echo "<br/>";
//}

//$users = ['misha','misha1','misha2','misha3','misha4'];

//foreach ($users as $key => $user) {
//    echo $key . ":" . $user . "<br/>";
//}

//foreach ($users as $user) {
//    echo $user . "<br/>";
//}


//$users = [
//    0 => [
//        'name' => 'misha',
//        'age' => '21',
//    ],
//    1 => [
//        'name' => 'max',
//        'age' => '20',
//    ],
//    2 => [
//        'name' => 'vova',
//        'age' => '23',
//    ],
//];
//
//foreach ($users as $key => $user) {
//    if ($user['name'] = 'misha'){
//        $user['age'] = '23';
//    }
//}
//var_dump($user);

//$x=1;
//
//while($x<5){
//    $x++;
//}
//
//echo $x;

//$x = rand(1,10);
//
//$count = 0;
//
//while ($x !== 7){
//    $count++;
//    $x = rand(1,10);
//}
//
//echo $count;

//'while' и 'do while' - это один и тот же цикл,который отличается выполнением условия
//$x = 5;

//do {
//    $x++;
//} while ($x < 5);
//
//$y = 5;
//
//while($y < 5){
//    $y++;
//}

//$i = 10;
//
//while ($i > 0){
//    $i--;
//}
//
//echo $i;

//$text = 'Учитывая мат ключевые сценарии мат поведения, повышение мат уровня гражданского сознания однозначно мат определяет каждого участника мат как способного принимать собственные мат решения касаемо новых мат принципов формирования мат технической и кадровой базы!';
//
//strpos($text, 'мат');
//
//$count = 0;
//
//while (strpos($text, 'мат')!== false){
//    $count++;
//    $text = str_replace('мат','',$text);
//}
//
//echo $text . '<br>';
//
//echo $count;
//
//for ($i = 0; $i < 5; $i++){
//    if ($i== 3){
//        break;
//    }
//}
//
//echo $i;
//
//$numbers = [1,2,3,4,5];
//
//foreach ($numbers as $number){
//    if ($number == 3){
//        continue;
//    }
//    echo $number . '<br>';
//}

//$numbers = [10,20,15,17,24,35];
//
//$result = 0;
//
//foreach ($numbers as $number) {
//    $result += $number;
//}
//
//echo $result;

//$numbers = [10,20,15,17,24,35];
//
//$result = 0;
//
//foreach ($numbers as $number) {
//    $result = $number + $number;
//}
//
//echo $result;

//for ($i = 1; $i < 101; $i++){
//    echo $i . '<br>';
//}

//$arr = [
//    'green' => 'зеленый',
//    'black' => 'черный',
//    'blue' => 'голубой',
//    'pink' => 'розовый'
//];
//
//foreach ($arr as $key => $colors){
//    echo $key . ' - ' . $colors . '<br>';
//}

//$x = 0;
//
//while ($x<100){
//    $x += 2;
//    echo $x . '<br>';
//}

//for ($x = 0;$x < 100; $x++){
//    if (is_float($x / 2)){
//        echo $x . '<br>';
//    }
//

//$num = 1000;
//
//$result = 0;
//
//while ($num > 50){
//    $result++;
//    $num = $num / 2;
//}
//
//echo $num . '<br>';
//echo $result;

$num = 1000;

//for ($i = 0;$num >= 50;$i++){
//    $num = $num / 2;
//}
// echo $num . '<br>';
//echo $i;


/** URI URL URN */

//URI - ru.wikipedia.org/wiki/URI

//URL - ru.wikipedia.org

//URN - wiki/URI

//Хост - любое устройство,подключнное к локальной тлт глобальной сети.

//IP-адрес - уникальный номер в сети ( 127.0.01 )

//MAC-адрес - уникальный адрес для устройства

//Порт - числоЮкоторое указывает на определенный сокет ( от 1 до 65 535 )

//Протокл - набор правил и действий

//HTTP(Hypertext Transfer Protocol) - протокол передачи гипертекста

//FTP(File Transfer Protocol) - протокол передачи файлов

//SMTP(Simple Mail Transfer Protocol) - протокол передачи почты

//TELNET - протокол удаленного доступа

/** функции */

// Функиця - архетиктурный подход и абстракция от функционала

//function calculateNumbers($x, $y){
//    return $x + $y;
//}
//
//$result = calculateNumbers(5, 7);
//
//echo $result;
//
//Пример области видимости

//$c = 2;
//
//function calculateNumbers($x, $y){
//    return $x + $y +$c;
//}
//
//$result = calculateNumbers(5, 7);
//
//echo $result;



