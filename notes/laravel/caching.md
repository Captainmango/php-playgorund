# caching

Caching is done by using the cache function. We can then use the remember closure to store the value in the cache. By default, Laravel will pull from the cache if the value exists there first. 

```php

cache()->remember("posts.{$post_id}, now()->addMinutes(60), fn() => file_get_contents($path));

```

The above line allows us to cache the post retrieved in a request, then attribute a callback function as the value to the key pair. The new style arrow function is very similar to Javascript.

Cache works like hashmap in Java. There is a get method to get based on a key, and a rememberForever that stores the values indefinitely.