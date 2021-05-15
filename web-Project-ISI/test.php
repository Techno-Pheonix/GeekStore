<?php 
    require_once 'includes/dbh.inc.php';
    echo"hi";
    $query = 'DESC sales;';
    $results = mysqli_query($conn, $query) or die('Query error: ' . mysqli_error());
    $row = mysqli_fetch_assoc($results);
    print_r($row);
?>
