<?php 
    require_once 'includes/dbh.inc.php';
    $sql = "DELETE FROM product";
    $result = mysqli_query($conn, $sql);
?>
