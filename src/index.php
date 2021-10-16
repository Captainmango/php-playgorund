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

      $varArray = [1,2,3,4];

      for($i = 0; $i < count($varArray); $i++){
        echo $varArray[$i];
      }
    
    ?>
</body>
</html>