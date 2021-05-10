<?php 

function email($email){
    $result;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function emptyInputlogin($email, $password) {
    $result;
    if (empty($email) || empty($password)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}


function adminmail($conn, $email, $password){
     $sql = "SElECT * FROM user WHERE email='$email'";
     $result = mysqli_query($conn, $sql);
     if ($result=mysqli_query($conn, $sql)){
         $rowcount = mysqli_num_rows($result);
     }
 
     if ($rowcount==0){
         header("location:../login.php?error=emaildontexist");
         exit();
     }
     
     else if ($rowcount!=0){
         $hash = password_hash($password, PASSWORD_DEFAULT);
         $row = mysqli_fetch_array($result); 

         if ($row['admin']==0){
             header("location:../login.php?error=noaccess");
             exit();
         }

         else if (password_verify($password, $row['password'])){
             session_start();
             $_SESSION['user'] = $row['first_name']." ".$row['last_name'];
             $_SESSION['user_id'] = $row['id_user'];
             $_SESSION['loggedin'] = true;
             $_SESSION['admin'] = true;
             $_SESSION['isadmin'] = true;
             header("location:../");
             exit();
         }
         else {
             header("location:../login.php?error=incorrectpwd");
             exit();
         }
     }
     
     }

?>