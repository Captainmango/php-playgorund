<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Playground</title>
</head>
<body>
    <?php 

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

    ?>
</body>
</html>