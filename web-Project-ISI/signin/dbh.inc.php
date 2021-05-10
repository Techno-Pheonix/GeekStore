<?php 

$serverName= "localhost";
$dbUsername= "user14210_haffa";
$dbPassword= "6O3j6F0p";
$dbName= "user14210_project";

$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);
if (!$conn){
die("Connection failed : ".mysqli_connect_error());
}

?>