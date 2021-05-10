<?php
 session_start();
 require_once "includes/functions.inc.php";
 include "includes/dbh.inc.php";
 if(isset($_POST['user']))
 {
    $fname=$_POST['first_name'];
    $lname=$_POST['last_name'];
    $password=$_POST['password'];
    $select= "SELECT * from user where id_user =".$_SESSION['user_id'];
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id_user'];
    if (emptyInputUpdate($fname, $lname, $password)==true) {
        header("location:profile.php?error=emptyinput");
        exit();
    }
    if($res === $_SESSION['user_id'])
    {
       $hash = password_hash($password, PASSWORD_DEFAULT);
       $update = "UPDATE user set first_name='$fname', last_name='$lname', password='$hash' where id_user=".$_SESSION['user_id'];
       $sql2=mysqli_query($conn,$update);
       if($sql2)
       { 
           /*Successful*/
           header('location:profile.php?res=success');
           exit();
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:profile.php?res=failure');
           exit();
       }
    }
 }
 if(isset($_POST['contact']))
 {
    $email=$_POST['email'];
    $adress=$_POST['address'];
    $phone=$_POST['phone'];
    $select= "SELECT * from user where id_user =".$_SESSION['user_id'];
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res= $row['id_user'];
    if (emptyInputUpdate($email, $adress, $phone)==true) {
        header("location:profile.php?error=emptyinput");
        exit();
    }
    if($res === $_SESSION['user_id'])
    {
       $update = "UPDATE user set email='$email', adress='$adress', phone='$phone' where id_user=".$_SESSION['user_id'];
       $sql2=mysqli_query($conn,$update);
       if($sql2)
       { 
           /*Successful*/
           header('location:profile.php?res=success');
           exit();
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:profile.php?res=failure');
           exit();
       }
    }
 }

?>