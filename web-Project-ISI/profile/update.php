<?php
 session_start();
 require_once "../admin/includes/functions.inc.php";
 include "../admin/includes/dbh.inc.php";
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
        header("location:index.php?error=emptyinput");
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
           header('location:index.php?res=success');
           exit();
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:index.php?res=failure');
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
    $res = $row['id_user'];
    if (emptyInputUpdate($email, $adress, $phone)==true) {
        header("location:index.php?error=emptyinput");
        exit();
    }
    if($res === $_SESSION['user_id'])
    {
       $update = "UPDATE user set email='$email', adress='$adress', phone='$phone' where id_user=".$_SESSION['user_id'];
       $sql2=mysqli_query($conn,$update);
       if($sql2)
       { 
           /*Successful*/
           header('location:index.php?res=success');
           exit();
       }
       else
       {
           /*sorry your profile is not update*/
           header('location:index.php?res=failure');
           exit();
       }
    }
 }
 if(isset($_POST['picInfo']))
 {
    $current = date("Y-m-d h:i:sa");
    $select= "SELECT * from user where id_user =".$_SESSION['user_id'];
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);
    $res = $row['user_id'];
    $target_dir = "../avatars/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $_SESSION['file'] = $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
        $update = "UPDATE user set avatar='$target_file' where id_user=".$_SESSION['user_id'].";";
        $_SESSION['avatar'] = $target_file;
        $sql2=mysqli_query($conn,$update);
        if(!$sql2)
        {
            /*sorry your profile was not updated*/
            $_SESSION['upload'] = "Image path failed to update";
            $arg = "location:index.php?res=failure3";
            header($arg);
            exit();
        }
        else{
            $arg = "location:index.php?res=success2";
            header($arg);
            exit();
        }
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    header("location:index.php?error=format");
    exit();
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $arg = "location:index.php?res=failure";
        header($arg);
        exit();
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $_SESSION['upload'] = "The image ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
    } 
    else {
        $arg = "location:index.php?res=failure2";
           header($arg);
           exit();
    }
    $update = "UPDATE user set avatar='$target_file' where id_user=".$_SESSION['user_id'].";";
    $sql2=mysqli_query($conn,$update);
    if(!$sql2)
    {
        /*sorry your profile was not updated*/
        $_SESSION['upload'] = "File path failed to update";
        $arg = "location:index.php?res=failure3";
        header($arg);
        exit();
    }
    else{
        $arg = "location:index.php?res=success";
        header($arg);
        exit();
    }
    }
}
?>