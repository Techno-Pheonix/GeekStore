<?php 
session_start();
require_once "../admin/includes/functions.inc.php";
include "../admin/includes/dbh.inc.php";
$m = $_GET['id'];
$sql = "UPDATE user set email= null, password = null, admin =-1 where id_user = '$m'";
$query = mysqli_query($conn,$sql);
session_unset();
session_destroy();
$arg = "location:../";
header($arg);
exit();
?>
