<?php 
    require_once "../../includes/dbh.inc.php";
    $sql = "DELETE from category";
    $result = mysqli_query($conn, $sql);

?>