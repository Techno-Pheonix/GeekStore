<?php 
    require_once 'includes/dbh.inc.php';
    echo"hi";
    $query = 'DESCRIBE product';
    $results = mysqli_query($conn, $query) or die('Query error: ' . mysqli_error());
    while($row = mysqli_fetch_array($results)) {
	    print_r($row);
	    echo '<br />';
    }
?>
