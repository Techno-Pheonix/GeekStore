<?php

header('Content-Type: application/json');

$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str);

session_start();
unset($_SESSION["shopping_cart"][$json_obj->id]);

$output = [
    'status' => "yay",
];

  echo json_encode($output);

?>