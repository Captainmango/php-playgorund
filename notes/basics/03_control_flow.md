# Control flow in PHP

## if statements

If statement work in the same way as normal. Only quirks are to remember the dollar signs for variables.

Functions that return values are valid inside of if statements, unlike Java. You can do strict equality operators by using triple equals as you do in Javascript and fuzzy by using double.

```php

    $var1 = 5;
    
    function double (int $num): int{
      return $num*2;
    }

    if(double($var1) > 7){
      echo "this is a big number";
    }

```

There isn't a need to type check as PHP isn't a typed language by default.

## Switch statements

These are the same as in Java and Javascript. A key thing to be aware of is that the switch statements work in a similar way to Ruby in that you can only check value and not expressions.

```php

$var1 = "a";

switch($var1){
  case "a":
    echo "stuff";
    break;
  case "b":
    echo "more stuff";
    break;
  default:
    echo "No stuff :(";
}

```

## while loops

While loops work like they do in other languages. PHP has access to do while loops that work in the exact same way as Java. There are no differences in how they work or in performance.

```php

$var1 = 5;

while($var1 > 0){
  echo $var1;
  $var1--;
}

// the do while version

do{
  echo "do stuff here";
  $var1--;
} while($var1 > 0);

```

## for loops

For loops work the same way as other languages. A key difference is the need to use the dollar sign in the initialisation of the iterator variable.

```php 
$varArray = [1,2,3,4];

for($i = 0; $i < count($varArray); $i++){
  echo $varArray[$i];
}

```

Unlike other languages, len or length is not a function or method. To get number of elements in an array, you have to use count function. 

To get the length of numbers, we have to do some code gymnastics.