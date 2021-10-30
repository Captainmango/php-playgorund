# Blade templates

Blade works similarly to ejs and erb, with some nicer pieces. First, we can opt in to using yield or directives in any of our files.

```html

<x-layout>
    <div>Stuff</div>
</x-layout>

<!-- OR -->

@extends("layout")

@section("slot")
    <div>Stuff</div>
@endsection

```

This will be used in:

```html

<html>
    {{ @slot }}
</html>

<!-- OR -->

<html>
    @yield("slot")
</html>


```

The directive has to be used in the child template. Slots for content can be named anything and the default variable for rendering out child html is @slot (unless named in the child). To do this, we just define the name of the slot, regardless of using yield or directives.

Blade is very similar in syntax to Angular, using directives in the markup to achieve mapping or conditional logic. This can be combined with PHP very seamlessly.

```php

@foreach ($posts as $post)
    <x-post>
        <x-slot name="title">{{ $post->title }}</x-slot>
        <x-slot name="body"> {{ $post->body }}</x-slot>
    </x-post>

@endforeach

```

Notice that when referencing the slots using directives, we have to pass the name attribute. 


Properties of the object are referenced with curly brackets. Unlike Angular though, there is no 2 way databinding.