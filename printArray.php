<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $students = [
        [
            'name' => 'a',
            'email' => 'a@gmail.com'
        ],
        [
            'name' => 'b',
            'email' => 'b@gmail.com'
        ],
        [
            'name' => 'c',
            'email' => 'c@gmail.com'
        ],
        [
            'name' => 'd',
            'email' => 'd@gmail.com'
        ],
        [
            'name' => 'e',
            'email' => 'e@gmail.com'
        ],
        [
            'name' => 'f',
            'email' => 'f@gmail.com'
        ],
        [
            'name' => 'g',
            'email' => 'g@gmail.com'
        ]
    ];
    // $students = [];
    echo '<pre>';
    print_r($students);
    echo '<pre>';
    ?>
    <table border="1">
        <thead>
            <th>Name</th>
            <th>Email</th>
        </thead>

        <tbody>
            <?php
            if (!empty($students)) {
                foreach ($students as $student) { ?>
                    <tr>
                        <td><?php echo $student['name'] ?></td>
                        <td><?php echo $student['email'] ?></td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="2">No Record Found</td>
                </tr>
            <?php

            }
            ?>

        </tbody>

    </table>



    <?php
    foreach ($students as $student) {
        echo $student['email'] . '<br>';
    }
    ?>

    <?php
    //check variable is array or not

    $a = [1, 2, 8, 7];
    $b = [];
    var_dump(is_array($a));

    //check variable is empty or not

    var_dump(empty($b));


    //check value is in the array or not(this not work in multidimensional array)

    $c = [
        'name' => 'mk',
        'number' => '123'
    ];
    var_dump(in_array(8, $a));
    if (in_array('mk', $c)) {
        echo 'yes mk is in the array';
    } else {
        echo 'no mk is not in the array';
    }

    // for make a new array from multidimensional array based on key name
    // method name: array_column

    $newStudents = array_column($students, 'name');
    echo '<pre>';
    print_r($newStudents);
    echo '</pre>';

    // sort methods in array (it changes original array)

    //value based sort method

    //1.ascending order
    asort($a);         //(change in original array)
    echo '<pre>';
    print_r($a);
    echo '</pre>';
    var_dump($a);

    //2.descending order
    arsort($a);        //(change in original array)
    echo '<pre>';
    print_r($a);
    echo '</pre>';
    var_dump($a);

    //key based sort method
    $d = ['a' => 'hello', 'value' => 'okay', 'email' => 'sales', 'b' => 'world'];

    //1.ascending order
    ksort($d);  //(change in original array)
    echo '<pre>';
    print_r($d);
    echo '</pre>';
    var_dump($d);

    //2.descending order
    krsort($d);  //(change in original array)
    echo '<pre>';
    print_r($d);
    echo '</pre>';
    var_dump($d);



    //find value in array

    //method name array_search
    //return index value if value match else return false

    var_dump(array_search(2, $a));
    var_dump(array_search(12, $a));
    var_dump(array_search('a', $d));
    var_dump(array_search('okay', $d));



    //filter method in array  (return new array)
    //array_filter(array name, callback function)
    $info = [
        [
            'name' => 'mk',
            'city' => 'bodeli',
            'number' => '123'
        ],
        [
            'name' => 'ak',
            'city' => 'bhargain',
            'number' => '456'
        ],
        [
            'name' => 'darsh',
            'city' => 'baroda',
            'number' => '789'
        ],
        [
            'name' => 'gaurav',
            'city' => 'baroda',
            'number' => '874'
        ]
    ];

    //using only value
    $filteredArray = array_filter($info, function ($value) {
        return $value['city'] == 'baroda';
    });
    echo '<pre>';
    print_r($filteredArray);
    echo '</pre>';

    //using both key and value

    $filteredArray = array_filter($info, function ($value, $key) {
        return $value['city'] == 'baroda' && $key > 2;
    }, ARRAY_FILTER_USE_BOTH);
    echo '<pre>';
    print_r($filteredArray);
    echo '</pre>';




    //original array
    echo '<pre>';
    print_r($info);
    echo '</pre>';



    ?>


</body>

</html>