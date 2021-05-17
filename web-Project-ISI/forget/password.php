<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../includes/header.php'; ?>
    <link rel="stylesheet" href="style.css">
    <title>Forget Password</title>
</head>


<body class="d-flex flex-column min-vh-100">
    <?php require_once '../includes/navbar.php'; ?>
    <?php 

require_once '../includes/dbh.inc.php';
$x = $_SESSION['mailpass'];
$sql="select * from user where email = '$x'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $answer = $row["sec_answer"];
    $quest = $row["sec_quest"];
    $_SESSION['answerf'] = $answer;
?>
    <div class="title text-center mt-4">
        <h1>Forget Password</h1>
    </div>   

    <div class="container text-center">
        <div class="heading mt-4">
            <h3>Answer your Security Question :</h3>
        </div>  
        <h4 class="mt-4"><?php
        if ($quest==1){
            $msg="What is your favourite childhood game ?";
        }
        else if ($quest==2){
            $msg="What is your old phone number ?";
        }

        else if ($quest==3){
            $msg="What is your pet name ?";
        }
        else {
            $msg="Error : contact us to resolve it";
        }

        echo($msg);
            ?></h4>
    </div>

    <div class="container d-flex justify-content-center mt-4">
        <div class="response ">
        <form action="forget.php" method="post">
  <div class="form-group">
    <input type="text" class="form-control" name="answer">
  </div>
  <div class="but d-flex justify-content-center">
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
  </div>
  
</form>
        </div>
    </div>

    <button id="a" type="button" class="btn btn-primary" style="background-color:transparent;border-color:transparent;box-shadow: 10px 10px 10px rgba(0, 0, 0, 0);" data-toggle="modal" data-target="#exampleModalLong">
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Error</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
                            $mtotal="";
                            $confirm = false;
                            if (isset($_GET["error"])){

                                if ($_GET["error"] == "empty"){
                                    $mtotal = "Empty field !";
                                }

                                else if ($_GET["error"] == "dontmatch"){
                                    $mtotal = "Answer doesn't match !";
                                }

                    

                                else if ($_GET["error"] =="none") {
                                    require_once 'generate.php';
                                    $pass = randomPassword();
                                    $hash = password_hash($pass, PASSWORD_DEFAULT);
                                    $mtotal = "Your New Password is : ".$pass;
                                    $sql1 = "UPDATE user set password = '$hash' where email ='$x'";
                                    $query = mysqli_query($conn,$sql1);
                                    $confirm = true;
                                }

                            }
                            echo('<h4>'.$mtotal.'</h4>');
                            ?>

      </div>
      <div class="modal-footer">
          <?php if ($confirm==true):?>
              <a><button onclick="test()" type="button" class="btn btn-secondary" data-dismiss="modal">Confirm</button></a>
              <?php endif; ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php if (isset($_GET["error"])): ?>
<script>
    window.onload = function(){
    document.getElementById('a').click();
}
</script>
<?php endif ?>
<script>
function test(){
    window.location.href = '../signin/index.php';
}
<?php require_once "../includes/footer.php";?> 

</script>
 
<script src="../admin/assets/js/theme.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>

</body>
</html>

