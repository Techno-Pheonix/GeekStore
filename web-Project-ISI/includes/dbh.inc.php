<?php 
$serverName= "197.12.0.100";
$dbUsername= "user14210_adminf";
$dbPassword= "fK7pO2qF4gdV1o";
$dbName= "user14210_project";

$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);
if (!$conn){
die("Connection failed : ".mysqli_connect_error());
}
?>