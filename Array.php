<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>

<body>
    <?php
    //three types of array
    // 1.Numeric Array

    $ar = [1, 2, 3, 4];

    echo $ar[0] . '<br/>-----------<br/>';
    // count is use for the length of the array
    for ($i = 0; $i < count($ar); $i++) {
        echo $ar[$i] . '<br/>';
    }
    echo '<br/>-----------<br/>';
    $j = 0;
    while ($j < count($ar)) {
        echo $ar[$j] . '<br/>';
        $j++;
    }
    echo '<br/>-----------<br/>';
    $k = 0;
    do {
        echo $ar[$k] . '<br/>';
        $k++;
    } while ($k < count($ar));




    //2.Associative Array
    echo '<br/>-----------<br/>';
    $ar1 = [
        'name' => 'mk',
        'age' => '25',
        'city' => 'baroda'
    ];

    echo $ar1['name'];
    echo '<br/>-----------<br/>';


    //syntax of foreach(in this syntax $key is optional)

    
    foreach ($ar1 as $key => $value) {
        echo $key . '=>' . $value . '<br/>';
    }

    //3.multidimentional array
    echo '<br/>-----------<br/>';
    $ar3 = [[1, 5], [2, 8], [[5, 6], [8, 9], [[10, 21]]]];
    echo $ar3[2][1][1];
    echo '<br/>-----------<br/>';
    echo $ar3[2][2][0][1];

    ?>
</body>

</html>