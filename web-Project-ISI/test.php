<?php 
    require_once 'includes/dbh.inc.php';
    echo"hi";
    $query = 'DELETE from product';
    $results = mysqli_query($conn, $query) or die('Query error: ' . mysqli_error());
    
?>
