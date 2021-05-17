<?php
 session_start();
 require_once "includes/functions.inc.php";
 include "includes/dbh.inc.php";
 $m = $_GET['id'];
 $sql = "UPDATE user set email= null, password = null, admin =-1 where id_user = '$m'";
 $query = mysqli_query($conn,$sql);
 $arg = "location:Users.php";
 header($arg);
 exit();