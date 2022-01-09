<?php

/**
 * Обьект - это тип данных в php
 * Самый распространенный тип обьекта - класс
 * В классе можно хранить свойста и методы
 * Свойства и методы класс - те же переменые и функции
 * Для того,чтобы пользоваться свойствами и методами класса нужно создать его эземпляр
 */

/**
 * Основные принцыпы ооп:
 *  1. Инкапсуляция - свойство класса регулировать доступ к определенным своим компонентам извне самого класса
 *  2. Наследование - позволяет одному обьекту приобретать свойства другого обьекта.
 *  3. Полиморфизм - позволяет использовать одни и те же имена для похожих, но технически разных задач
 *  4. Абстракция - это использование только тех характеристик обьекта, которые с достаточной точностью представляют его в данной системе.
 */

/* Детальный разбор основных принципов ООП

Инкапсуляция - свойство класса регулировать доступ к определенным своим компонентам извне самого класса.
Пример из жизни: Например, на мониторе есть кнопки регулировки яркости – они в прямом доступе для пользователя. А есть микросхемы внутри – к ним доступ ограничен.
Пример в коде:
Class DB {
	private $db;

	public function __construct($host, $user, $password, $db)
	{
		$this->db = new Mysqli($host, $user, $password, $db);
	}

	public function getProducts()
	{
		$query = mysqli_query($this->db, "SELECT * FROM products");

		$products = $query->fetch_all(MYSQLI_ASSOC);

		return $products;
	}
}


*/


/** Классы **/
//Создание класса
class ClassName {
    //Свойства
    public $property1 = 1;
    public $property2 = 1;
    public static $property3 = 1;

    //Методы
    public function methodName($argument1,$argument2){ //методы класса
        //
    }
}
// Создание экземпляра класса
$object = new ClassName();

//обращение к свойству класса
echo $object->property1;
$object->property2 = 2;

//обращение к методу класса
$object->methodName(1,2);

//Внутри класса обращение к его свойствам и методам, а также к унаследованным свойствам и методам осуществляется при помощи псевдопеременной $this и опрератор ->
class ClassName {
    public $property = 1;

    private function increaseProperty(){
        $this->property++;
    }

    public function methodName(){
        $this->increaseProperty();
    }
}

/**  К свойствам и методам класса можно применять модификаторы доступа:
public - можно вызывать из класса,дочерних классов,экземпляров класса,статически
protected - можно вызывать из класса и дочерних классов
private - можно вызывать только и классов
 */

/** Статические свойства и методы */
//Обращение к свойствам и методам без создания экземпляра класса называется статическим обращением.
//Бывают статические свойсва и методы
//Пример обращение к статическому свойству
class TestName {
    //Для того чтобы обращаться к свойству статически нужно указать ключевое слово статик
    public static $x = "Hello";
}
//Обращение к статическому свойству класса статически(без создания экземпляра)
echo TestName::$x;
//обращение к методу класса статически(без создания экземпляра). Обращение к методу статически не требует указания методу ключевого слова static
echo ClassName::methodName(1,2);


/** Наследование **/
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


/** Namespace - пространства имён классов */
//Два одинаковых имени класса не может существовать в глобальном пространстве имён.
/* Пример конфлликта:

Есть два класса для авторизации admin/auth.php и client/auth.php
Оба имеют похожую спецификацию:
Auth {

}

Мы хотим подключить эти классы в один файл и делаем следующее:
require_once 'admin/auth.php';
require_once 'client/auth.php';

В результате чего получаем ошибку об одинаковы именах классов

Данный конфликт можно разрешить командой namespace , которая определяет пространство имён класса.

Пример :
namespace Admin;

class Auth {

}

Теперь обращение к классу admin/auth будет через пространство имён: $admin = new Admin/Auth();
То же самое следует проделать для client/auth.

namespace Client;

class Auth {

}


Иногда иерархия названия пространства имён может быть огромной и обращение к классу будет не удобным, для этого можно использовать клички:

use Admin/Auth as Admin;
use Client/Auth as Client;

$admin = new Admin();
$client = new Client();

*/


/** Магические методы */
//Называются магическими потому что срабатывают сами по себе в момент каких то определённых действий
/*
    Самые распространённые магические методы

    __construct() - срабатывает в момент создания экземпляра класса,
    если этот метод реализован внутри класса то в класс можно передать аргументы при создании его экземпляра, пример:

    class Test {
        public function __construct($string, $number, $array, $testObject){
               //some code
        }
    }
    $obj = new Test("string", 123, [], new Test());

    __get() - срабатывает в момент обращение к недоступному или несуществуюему свойству класса.

    __set() - срабатывает в момент попытки изменить значение недоступного или несуществующего свойства класса.
*/

/** Final классы */
// Абревиатура Final означает, что этот класс не может быть унаследован.
final class Parent{};
class Children extends Parent{}  // - приведет к ошибке

/** Abstract классы **/
//От этого класса нельзя создать экземпляр,только унаследовать
abstract class ClassName{
    //У абстрактного класса есть ещё одна особенность - это абстрактные методы.
    // Абстрактные методы не имеют реализации(тела функции) и обязаны быть реализованы в наследниках.
    // Абстрактные методы очень похожи на интерфейсы, их можно воспринимать как конткракты для наследников, которые они обязаны выполнить.
    abstract protected function methodName($atribute_1);
    public function methodName2(){
        //do something
    }
}


/** Типизация методов **/
// Можно типизировать аргументы методов, а также возвращаемое функцией значение.
Class ClassName {
    public function methodName(int $attribute_1, string $attribue2, array $attribute_3):void
    {
        //do something
    }
}
// В качестве типа аргумента или возвращаемого методом значения может вытупать каждый из типов данных в PHP, а также отдельные классы и специальный тип void (пустота):
public function methodName(int $attribute_1, string $attribue2, array $attribute_3): void
public function methodName(Class1 $attribute_1, Class2 $attribue2, array $attribute_3): array
public function methodName(Class1 $attribute_1, Class2 $attribue2, array $attribute_3): Class3

//Пример указания экземпляра конкретного класса в качестве аргумента и возвращаемого значения метода другого класса
class Class1{}
class Class2{
    public function test(Class1 $object): Class1
    {
        return $object;
    }
}
$obj = new Class2();
$obj->test(new Class1());


/** Интерфейсы **/
// Интерфейс - это обьект,в котором можно записывать только методы без тела.
// Интерфейсы стоит понимать как контракты, которые подключаемый их класс обязуется выполнить.
 Interface InterfaceName{
    public function functionName($attribute_1,$attribute_2);
 }

 class ClassName implements InterfaceName{
    public function functionName($attribute_1, $attribute_2)
    {
        // TODO: Implement functionName() method.
    }
 }
//Интерфейсы могут наследоваться от других интерфейсов.
Interface interface1 {}
Interface interface2 extends interface1 {}

//Один класс может использовать сразу несколько интерфейсов, это обязует класс выполнить все требования подключаемых интерфейсов.
class ClassName1 implements interface1,interface2{

}
// В интерфейсах можно завдавать типизацию методов:
public function functionName(int $attribute_1, string $attribute_2): void;
public function functionName(Class1 $attribute_1): Class1;


/** Trait Трейты */
//Объекты созданные специально для решения проблемы множественного наследования
//Пример трейта:
Trait TraitName {
    public $x = 1;

    public function test(){
        echo "Test";
    }
}
//Пример использования трейтов и решения проблемы множественного наследования
trait Hello {
    protected function sayHello(){
        return "Hello";
    }
}

trait World {
    protected function sayWorld(){
        return "World";
    }
}

class Test {
    use Hello, World;

    public function seyHelloWorld()
    {
        return $this->sayHello() . " " . $this->sayWorld();
    }
}

$obj = new Test();
echo $obj->seyHelloWorld();