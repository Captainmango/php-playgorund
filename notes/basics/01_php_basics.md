# PHP basics

## Variables

PHP is not a strictly typed language by default (but you can opt into strict typing by using: 
```php
declare(strict_types=1);

```
)

dollar signs are also used to denote variables. If these aren't used, PHP thinks these are function declarations.

```php
$var1 = 12;
$var2 = "test string";


```

Variable string interpolation is done by simply including the variable name in the string. 

```php
$var1 = "var1";
"this is a test with $var1";
```

## Data types

Data types in PHP are the same as other scripting languages (ints, Strings, booleans etc). There is no need to define types when declaring variables, but you can define the parameter types of a function with a scalar type declaration. Booleans are like Java and Ruby where the value is lowercase. PHP also has null but not undefined. All variables are initialised as null, but variables cannot have null value, so this will throw an error. You can also do return types like you do in Python.

```php

function testFunc(int $a, int $b): int {
  return $a + $b;
}

testFunc(1,4);

$testBool = true;

```

## Working with Strings

Strings re always done with double quotes. However, normal rules for double or single quotes work in PHP.

Normal string functions exist too.

```php
$testVar = "String";

// makes all chars lower case
strtolower($testVar); //=> "string"

// makes all chars upper case
strtoupper($testVar); //=> "STRING"

// returns length of string
strlen($testVar); //=> 5

// replaces substring with phrase in the provided string (args in that order)
str_replace("st", "b", $testVar); //=> "bring"

// return substring from the string at the starting index with optional length arg
substr($testVar, 2, 3); //=> "rin"

```

Strings are also indexable using the Java and Ruby rules. Square brackets and 0-indexed.

Indexes of strings are modifiable. Unlike Java, you do not insert when writing to an index.

```php

$string = "test";
$string[0] = "b";

echo $string; //=> "best"

```

## Working with numbers

PHP uses the standard math operators. No weird stuff here. As numbers are not statically typed, there is no need to worry about floats vs doubles. By default, numbers in PHP are floats if they have a decimal. raising a number to the power of is done with the pow function.

```php

2+2; //=> 4
2-2; //=> 0
2/2; //=> 1
2*2; //=> 4
2%2; //=> 0

pow(2,2); //=> 4
sqrt(4); //=> 2
max(1,4); //=> 4
min(1,4); //=> 1

```

You can use Java rules for incrementing and decrementing numbers. Can also do the += syntax. Also support for pre and post variable incrementing.

```PHP

$var1 = 3;

++$var1 //=> 4
$var1++ //=> 3 (has been reassinged the value of 4)

```

## Getting user input

Unlike other languages, PHP doesn't need std.io or some other std library to get user input. You can just create an HTML form with inputs and make the action attribute a PHP script/ function.

```php

<form action="myScript.php" method="get">
  <input type="text" name="var"/>
  <input type="submit"/>

</form>

echo htmlspecialchars($_GET["var"]);

```

What the above does is allow the user to enter a string, submit and see the result on the page. As PHP is a scripting language, this runs in the browser natively.

Getting args passed to a script in the console is done by using $argv. This is an array.

```php

php myscript.php 1 2 3 4 //=> args are 0-indexed.

```