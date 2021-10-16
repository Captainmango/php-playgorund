# PHP on the client side


## URL parameters

URL parameters work the same way they do in other languages. A key difference with PHP though is that a function ran by a form will interpolate these values into the URL. This is because the script is using the GET method, so has to mutate the URL to get this to work. This showcases PHP's serverside nature.

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

Functions work as they do in Java. Key differences are no need to declare types of variables. However, you can include these if needed as 'type hints'. You can also have a scalar type definition to restrict the return type at compile time.

Declaring functions is donw with the function keyword and follows normal curly bracket rules for functions.

## return statements

As normal, return exits function execution and returns a value to the function caller. Like Java, they need to have a semicolon at the end.