<?php 

$serverName= "197.12.0.100";
$dbUsername= "user14210_admin";
$dbPassword= "rN8kC2oW4qxX3y";
$dbName= "dbweb";

$conn = mysqli_connect($serverName,$dbName,$dbPassword,$dbName);

if (!$conn){
die("Connection failed : ".mysqli_connect_error());
}

?>