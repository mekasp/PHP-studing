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

/* Детальный разбор основных принципов ООП */

/** Принцип - это то чему обязательно нужно следовать в определённых ситуациях. */

/** Инкапсуляция */ /*
Инкапсуляция - это свойство класса регулировать доступ к определенным своим компонентам извне самого класса.
Пример из жизни: Например, на мониторе есть кнопки регулировки яркости – они в прямом доступе для пользователя. А есть микросхемы внутри – к ним доступ ограничен.
Примеры в коде:

Пример №1
В этом примере класс Users содержит имена пользователей в приватном свойстве $users, доступ к этому свойству ограничен,
но разграничивается при помощи публичных методов getUsers(достать всей пользователей) и addUser(добавить пользователя).
Таким образом свойство $users инкапсулировано, доступ к нему закрыт, но слегка разграничен позволяя совершать с этим свойством
только некоторые операции. Например нельзя очистить данные свойство $users, что возможно предотвращает появление разных ошибок.

class Users {
    private $users = ['john', 'jessica', 'david'];

    public function getUsers()
    {
        return $this->users;
    }

    public function addUser($name)
    {
        $this->users[] = $name;
    }
}
$obj = new Users();
$obj->addUser("Max");
$users = $obj->getUsers();

Пример №2

В классе DB реализовано подключение к базе данных, которое хранится в приватном свойстве $db.
Мы разграничиваем доступ к базе данных лишь одним методом getProducts позволяя получать из базы данных лишь товары,
но никаких других операций например удаления пользователь сделать не сможет.
Инкапсулировано свойство $db, в котором хранится подключение к базе данных.

Class DB {
	private $db;

	public function __construct($host, $user, $password, $db)
	{
		$this->db = mysqli_connect($host, $user, $password, $db);
	}

	public function getProducts()
	{
		$query = mysqli_query($this->db, "SELECT * FROM products");

		$products = $query->fetch_all(MYSQLI_ASSOC);

		return $products;
	}
}
$data = new DB("127.0.0.1", "root", "", "db_name");
$products = $data->getProducts();

Следование принципу инкапсуляции делает код защищённее избавляя программиста от большого кол-ва возможных проблем.
К примеру если вдруг на сайте появится ошибка, то вы точно будете уверены в том что она появилась не из за вашего класса,
или же по крайней мере это сузит круг поисков.
Также благодаря реализации интерфейсов вместо использования "микросхем", написанный код становится более абстрактным и им проще управлять,
так что в некотором роде принципы инкапсуляции реализует и принцип абстракции.

Нарушением принципа инкапсуляции является написание сложного неазищеённого кода без реализации интерфейса,
неправильное использование которого может привести к ошибкам и сложностям в дальнейшей поддержке приложения.

*/

/** Наследование */
/*
Наследование - позволяет одному обьекту приобретать свойства другого обьекта.
Наследование позволяет избежать дублирования кода, что позволяет следовать принципу DRY (Don't Repeat Yourself).
Такой подход избавит нас от большого кол-ва возможных проблем из за дублированного в разных местах одного и того же кода.

Например, когда в двух разных местах приложения написана одна и та же функция, вдруг нам пришла правка от заказчика слегка поправить эту функцию.
Мы поправили её в одном месте, а в другом забыли и теперь у нас всё работает хорошо и как следует в одном месте ,
а вдругом осталось как прежде или вообще приводит к ошибке. В итоге головная боль и выговор от заказчика.

Нарушением принципа наследования является дублирование одного и того же кода в нескольких местах
и игнорирования цепочки наследования в ситуациях когда это логически необходимо.

*/

/** Полиморфизм */

/*
Полиморфизм в программировании возможно стоит понимать двухсмысленно и быть готовым подстроится под другое его определение:

1. Полиморфизм позволяет использовать одни и тех же имена для похожих, но технически разных задач.
Главным в полиморфизме является то, что он позволяет манипулировать объектами путем создания стандартных интерфейсов для схожих действий.

2. Полиморфизм (греч. «многообразие форм») - в программировании означает возможность использования одного имени
для методов разных классов находящихся в одной иерархии наследования (т.е. в родственных классах) с целью выполнения схожих действий.

Из обоих этих определений можно выделить, что полиморфизм позволяет объектам использовать одинаковую спецификацию,
но при этом иметь различную реализацию. Возможно именно так и стоит трактовать полиморфизм в программировании.

По логике вещей само определение слова  "Полиморфизм" больше похоже на второе определение чем на первое,
но его можно объяснить и тем и тем, оба варианта будут верными.

Пример полиморфизма согласно определению #1:

В этом примере есть 2 класса Auth в друг разных пространствах имён, Admin/Auth предназначен для работы с админом,
а Client/Auth для работы с клиентом.
Оба они предназначены для работы с пользователем, имеют одинаковую спецификацию, но реализация при этом у них будет разной.

namespace Admin/Auth;
class Auth {
    public function register() {
        // зарегистрировать админа
    }
    public function login(){
        // залогинить админа
    }
}

namespace Client/Auth;
class Auth {
    public function register(){
        // зарегистрировать клиента
    }
    public function login(){
        // залогинить клиента
    }
}

Пример согласно определению #2:

В этом примере есть стандартный класс Dog, от которого наследуется два полимофрных типа PitBull
и Chihuahua. Полиморфные типы хоть и похожи между собой, но имеют разную реализацию своих методов.
В данном примере полиморфзим кажется более логично трактован, потому что есть изначальный родитель, который может изменяться.
Полимофрность - означает множественные изменения одного и того же объекта.
К примеру в биологии описывает как раз как способность объекта например собаки или человека иметь градацию полимофрных типов.
Напримере строения тела человека к примеру есть типы: эктоморф, мезоморф, эндоморф.

abstract class Dog {
    abstract public function woof();
}
class PitBull extends Dog {
    public function woof()
    {
        echo "Woof strongly";
    }
}
class Chihuahua extends Dog {
    public function woof()
    {
        echo "Woof Lightly";
    }
}

Зачем применять принцип полиморфизма? Он позволяет упростить чтение кода.
Если похожие объекты имеют одинаковую спецификацию то в них легко разобраться, а значит код будет писаться быстрее.

Нарушением принципа полиморфизма будет создание абсолютно разной спецификации для похожих по смыслу типов.

 */

/** Абстракция */
/*
Абстракция - это использование только тех характеристик обьекта, которые с достаточной точностью представляют его в данной системе.

Пример:

В данном примере исходя из названий самого класса и его методов сразу становится понятно, что тут должно происходить.
Класс наверняка работает с товаром, метод create наверняка создает товар, а delete наоборот его удаляет
Таким образом мы абстрагируемся от кода написанного в методе ограничиваясь только названием класса и метода, что экономит уйму времени.

class Product {
    public function create()
    {
        // функционал для создания товара
    }
    public function edit()
    {
        // функционал для редактирования товара
    }
    public function delete()
    {
        // функционал для удаления товара
    }
}

Абстракция позволяет не вчитываясь в функционал сразу приходить к пониманию что именно делает та или иная функция.

Нарушением принципа абстракции является написание непонятных названий классов, методов и свойств.

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