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
                                        <option class="hidden"  selected disabled>Please select your Security Question</option>
                                        <option>What is your Birthdate?</option>
                                        <option>What is Your old Phone Number</option>
                                        <option>What is your Pet Name?</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="answer" class="form-control" placeholder="Enter Your Answer *" value="" />
                                </div>
                                <button type="submit" class="btnRegister" name=submit>Register</button>
                            </div>
                            <?php
                            if (isset($_GET["error"])){
                                if ($_GET["error"] == "emptyinput"){
                                    echo '
                                    <div class="alert alert-danger" role="alert">There is empty Fields !</div>
                                    ';
                                }

                                else if ($_GET["error"] == "invalidfn"){
                                    '
                                    <div class="alert alert-danger" role="alert">Invalid first name !</div>
                                    ';
                                }

                            }
                        ?>
                        </form>

                    </div>
                    
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>