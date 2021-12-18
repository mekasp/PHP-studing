<?php

//fopen('myfile.txt','w+'); - ф-ция для открытия и создания файла

//mkdir('testfolder',0777); - ф-ция для создания директории

//$file = fopen('myFile.txt','w+');
//
//fwrite($file,'старая шалава,дай мне кассу'); - ф-ция записи

//$file = fopen('myFile.txt','r'); - для открытия файла
//
//$contents = fread($file, filesize('myFile.txt'));

//$contents = file_get_contents('myFile.txt');
//
//var_dump($contents);

//file_put_contents('myFile.txt',',сука ты вонючая', FILE_APPEND ); - добавляет данные в файл

//rmdir('имя директории') - удаляет директорию

//unlink('имя файла') - удаляет файл

//require ('myfille.txt'); - подключение файла

//include ('myfile.txt'); - подключение файла

//require_once ('myfile.txt'); - подключение файла только 1 раз
//
//require_once ('myfile.txt');

//include_once ('myfile.txt'); - подключение файла только 1 раз
//
//include_once ('myfile.txt');

//chmod('myfile.txt',0777); - изменение прав доступа

//move_uploaded_file($tmp_name - от куда высовывать, $path - куда совать); - ф-ция для перемещения вайла в другую дирикторию


/** КУКИ  */
/*
куки - это временные файлы для хранения пользовотельской информации

куки устанавливаются пользователю заголовком ответа от сервера (set-cookie)

и отправляются от пользователя заголовком запроса cookie

куки это временный файл

при обращении к сайту будет добавлять заголовок cookie

УСТАНОВКА COOKIE ЧЕРЕЗ PHP:

setcookie('имя куки','значение,которое хранится в куки(string)','время в формате unix')
*/
//if (!isset($_COOKIE['name'])){
//    setcookie('name',1,time() + 3600);w3
//}
//$_COOKIE['name']++;
//setcookie('name',$_COOKIE['name'],time() + 3600);
//   // setcookie('name',1,time() -1);
//    var_dump($_COOKIE);

    /** СЕССИИ  */
/*

сессия - фича от php,основанна на http cookie

пльзовательские данные хранятся на стороне сервера во временных файлах

УСТАНОВКА СЕССИЙ

session_start

*/
?>