<?php 

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


function existmail($conn, $email){
    $result;

    $sql = "SELECT * FROM user where email='$email'";
    $result_db = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result_db);

    if ($resultcheck>0){
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;

}

function loginuser($conn, $email, $password){
   /* if (existmail($conn, $email)==false){
        header("location:index.php?error=dontexist");
        exit();
    }*/
    $sql = "SElECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result=mysqli_query($conn, $sql)){
        $rowcount = mysqli_num_rows($result);
    }

    if ($rowcount==0){
        die("email doesnt exists !");
        exit();
    }
    
    else if ($rowcount!=0){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $row = mysqli_fetch_array($result);
        if ($row['password']==password_verify($password, $hash)){
            session_start();
            $_SESSION['user'] = $row['first_name'];
            $_SESSION['user_id'] = $row['id_user'];
            $_SESSION['loggedin'] = true;
            die("You are connected !");
        }
        else {
            die("Incorrect Password");
        }
    }
    
    }

?>