<?php 

session_start();
if (isset($_POST["submit"])){

$answer = $_POST["answer"];
$answerf = $_SESSION['answerf'];

if ($answer!=$answerf){
    header("location:password.php?error=dontmatch");
    exit();
}

else if (empty($answer)){
    header("location:password.php?error=empty");
    exit();
}

else {
    header("location:password.php?error=none");
}


}

?>