<?php
echo $json = file_get_contents('php://input');
$data = json_decode($json, true);

print_r($data);

//  insert into contact  ('name','email') values($data['']);

header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: *");
