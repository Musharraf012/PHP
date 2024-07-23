<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        <input type="number" name="number1"><br>
        <input type="number" name="number2"><br>
        <button name="form1" value="add">Submit</button>
    </form>


    <!-- for print form data  -->
    <?php

    echo "<pre>";
    print_r($_REQUEST);

    echo "</pre>"
    ?>

    <!-- print using condition -->
    <?php


    if (isset($_REQUEST['form1'])) {
        $sum = 0;
        var_dump(isset($_REQUEST['number1']));
        $number1 = (!empty($_REQUEST['number1'])) ?  $_REQUEST['number1'] : 0;
        $number2 = (!empty($_REQUEST['number2'])) ?  $_REQUEST['number2'] : 0;

        $sum = $number1 + $number2;
    }

    ?>
    <h2>
        <?php
        echo $sum
        ?>
    </h2>


</body>

</html>