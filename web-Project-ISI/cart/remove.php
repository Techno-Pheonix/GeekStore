<?php
header('Content-Type: application/json');

$json_str = file_get_contents('php://input');
$json_obj = json_decode($json_str);
session_start();

$count = count($_SESSION["shopping_cart"]);

for ($i = 0 ;$i<$count;$i++){
    if ($_SESSION["shopping_cart"][$i]["item_id"] == strval($json_obj->id)){
        unset($_SESSION["shopping_cart"][$i]);
    }
}

$output = [
    'status' => "yay",
];

echo json_encode($output);
?>