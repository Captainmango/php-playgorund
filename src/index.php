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

    $var1 = 345;
    $var2 = (string)$var1;
    


    function getNumberOfDigitsInNumber(int $number): int {
      return $number !== 0 ? floor(log10(abs($number))) + 1 : 1;
    }

    echo $var2[2];
    
    ?>
</body>
</html>