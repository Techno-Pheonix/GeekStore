<?php 
session_start();
require_once '../admin/includes/dbh.inc.php';
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = "SELECT * from user where id_user = ".$id;
$_SESSION['url'] = "index.php?id=".$id;
}
else
{
$sql = "SELECT * from user where id_user =".$_SESSION['user_id'];
$_SESSION['perm'] = "";
$_SESSION['url'] = "index.php";
}
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
    <link rel="stylesheet" href="../home/style.css">
    <link rel="icon" href="../pictures/fav.ico" />
    <title>Profile</title>
</head>

<body class="d-flex flex-column min-vh-100">

<?php require_once '../includes/navbar.php'; ?>

<?php 
$id = $_SESSION['user_id'];
$sql = "select * from user where id_user = $id";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);

$fname = $row["first_name"];
$lname = $row["last_name"];
$email = $row["email"];
$address = $row["adress"];
$phone = $row["phone"];
$password = $row["password"];

?>

<div class="container">

<div class="container-fluid">
                    <div class="title">
                    <h3 class="text-dark mb-4 text-center mt-4">Profile</h3>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                        <form action="update.php" method="post" enctype="multipart/form-data">
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
                        <a  href="<?php echo($_SESSION['url']); ?>?confirm=true">
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
                                            <form action="update.php" method="post">
                                                <div class="form-row">
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"first_name\"><strong>First
                                                                    Name</strong></label><input class=\"form-control\"
                                                                type=\"text\" value=\"".$row['first_name']. "\" placeholder=\"".$row['first_name']."\" name=\"first_name\"></div>
                                                    </div>";
                                                    ?>
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"last_name\"><strong>Last
                                                                    Name</strong></label><input class=\"form-control\"
                                                                type=\"text\" value=\"".$row['last_name']. "\" placeholder=\"".$row['last_name']."\" name=\"last_name\"></div>
                                                    </div>";
                                                    ?>

                                                </div>
                                                <?php 
                                                echo "<div class=\"form-group\">";
                                                echo "<label
                                                        for=\"email\"><strong>Password</strong></label><input
                                                        class=\"form-control\" type=\"password\" placeholder=\"".$row['password'].
                                                        "\"name=\"password\">
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
                                            <form action="update.php" method="post">
                                                <?php 
                                                echo "<div class=\"form-group\">";
                                                echo "<label
                                                        for=\"email\"><strong>E-mail Address</strong></label><input
                                                        class=\"form-control\" type=\"text\" value=\"".$row['email']. "\" placeholder=\"".$row['email'].
                                                        "\"name=\"email\">
                                                </div>";
                                                ?>
                                                <div class="form-row">
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"phone\"><strong>Phone
                                                                    Number</strong></label><input class=\"form-control\"
                                                                type=\"text\" value=\"".$row['phone']. "\" placeholder=\"".$row['phone']."\" name=\"phone\"></div>
                                                    </div>";
                                                    ?>
                                                    <?php 
                                                    echo "<div class=\"col-8\">";
                                                    echo "<label
                                                        for=\"address\"><strong>Address</strong></label><input
                                                        class=\"form-control\" type=\"text\" value=\"".$row['adress']. "\" placeholder=\"".$row['adress'].
                                                        "\"name=\"address\">
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

                                else if ($_GET["error"] == "invalidemail"){
                                    $mtotal = "invalid email : try foulen@exemple.com";
                                }
                                if ($_GET["error"] == "format"){
                                    $mtotal = "Only JPG, JPEG, PNG & GIF files are allowed !";
                                }
                                if ($_GET["error"] == "file"){
                                    $mtotal = "Image already exists !";
                                }
                                
                            }
                            if (isset($_GET["res"])){
                                if ($_GET["res"] == "success"){
                                    $mtotal = "Profile updated successfully !";
                                }
                                else if ($_GET["res"] == "failure"){
                                    $mtotal = "Profile failed to update !";
                                }
                                if ($_GET["res"] == "success2"){
                                    $mtotal = "Image already exists, path changed successfully!";
                                }
                                if ($_GET["res"] == "failure2"){
                                    $mtotal = "Image failed to upload !";
                                }
                                if ($_GET["res"] == "failure3"){
                                    $mtotal = $_SESSION['upload'];
                                }
                                
                            }
                            if (isset($_GET["confirm"])){
                                if ($_GET["confirm"] == "true"){
                                    $mtotal = "Profile about to be deleted, are you sure ?";
                                }                            
                            } 
                            
                            echo('<h4>'.$mtotal.'</h4>');
                            ?>


      </div>
      <div class="modal-footer">
                        <a class="btn btn-secondary"  <?php if(!($_GET['confirm'] == true)) echo('data-dismiss="modal"'); ?> href="<?php if($_GET['confirm'] == true) echo "delete.php?id=".$id;
                                            else echo('#');?>"><?php
                            if($_GET['confirm'] == true) echo "Confirm";
                            else echo('Close');
                             ?>
                             </a>
                             <?php if($_GET['confirm'] == true){
                                 echo "<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>";
                             } ?>                        </div>
    </div>
  </div>
</div>
<?php if (isset($_GET["error"])): ?>
    <script>
        window.onload = function () {
            document.getElementById('a').click();
        }
    </script>
    <?php endif ?>
    <?php if (isset($_GET["res"])): ?>
    <script>
        window.onload = function () {
            document.getElementById('a').click();
        }
    </script>
    <?php endif ?>
    <?php if (isset($_GET["confirm"])): ?>
    <script>
        window.onload = function () {
            document.getElementById('a').click();
        }
    </script>
    <?php endif ?>
    <button id="a" type="button" class="btn btn-primary"
                style="background-color:transparent;border-color:transparent;box-shadow: 10px 10px 10px rgba(0, 0, 0, 0);"
                data-toggle="modal" data-target="#exampleModalLong">
            </button>

<?php require_once '../includes/footer.php'; ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="../admin/assets/js/theme.js"></script>
</html>