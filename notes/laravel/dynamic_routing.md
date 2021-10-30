# Routing

Inside of a Laravel project, the routes/web.php is where the routes for the webpages will live. The structure of a route is:

```php
Route::get("/", function () {
    return view("welcome.php");
})
```

Using the Route facade and the get method is how we handle get routes. We then need to pass a match so that the URI can match the route, then a callback that will trigger. In the above example, the function is returning a view function referencing the welcome.php file.

It is also possible to handle routes dynamically with the following:

```php

Route::get("posts/{post_id}", function ($post_id) {
    return view("post.php", ["post" => $post_id]);
})

```

This works the same way routing does in Rails and other frameworks. The curly brackets reference a placeholder that is passed to the callback function. This can be used in the rendering of the view in question by using an associative array.

It is also possible to use constraints at the routing level, rather than the view level. This is done by:

```php
Route::get("posts/{post_id}", function ($post_id) {
    return view("post.php", ["post_id" => $post_id]);
})->where(post_id, '[0-9]{1,}');

```

The where function here takes in the placeholder then a regex to assert this by, ensuring that the input matches. If it does not match for whatever reason, the view does not trigger.