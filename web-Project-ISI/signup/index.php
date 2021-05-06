<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/bootstrap.js"></script>
    <link rel="icon" href="../pictures/fav.ico" />
    <link rel="stylesheet" href="signup.css">

    <title>Sign up</title>

</head>

<body>

    <div class="register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="..//pictures/logof3.png" alt=""/>
                <h3>Geek's Store</h3>
                <p>From Geeks To Geeks - Dattebayooo !</p>
                <div class="b-signin">
                    <a href="../signin/" class="btn btn-default btn-block">Sign in</a>
                </div>
            </div>
            <div class="col-md-9 register-right">
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Create an account</h3>
                        <form action="signup.inc.php" class="row register-form" method="post">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                          <input type="text" name="firstname" class="form-control" placeholder="First name">
                                        </div>
                                        <div class="col">
                                          <input type="text" name="lastname" class="form-control" placeholder="Last name">
                                        </div>
                                      </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="adress" class="form-control" placeholder="Adress *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirmpassword" class="form-control"  placeholder="Confirm Password *" value="" />
                                </div>
                                <div class="form-group">
                                    <div class="maxl">
                                        <label class="radio inline"> 
                                            <input type="radio" name="gender" value="male" checked>
                                            <span> Male </span> 
                                        </label>
                                        <label class="radio inline"> 
                                            <input type="radio" name="gender" value="female">
                                            <span>Female </span> 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" />
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" minlength="8" maxlength="8" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" value="" />
                                </div>
                                <div class="form-group">
                                    <select name="secquestion" class="form-control">
                                        <option class="hidden" value="0" disabled>Please select your Security Question</option>
                                        <option value = "1" selected>What is your favourite childhood game?</option>
                                        <option value = "2">What is Your old Phone Number</option>
                                        <option value = "3">What is your Pet Name?</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="answer" class="form-control" placeholder="Enter Your Answer *" value="" />
                                </div>
                                <button type="submit" class="btnRegister" name=submit>Register</button>
                            </div>

                            <div class="error-msg mt-4">
                        

                        </div>
                        </form>

                    </div>
                    
                           
                            </div>
                        </div>
                    </div>
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
                                    $mtotal = "There are empty fields";
                                }

                                else if ($_GET["error"] == "invalidemail"){
                                    $mtotal = "invalid email : try foulen@exemple.com";
                                   
                                }
                                
                                else if ($_GET["error"] == "pwdmatch"){
                                    $mtotal = "Password doesn't match !";
                                }

                                else if ($_GET["error"] == "emailtaken"){
                                    $mtotal = "Email is already taken !";
                                }

                                else if ($_GET["error"] == "pwdlen"){
                                    $mtotal = "Password minimum length is 8 characters !";
                                }

                                else if ($_GET["error"] == "invalidquest"){
                                    $mtotal = "Invalid securtiy question !";
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
</body>
</html>