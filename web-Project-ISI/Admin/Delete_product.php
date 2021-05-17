<?php
 session_start();
 require_once "includes/functions.inc.php";
 include "includes/dbh.inc.php";
 $m = $_GET['id'];
 $sql = "UPDATE product set quantity = -1 where id_p = '$m'";
 $query = mysqli_query($conn,$sql);
 $arg = "location:Products.php";
 header($arg);
 exit();