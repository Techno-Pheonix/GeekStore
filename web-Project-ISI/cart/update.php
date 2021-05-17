<?php

header('Content-Type: application/json');

$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str);
session_start();

$_SESSION["shopping_cart"][$json_obj->id]["item_quantity"] =$json_obj->quantity;

$output = [
    'status' => "yay",
];

echo json_encode($output);

?>