<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="../admin/assets/css/styles.css">
    <link rel="stylesheet" href="../admin/assets/bootstrap/css/bootstrap2.min.css">
    <link rel="stylesheet" href="../admin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <link rel="icon" href="pictures/fav.ico" />
    <title>Profile</title>
</head>

<body>

<?php require_once '../includes/navbar.php'; ?>

<div class="container">

<div class="container-fluid">
                    <div class="title">
                    <h3 class="text-dark mb-4 text-center mt-4">Profile</h3>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                        <form action="Update_profile.php" method="post" enctype="multipart/form-data">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                        src="../avatars/<?php echo($row['avatar']);?>" width="160" height="160">
                                        <div class="mb-3">
                                            <label style="cursor: pointer;" for="file"
                                                class="btn btn-primary bg-gradient-deepbluesky bg-gradient-deepbluesky btn-sm">Change
                                                Photo</label>
                                            <input type="file" accept=".jpg,.jpeg,.png,.gif" id="file" name="file"
                                                hidden><br>
                                            <button
                                                class="btn btn-primary bg-gradient-deepbluesky bg-gradient-deepbluesky btn-sm"
                                                type="submit" value="Upload Photo" name="picInfo">Save</button>
                                        </div>
                                </div>
                            </div>
                        </form>
                        
                        <div class="delete mt-4 d-flex justify-content-center">
                        <a  href="<?php echo($_SESSION['url']); ?>&confirm=true">
                        <button
                        class="btn btn-primary bg-gradient-deepbluesky bg-gradient-deepbluesky" type="button"
                        style="margin-bottom: 15px;">Delete User</button></a>
                        </div>

                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5%
                                                since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5%
                                                since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="Update_profile.php" method="post">
                                                <div class="form-row">
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"first_name\"><strong>First
                                                                    Name</strong></label><input class=\"form-control\"
                                                                type=\"text\" placeholder=\"".$row['first_name']."\" name=\"first_name\"".$_SESSION['perm']."></div>
                                                    </div>";
                                                    ?>
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"last_name\"><strong>Last
                                                                    Name</strong></label><input class=\"form-control\"
                                                                type=\"text\" placeholder=\"".$row['last_name']."\" name=\"last_name\"".$_SESSION['perm']."></div>
                                                    </div>";
                                                    ?>

                                                </div>
                                                <?php 
                                                echo "<div class=\"form-group\">";
                                                echo "<label
                                                        for=\"email\"><strong>Password</strong></label><input
                                                        class=\"form-control\" type=\"password\"placeholder=\"".$row['password'].
                                                        "\"name=\"password\"".$_SESSION['perm'].">
                                                </div>";
                                                ?>

                                                <div class="form-group"><button
                                                        class="btn btn-primary bg-gradient-deepbluesky btn-sm"
                                                        type="submit" name="user">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Contact Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="Update_profile.php" method="post">
                                                <?php 
                                                echo "<div class=\"form-group\">";
                                                echo "<label
                                                        for=\"email\"><strong>E-mail Address</strong></label><input
                                                        class=\"form-control\" type=\"text\"placeholder=\"".$row['email'].
                                                        "\"name=\"email\"".$_SESSION['perm'].">
                                                </div>";
                                                ?>
                                                <div class="form-row">
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"phone\"><strong>Phone
                                                                    Number</strong></label><input class=\"form-control\"
                                                                type=\"text\" placeholder=\"".$row['phone']."\" name=\"phone\"".$_SESSION['perm']."></div>
                                                    </div>";
                                                    ?>
                                                    <?php 
                                                    echo "<div class=\"col-8\">";
                                                    echo "<label
                                                        for=\"address\"><strong>Address</strong></label><input
                                                        class=\"form-control\" type=\"text\"placeholder=\"".$row['adress'].
                                                        "\"name=\"address\"".$_SESSION['perm'].">
                                                    </div>";
                                                    ?>
                                                </div>
                                                <div class="form-group"><button
                                                        class="btn btn-primary bg-gradient-deepbluesky btn-sm"
                                                        type="submit" name="contact">Save&nbsp;Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</div>

<?php require_once '../includes/footer.php'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="../admin/assets/js/theme.js"></script>
</html>