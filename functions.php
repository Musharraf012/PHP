<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    //function syntax

    //function declaration
    //function  function name(){}
    //function call
    //function name();

    function myFunction()
    {
        echo "hello world" . '<br>';
    }
    myFunction();

    function sum($a, $b)
    {
        return $a + $b;
    }
    echo sum(10, 20);

    ?>

</body>

</html>