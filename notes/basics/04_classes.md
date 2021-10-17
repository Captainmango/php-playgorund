# Classes

Classes like in other languages are representations of data that can be passed around inside a program.

These are created by using the class keyword and have attributes using the var keyword.

```php 

class Foo {
  var $bar;

}

```

referencing the attributes is done using the -> syntax.

```php
$foo = new Foo;
echo $foo->bar
```

We can also use the same keywords as in Java to declare class members. Public is accessible outside of the class. Private is inside of the class only and static is declaring that an instance of the class is not needed.

```php 

      class Foo {

        public static $count = 0;

        public function __construct($bar){
          $this->bar = $bar;
          self::$count++;
        }

        private function test() {
          return strtoupper($this->bar);
        }

        static function countOf() {
          return self::$count;
        }
      }

      $foo1 = new Foo("Foo1");
      $foo2 = new Foo("Foo2");

      echo Foo::countOf();

```

## Constructors

Constructors are invoked the same was as other languages and allow us to create an object's attributes at initialisation. This is done using the function keyword and __construct. This is different from other langauges as the keyword doesn't seem to be reserved and is instead a reference to a constant.

```php

class Foo {

  function __construct($var1){
    $this->var1 = $var1;
  }

}

```

We use the this keyword to reference the object that was initialised as in Java. Of course using dollar signs for this. We can also use the self keyword as in Ruby to reference the class itself. This is really useful for class variables.

One key thing to remember is that referencing static values should be done with namespacing rules (double colon), whereas accessing members should be done with the dash rocket. The double colon allows us to reference the classes namespace, so it is possible to pass a string name to this and the namespace will still work.

```php

    class Foo
    {
        public static $my_static = 'foo';

        public function staticValue() {
            return self::$my_static;
        }
    }

    class Bar extends Foo
    {
        public function fooStatic() {
            return parent::$my_static;
        }
    }


    echo Foo::$my_static . "\n";

    $foo = new Foo();
    echo $foo->staticValue() . "\n";
    echo $foo->my_static . "\n";      // Undefined "Property" my_static 

    echo $foo::$my_static . "\n";
    $classname = 'Foo';
    echo $classname::$my_static . "\n";

    echo Bar::$my_static . "\n";
    $bar = new Bar();
    echo $bar->fooStatic() . "\n";
?>

```

Unlike Java and Ruby, we use the parent keyword instead of super to reference the parent class.

## Inheritance

PHP supports single and multiple Inheritance. To do single inheritance, we use the extends keyword.

```php

    class Foo
    {
        public static $my_static = 'foo';

        public function staticValue() {
            return self::$my_static;
        }
    }

    class Bar extends Foo
    {
        public function fooStatic() {
            return parent::$my_static;
        }
    }

```

If we want to use multiple classes to build the behaviour of a child class, we need to do some jimmyrigging and a new keyword.

The trait keyword is functionally like a module in Ruby. It works like a class, but is intended to only package logic. These work the exact same way as a module in Ruby and of course lack the constructor.

```php

trait {
  public function foo() {
    return;
  }

}

```

We also have access to interfaces in PHP and these work in the exact way as Java, using the implements keyword to adopt the qualities of the interface. We can then use and combine these interchangably to get the desired class behaviour.

```php

    class A {
      public function insideA() {
        echo "I am in class A"
        }
    }
      
    interface B {
      public function insideB();
    }
      
    class Multiple extends A implements B {
      
        function insideB() {
            echo "I am in interface";
        }
      
        public function insideMultiple() {
        echo "I am in inherited class";
        }
    }


```

In this way, class Multiple is inheriting from both class A and interface B, thus inheriting from multiple parents. It would also be possible to package the logic of the classes into traits and using the use keyword to include these in the Multiple class.

When using traits, these can be combined into a single line if using multiple. Extends and implements do not support this. This is why multiple inheritcance is a jimmyrig in PHP.

```PHP

trait A {
   public function insideA();
}
  
trait B {
   public function insideB();
}
  
class Multiple {

    use A,B;

}


```

## dependency injection

This works the exact same way it does in Java and Angular. Classes representing the logic are passed into an object's constructor and are asserted to be the correct thing using type hints.

```php

class Foo {

  private $dbConn = null;
  
  public function __construct(Database $database){
    $this->dbConn = $database;
  }
}

```

A key difference in PHP is the need to initialise a null variable for the dependency. If we don't do this, we'll get an uninitialised variable error as PHP won't know how to create this variable without the reference in the class.