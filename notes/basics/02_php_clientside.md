# PHP on the client side


## URL parameters

URL parameters work the same way they do in other languages. A key difference with PHP though is that a function ran by a form will interpolate these values into the URL. This is because the script is using the GET method, so has to mutate the URL to get this to work as no body is sent with a GET request. This showcases PHP's serverside nature.

Changing then URL params does cause state change. This looks like a security flaw tbh.

the function htmlspecialchars prevents XSS attacks by sanitising input.


## POST and GET in PHP

The http verbs are the same as before. But, due to the tightly coupled nature of PHP to the markup and browser, there are some quirks to be mindful of.

Using the POST method on a form will not allow the information entered to leak into the URL. This is great for passwords or tokens.

```php
  <form action="myScript.php" method="post">
    <input type="text" name="var"/>
    <input type="submit"/>

  </form>

  //=> URL will not change on submit of this form. However, the script will still have access.


```

## Functions

Functions work as they do in Java. Key differences are no need to declare types of variables. However, you can include these if needed as 'type hints'. You can also have a scalar type declarations to restrict the input type at compile time.

Declaring functions is done with the function keyword and follows normal curly bracket rules for functions.

## return statements

As normal, return exits function execution and returns a value to the function caller. Like Java, they need to have a semicolon at the end.

## include statements

This is how we include PHP scripts or HTML files into another file. This works like it does with templating languages like erb or handlebars.js. All that is needed is the include keyword and the path of the file you'd like to include. We need to include the file type here too.

```php

include "foo.html"

```

### PHP include

This is where PHP starts to feel like erb or handlebars.js. This will read data inside the parent file before the include of the child. You can predefine these inside of the child file and this will be presented when the script loads. If no variable matching the name is present, an error is thrown.

```php

$title = "this is a title";
include "header.php";

//=> the header.php file referenced is like the one in src. If the $title variable isn't BEFORE the include statement an error will occur. Error will be uninitialised variable error.


```

Using functions or classes inside of other PHP files is done by including the file too. This follows the Javascript rules insofar that the include statement needs to occur before the function is referenced. After that though, you can reference anything that isn't in a wrapper (like a module or class), by name.