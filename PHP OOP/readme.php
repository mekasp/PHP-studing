<?php

/*
 * Обьект - это тип данных в php
 * Самый распространенный тип обьекта - класс
 * В классе можно хранить свойста и методы
 * Свойства и методы класс - те же переменые и функции
 * Для того,чтобы пользоваться свойствами и методами класса нужно создать его эземпляр
 */
class ClassName {                                      //создание класса
    public $property1 = 1;                             //свойства класса
    public $property2 = 1;                             //свойства класса
    public static $property3 = 1;
    public function methodName($argument1,$argument2){ //методы класса
        //
    }
}
// Создание экземпляра класса
$object = new ClassName();

//обращение к свойству класса
echo $object->property1;
$object->property2 = 2;

//Обращение к свойству класса статически(без создания экземпляра)
echo ClassName::$property3;

//обращение к методу класса
$object->methodName(1,2);
//обращение к методу класса статически(без создания экземпляра)
echo ClassName::methodName(1,2);

/*  К свойствам и методам класса можно применять модификаторы доступа:
    public - можно вызывать из класса,дочерних классов,экземпляров класса,статически
    protected - можно вызывать из класса и дочерних классов
    private - можно вызывать только и классов
*/

//Наследование одним классом свойст и методов другого класса
class Number1{
    protected $name ='max';
}

class Number2 extends Number1{

}

class Number3 extends Number2{
    public function showName(){
        return $this->name;
    }
}

$object = new Number3();
echo $object->showName();