# Accessing databases

When working with databases in Laravel, make sure the correct adaptor stype is selected. We can see this in the .env file at the route of the project. 

```yaml
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=foo-db

```

## Migrations

Migrations in Laravel work in the same way as they do with other MVC frameworks. We define these in database/migrations.

```php

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger("user_id");
            $table->string("title");
            $table->text("body");
            $table->timestamp("published_at")->nullable();
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table){
            $table->foreign("user_id")->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}

```

When defining migrations, we have to give an **_up_** and **_down_** method. This is so that Laravel knows how to handle teardown of tables.

Next, defining the fields on the tables requires a similar pattern to Ruby. Setting the id with the id() creates an autoincrementing bigInt inside of the db. The other types are obvious and are as in normal SQL builders.

Creating relationships is slightly different though. Here, we can create the foreign key constraint within the migration itself and this will be created natively within the db.

```php
Schema::table('posts', function (Blueprint $table)
{
$table->foreign("user_id")
    ->references('id')
    ->on('users');
});

```

By using the foreign(), we can pass a field name. This will be the name of the key on the db. Next, we can reference an id->on() another table to create the constraint. 

## Relationships

Creating relationships with Eloquent (Laravel's ORM) is a little more complex than with other frameworkss. But, it does allow for more control. We can do this on the models we want to create the relationships between.

```php

class Post extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

class User extends Authenticatable
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}


```

Before doing the above, we have to make sure that there is a foreign key that relates to the model on the respective table. By default, Laravel will assume that this key is named after the function that is creating the relationship. If we need to declare a different name, we can do this by passing it as a 2nd arg as a string.

```php

class User extends Authenticatable
{
    public function posts()
    {
        return $this->hasMany(Post::class, "article_id");
    }
}

```

The function, as shown, will return the relationship as shown. There are many functions that define the relationship (these are the normal has many, has one, etc.) and these will always accept a model class in order to build the relationship.

## Eager Loading Relationships

Eager loading a relationship allows for minimal SQL queries to be run in order to serve the necessary data. At small scale, this isn't an issue. But, at larger and production scales, this is very useful to prevent bottlenecks and server issues.

To eager load a resource that is related to another, we can do the following:

```php

public function show($post_id)
{
    if(!Post::find($post_id)) return redirect("/");
    
    return view('posts.postShow', [
        'post' => Post::find($post_id)->with([user])->get()
    ]);
}

```

Using the with() we can pull the related resource alongside the resource we are finding. On the backend this does a join in the DB.

```php

User::where('id',2)->with(['posts'])->get();

```

This is pulling the user with the id of 2 and their posts as a relationship. One thing to note is that the get() needs to be ran here as we are using a Eloquent builder rather than a function.

When working with an existing model, we can use the load().

```php

$user->posts->load(['comments'])

```

This does the exact same thing as above, but instead relies on property access on the models in question. A good way to conceptualise this is thinking of the array passed to load() as middleware. On each of the Post instances, the comments property will be ran, and the resulting comments added to an array.

## Seeding and factories

Seeding the DB is the same as other frameworks. What is handy though is that Laravel comes with the ability to make seeders out of the box. We can run a command (make:seeder) via the CLI to create this. It will then end up in the database/seeders directory.

### Factories

Factories are the best way to create new records for the respective model. Once they are created, they take a list of fields and values as their definition. Laravel uses Faker out of the box, so no need to add in.

```php
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

```

There are a variety of methods that return data in faker. Look at the docs for more info.

When using a factory, use the arg for the number of returned results. It is also possible to pass factories as values to the definition inside other factories. When doing this, you don't need to call the create method.

```php
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'posts' => Post::factory(5),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

```