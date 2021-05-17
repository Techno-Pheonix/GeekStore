<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../includes/header.php'; ?>
    <link rel="stylesheet" href="style.css">

    <title>Contact us</title>
</head>

<body>
    <?php require_once '../includes/navbar.php'; ?>

    <div class="title text-center mt-4">
    <h1>Contact Us</h1>
    </div>
    <div class="container contact-form form">
            <form  action="send.php" method="post">
                <div class="shy text-center mb-4">
                <h3 class="t1">Don't be shy, Drop Us a Message</h3>
                </div>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name *" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Your Email *" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *"  />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="msg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">

                        <button name="submit" type="submit" class="btn btn-primary btn-block mt-4">Send message</button>
                        </div>
            </form>
</div>
<button id="a" type="button" class="btn btn-primary" style="background-color:transparent;border-color:transparent;box-shadow: 10px 10px 10px rgba(0, 0, 0, 0);" data-toggle="modal" data-target="#exampleModalLong">
</button>
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle">Message state :</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
                            $mtotal="";
                            if (isset($_GET["error"])){
                                if ($_GET["error"] == "empty"){
                                    $mtotal = "There are empty fields !";
                                }

                                else if ($_GET["error"] == "none"){
                                    $mtotal = "Message sent successfully !";
                                }
                            }
                            echo($mtotal);      
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

<div class="map container">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25558.103660615325!2d10.168802239550777!3d36.800233399999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd346c1ae482a9%3A0x78827fe9ed6046cc!2sHorloge%20De%20L&#39;avenue%20Habib%20Bourguiba!5e0!3m2!1sfr!2stn!4v1621264256633!5m2!1sfr!2stn" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

<?php require_once '../includes/footer.php'; ?>
</body>
<script src="../admin/assets/js/theme.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
</html>