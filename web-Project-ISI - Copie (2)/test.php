<?php 
    require_once 'includes/dbh.inc.php';
    echo date("Y-m");
    $sql = "SELECT count(*) as nb,datetime from sales as s where DATE_FORMAT(datetime, \"%Y-%m\") <= \"".date("Y-m")."\" GROUP BY MONTH(datetime) DESC;" ;
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        print_r($row);
    };
?>
