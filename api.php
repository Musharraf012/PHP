<?php

$data = [
    [
        'id' => 1,
        'name' => "John",
        'age' => 25
    ],
    [
        'id' => 2,
        'name' => "peter",
        'age' => 25
    ],
    [
        'id' => 3,
        'name' => "ned",
        'age' => 49
    ],
    [
        'id' => 4,
        'name' => "arya",
        'age' => 18
    ],
    [
        'id' => 5,
        'name' => "sansa",
        'age' => 20
    ]
];
 echo json_encode($data);
header('Content-Type: application/json');
header("Access-Control-Allow-Origin:*")

?>