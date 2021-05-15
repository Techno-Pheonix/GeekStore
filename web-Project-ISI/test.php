<?php 
    require_once 'includes/dbh.inc.php';
    echo"hi";
    $sql = "SELECT * from sales;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    print_r($row);
?>
