<?php

//1. Какие типы паттернов проектирования существуют?

//абстрактная фабрика (abstract factory)
//строитель (builder)
//фабричный метод (factory method)
//ленивая инициализация (lazy initialization)
//объектный пул (object pool)
//прототип (prototype)
//одиночка (singleton)
//пул одиночек (Multiton)

//2. Как можно улучшить Singleton при помощи trait-ов?

// позволяет повторно использовать наборы методов свободно
// с помощью trait можно переопределить функции

//3. Как реализуется паттерн Фабричный метод? В чем его отличие от паттерна Фабрика?

//Паттерн Фабричный метод  — это устройство классов, при котором подклассы могут переопределять тип создаваемого
//в суперклассе продукта.
//Фабрика — это общая концепция проектирования функций, методов и классов, когда какая-то одна часть программы
//отвечает за создание других частей программы.

/**
 * Фабрика
 */
interface Factory
{

    /**
     * Возвращает продукт
     *
     * @return Product
     */
    public function getProduct();
}

/**
 * Продукт
 */
interface Product
{

    /**
     * Возвращает название продукта
     *
     * @return string
     */
    public function getName();
}

/**
 * Первая фабрика
 */
class FirstFactory implements Factory
{

    /**
     * Возвращает продукт
     *
     * @return Product
     */
    public function getProduct()
    {
        return new FirstProduct();
    }
}

/**
 * Вторая фабрика
 */
class SecondFactory implements Factory
{

    /**
     * Возвращает продукт
     *
     * @return Product
     */
    public function getProduct()
    {
        return new SecondProduct();
    }
}

/**
 * Первый продукт
 */
class FirstProduct implements Product
{

    /**
     * Возвращает название продукта
     *
     * @return string
     */
    public function getName()
    {
        return 'The first product';
    }
}

/**
 * Второй продукт
 */
class SecondProduct implements Product
{

    /**
     * Возвращает название продукта
     *
     * @return string
     */
    public function getName()
    {
        return 'Second product';
    }
}

/*
 * =====================================
 *        USING OF FACTORY METHOD
 * =====================================
 */

$factory = new FirstFactory();
$firstProduct = $factory->getProduct();
$factory = new SecondFactory();
$secondProduct = $factory->getProduct();

print_r($firstProduct->getName());
// The first product
print_r($secondProduct->getName());
// Second product

//4. Объясните назначение и применение магических методов __get, __set, __isset, __unset, __call и __callStatic.
// Когда, как и почему их стоит использовать (или нет)?

// __get - будет выполнен при чтении данных из недоступных свойств
// __set - будет выполнен при записи данных в недоступные свойства
// __isset - будет выполнен при использовании isset() или empty() на недоступных свойствах
// __unset - будет выполнен при вызове unset() на недоступном свойстве
// __call - запускается при вызове недоступных методов в контексте объект
// __callStatic - запускается при вызове недоступных методов в статическом контексте

//5. Опишите несколько структур данных из стандартной библиотеки PHP (SPL). Приведите примеры использования.

//SplDoublyLinkedList — Двусвязные списки
//SplStack — Стек
//SplQueue — Очередь
//SplHeap — Куча
//SplMaxHeap — Сортировка кучи по убыванию
//SplMinHeap — Сортировка кучи по возрастанию
//SplPriorityQueue — Приоритетные очереди
//SplFixedArray — Массив с ограниченной длиной
//SplObjectStorage — Хранилище объектов

//6. Найдите все ошибки в коде:
interface MyInt {
    public function funcI();
    public function funcP();
}

class A {
    protected $prop1;
    private $prop2;

    function funcA(){
        return $this->prop2;
    }
}

class B extends A {
    function funcB(){
        return $this->prop1;
    }
}

class C extends B implements MyInt {
    function funcB(){
        return $this->prop1;
    }
    public function funcI(){
        return 123;
    }
    public function funcP(){
        return 123;
    }
}
$b = new B();
$b->funcA();
$c = new C();
$c->funcI();