<?php

/********************************
 * Classes
 */

// Classes are defined with the class keyword

class MyClass
{
    const MY_CONST      = 'value'; // A constant

    static $staticVar   = 'static';

    // Static variables and their visibility
    public static $publicStaticVar = 'publicStatic';
    // Accessible within the class only
    private static $privateStaticVar = 'privateStatic';
    // Accessible from the class and subclasses
    protected static $protectedStaticVar = 'protectedStatic';

    // Properties must declare their visibility
    public $property    = 'public';
    public $instanceProp;
    protected $prot = 'protected'; // Accessible from the class and subclasses
    private $priv   = 'private';   // Accessible within the class only

    // Create a constructor with __construct
    public function __construct($instanceProp)
    {
        // Access instance variables with $this
        $this->instanceProp = $instanceProp;
    }

    // Methods are declared as functions inside a class
    public function myMethod()
    {
        print 'MyClass';
    }

    // final keyword would make a function unoverridable
    final function youCannotOverrideMe()
    {
    }

    // Magic Methods

    // what to do if Object is treated as a String
    public function __toString()
    {
        return $property;
    }

    // opposite to __construct()
    // called when object is no longer referenced
    public function __destruct()
    {
        print "Destroying";
    }

/*
 * Declaring class properties or methods as static makes them accessible without
 * needing an instantiation of the class. A property declared as static can not
 * be accessed with an instantiated class object (though a static method can).
 */

    public static function myStaticMethod()
    {
        print 'I am static';
    }
}

// Class constants can always be accessed statically
echo MyClass::MY_CONST;    // Outputs 'value';

echo MyClass::$staticVar;  // Outputs 'static';
MyClass::myStaticMethod(); // Outputs 'I am static';

// Instantiate classes using new
$my_class = new MyClass('An instance property');
// The parentheses are optional if not passing in an argument.

// Access class members using ->
echo $my_class->property;     // => "public"
echo $my_class->instanceProp; // => "An instance property"
$my_class->myMethod();        // => "MyClass"

// Nullsafe operators since PHP 8
// You can use this when you're unsure if the abstraction of $my_class contains has a property/method
// it can be used in conjunction with the nullish coalesce operator to ensure proper value
echo $my_class->invalid_property; // An error is thrown
echo $my_class?->invalid_property; // => NULL
echo $my_class?->invalid_property ?? "public"; // => "public"

// Extend classes using "extends"
class MyOtherClass extends MyClass
{
    function printProtectedProperty()
    {
        echo $this->prot;
    }

    // Override a method
    function myMethod()
    {
        parent::myMethod();
        print ' > MyOtherClass';
    }
}

$my_other_class = new MyOtherClass('Instance prop');
$my_other_class->printProtectedProperty(); // => Prints "protected"
$my_other_class->myMethod();               // Prints "MyClass > MyOtherClass"

final class YouCannotExtendMe
{
}

// You can use "magic methods" to create getters and setters
class MyMapClass
{
    private $property;

    public function __get($key)
    {
        return $this->$key;
    }

    public function __set($key, $value)
    {
        $this->$key = $value;
    }
}

$x = new MyMapClass();
echo $x->property; // Will use the __get() method
$x->property = 'Something'; // Will use the __set() method

// Classes can be abstract (using the abstract keyword) or
// implement interfaces (using the implements keyword).
// An interface is declared with the interface keyword.

interface InterfaceOne
{
    public function doSomething();
}

interface InterfaceTwo
{
    public function doSomethingElse();
}

// interfaces can be extended
interface InterfaceThree extends InterfaceTwo
{
    public function doAnotherContract();
}

abstract class MyAbstractClass implements InterfaceOne
{
    public $x = 'doSomething';
}

class MyConcreteClass extends MyAbstractClass implements InterfaceTwo
{
    public function doSomething()
    {
        echo $x;
    }

    public function doSomethingElse()
    {
        echo 'doSomethingElse';
    }
}


// Classes can implement more than one interface
class SomeOtherClass implements InterfaceOne, InterfaceTwo
{
    public function doSomething()
    {
        echo 'doSomething';
    }

    public function doSomethingElse()
    {
        echo 'doSomethingElse';
    }
}


/********************************
 * Traits
 */

// Traits are available from PHP 5.4.0 and are declared using "trait"

trait MyTrait
{
    public function myTraitMethod()
    {
        print 'I have MyTrait';
    }
}

class MyTraitfulClass
{
    use MyTrait;
}

$cls = new MyTraitfulClass();
$cls->myTraitMethod(); // Prints "I have MyTrait"


/**********************
* Late Static Binding
*
*/

class ParentClass
{
    public static function who()
    {
        echo "I'm a " . __CLASS__ . "\n";
    }

    public static function test()
    {
        // self references the class the method is defined within
        self::who();
        // static references the class the method was invoked on
        static::who();
    }
}

ParentClass::test();
/*
I'm a ParentClass
I'm a ParentClass
*/

class ChildClass extends ParentClass
{
    public static function who()
    {
        echo "But I'm " . __CLASS__ . "\n";
    }
}

ChildClass::test();
/*
I'm a ParentClass
But I'm ChildClass
*/

/**********************
*  Magic constants
*
*/

// Get current class name. Must be used inside a class declaration.
echo "Current class name is " . __CLASS__;

// Get full path directory of a file
echo "Current directory is " . __DIR__;

    // Typical usage
    require __DIR__ . '/vendor/autoload.php';

// Get full path of a file
echo "Current file path is " . __FILE__;

// Get current function name
echo "Current function name is " . __FUNCTION__;

// Get current line number
echo "Current line number is " . __LINE__;

// Get the name of the current method. Only returns a value when used inside a trait or object declaration.
echo "Current method is " . __METHOD__;

// Get the name of the current namespace
echo "Current namespace is " . __NAMESPACE__;

// Get the name of the current trait. Only returns a value when used inside a trait or object declaration.
echo "Current trait is " . __TRAIT__;

/**********************
*  Error Handling
*
*/

// Simple error handling can be done with try catch block

try {
    // Do something
} catch (Exception $e) {
    // Handle exception
}

// When using try catch blocks in a namespaced environment it is important to
// escape to the global namespace, because Exceptions are classes, and the
// Exception class exists in the global namespace. This can be done using a
// leading backslash to catch the Exception.

try {
    // Do something
} catch (\Exception $e) {
    // Handle exception
}

// Custom exceptions

class MyException extends Exception {}

try {

    $condition = true;

    if ($condition) {
        throw new MyException('Something just happened');
    }

} catch (MyException $e) {
    // Handle my exception
}

/********************************
 * Namespaces
 */

// By default, classes exist in the global namespace, and can
// be explicitly called with a backslash.
$cls = new \MyClass();

// This section is separate, because a namespace declaration
// must be the first statement in a file. Let's pretend that is not the case

include 'namespace.php';

// (from another file)
$cls = new My\Namespace\MyClass;

