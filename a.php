<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $a = 4;
    $b = 10;
    $c = ($b - 5) * $a; //c=20

    echo "Result 1 = ".$c."<br>";
    echo 'Result 2 = '.$c.'<br>';
    echo "Result 3 = $c <BR>";
    echo 'Result 4 = $c <BR>';
    echo "Result 5 = ".($c + $b)."<BR>";
    
    ?>
</body>
</html>