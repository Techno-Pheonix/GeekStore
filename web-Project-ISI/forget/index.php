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


<body>
    <?php require_once '../includes/navbar.php'; ?>
    <?php 

?>
    <div class="title text-center mt-4">
        <h1>Forget Password</h1>
    </div>   

    <div class="container text-center">
        <div class="heading mt-4">
            <h3>Your email please ? </h3>
        </div>  
    </div>

    <div class="container d-flex justify-content-center mt-4">
        <div class="response">
        <form action="fmail.php" method="post">
  <div class="form-group">
    <input type="email" class="form-control" name="email">
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
                            if (isset($_GET["error"])){
                                if ($_GET["error"] == "dontexist"){
                                    $mtotal = "Email doesn't exist !";
                                }

                                else if ($_GET["error"] == "empty"){
                                    $mtotal = "Empty field !";
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
 
<script src="../admin/assets/js/theme.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>

</body>
</html>