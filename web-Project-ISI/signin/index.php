<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="signin.css">
    <script src="../js/bootstrap.js"></script>
    <link rel="icon" href="../pictures/fav.ico" />
    <title>Sign in</title>

</head>

<body>
    <div class="text-center mb-3">
        <img id="img1" class="pic" src="../pictures/logof.png" alt="Geeks Store Logo">   
    </div>

    <div class="text-center mb-5">
        <h3 class="h2"><strong>Sign in</strong></h3>
    </div>
    <div class="center">

    <section class="form" class="Form my-4 mx-5">
        
        <div class="">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="../pictures/undraw_authentication_fsn5.svg" id="img2" class="img-fluid img-thumbnail" 
                    alt="Sign in picture">
                </div>

                <div class="col-lg-7 align-self-center">
                    <form class="container-fluid" action="login.inc.php" method ="post">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="email" name="email" placeholder="Email Adress" class="form-control form-control-lg mt-3 bm-5">
                            
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" name="password" placeholder="Password" class="form-control form-control-lg mt-3 bm-5">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btn1 mt-3 bm-5" name="submit">Sign in</button>
                            </div>
                        </div>
                        <div class="col-lg-7 d-flex justify-content-center">
                        <a href="#">Forget password ?</a>
                        </div>
                        <div class="col-lg-7 d-flex justify-content-center">
                        <p>Don't have an account? <a href="../signup">Register</a></p>
                        </div>
                    </div>
                    </form>
                    
                </div>
            </div>

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
                            if (isset($_GET["error"])){
                                if ($_GET["error"] == "emptyinput"){
                                    $mtotal = "There are empty fields !";
                                }

                                else if ($_GET["error"] == "incorrectpwd"){
                                    $mtotal = "Incorrect password !";
                                   
                                }
                            }
                            echo('<h4>'.$mtotal.'</h4>');
                            ?>

      </div>
      <div class="modal-footer">
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

                
    </section>
</body>
</html>

