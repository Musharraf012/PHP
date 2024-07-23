<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    //1st question
    function checkArray ($g){
        return var_dump(is_array($g));

    };
    $a = [1, 5, 8];
    checkArray($a);


    //2nd question
    $myColor = ['red', 'green', 'blue', 'yellow'];
    print_r(implode('+', $myColor));  //(used as a join function)

    //3rd question
    $arr = ['NAN', 0, 15, false, -22, "", 47, NULL];
    $filteredArray = array_filter($arr, function ($value) {
        return $value !== 'NAN' && $value != 0 && $value != false && $value != '' && $value != NULL;
    });
    $filteredArray = array_values($filteredArray); //(for reset Index)
    echo '<pre>';
    print_r($filteredArray);
    echo '</pre>';

    //4th question

    $newArray = [1, 5, 7, 9];
    $h = ['', 3];
    $j = [[1, 2, 8, 9], 1];
    $q = [[1, 2, 8, 9], 1];
    array_slice($j[0], 0, 2);
    function sliceArray($array, $end = null)
    {
        return array_slice($array, 0, $end);
    };
    echo '<pre>';
    print_r(sliceArray($j, 1));
    print_r(sliceArray($j));
    echo '</pre>';

    //5th question


    //6th question
    $array1 = [1, 2, 3];
    $array2 = [2, 30, 1];
    $array3 = array_merge($array1, $array2);
    $uniqueArray = array_unique($array3);
    echo '<pre>';
    print_r($uniqueArray);
    echo '</pre>';
    ?>
    <script>
        let myColour = ['red', 'green', 'blue'];

        console.log(myColour.join('+'));;
    </script>
</body>

</html>