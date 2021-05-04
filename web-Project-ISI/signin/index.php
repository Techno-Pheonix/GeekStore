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
    <div class="d-flex justify-content-center mt-4">
                    <?php
                    if (isset($_GET["error"])){
                                if ($_GET["error"] == "emptyinput"){
                                    echo '
                                    <div class="alert alert-danger" role="alert">There are empty Fields !</div>
                                    ';
                                }

                                if ($_GET["error"] == "incorrectpwd"){
                                    echo '
                                    <div class="alert alert-danger" role="alert">Incorrect Password !</div>
                                    ';
                                }
                            }

                            ?>
                            </div>
    </section>
</body>
</html>

