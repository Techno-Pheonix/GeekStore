<!DOCTYPE html>
<html>
<?php 
session_start();
if ($_SESSION["isadmin"]!=true){
    header("location:../");
}
if(isset($_GET['slug'])){
    $_SESSION['slug'] = $_GET['slug'];
}
else {
    header("location:Products.php");
    exit();
};
require_once 'includes/dbh.inc.php';
$m = $_GET['slug'];
$_SESSION['url'] = "Product.php?slug=".$m;
$sql = "SELECT * from product where slug = '$m'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
if($row['quantity']==-1){
     $deleted="(Deleted)";
    $_SESSION['deleted']="deleted";}
else $deleted="";
$_SESSION['id_p'] = $row['id_p'];
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Product - Geek Store</title>
    <link rel="icon" href="../pictures/fav.ico" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap2.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-deepbluesky p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="../index.php">
                    <div class="sidebar-brand-icon rotate-n-15"><img src="../pictures/logof2.png" width="50px"
                            class="pulse animated infinite"></div>
                    <div class="sidebar-brand-text mx-3"><span>Geek Store</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i
                                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profile.php"><i
                                class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Users.php"><i
                                class="fas fa-users"></i><span>Users</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="Products.php"><i
                                class="fas fa-table"></i><span>Products</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="purchases.php"><i
                                class="fas fa-cash-register"></i><span>Sales</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3"
                            id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form
                            class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="text"
                                    placeholder="Search for ...">
                                <div class="input-group-append"><button
                                        class="btn btn-primary bg-gradient-deepbluesky bg-gradient-deepbluesky py-0"
                                        type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                        </form>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                    data-toggle="dropdown" aria-expanded="false" href="#"><i
                                        class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
                                    aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small"
                                                type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button
                                                    class="btn btn-primary bg-gradient-deepbluesky bg-gradient-deepbluesky py-0"
                                                    type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><button
                                        class="btn btn-primary bg-gradient-deepbluesky dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false" type="button"><span
                                            class="d-none d-lg-inline mr-2 text-white-600 small"><?php echo($_SESSION['user']); ?></span><img
                                            class="border rounded-circle img-profile"  width="60px" height="60px"
                                            src="../avatars/<?php echo $_SESSION['avatar']; ?>"></button>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <a class="dropdown-item" role="presentation" href="#"><i
                                                class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a
                                            class="dropdown-item" role="presentation" href="#"><i
                                                class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a class="dropdown-item" role="presentation" href="#"><i
                                                class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity
                                            log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation"
                                            href="includes/logout.php"><i
                                            class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"onclick="logoutred()"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4" style="margin-bottom: 10px;">Product<?php echo($deleted);?></h3>
                        <a href="AddProduct/index.php">
                        <button
                        class="btn btn-primary bg-gradient-deepbluesky bg-gradient-deepbluesky" type="button"
                        style="margin-bottom: 15px;">Create New</button></a>
                        <a  href="<?php echo($_SESSION['url']); ?>&confirm=true" <?php if($_SESSION['deleted']=="deleted") echo('hidden');  ?>>
                        <button
                        class="btn btn-primary bg-gradient-deepbluesky bg-gradient-deepbluesky" type="button"
                        style="margin-bottom: 15px;">Delete Product</button></a>
                    <div class="row mb-3">
                        <div class="col-lg-4">

                            <form action="Update_product.php" method="post" enctype="multipart/form-data">
                                <div class="card mb-3">
                                    <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4"
                                            src="../pictures/<?php echo($row['picture']);?>" width="160" height="160">
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
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Past Purchases</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Admin<span
                                            class="float-right">40%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-danger" aria-valuenow="20" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 20%;"><span class="sr-only">20%</span>
                                        </div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales tracking<span
                                            class="float-right">40%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-warning" aria-valuenow="40" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 40%;"><span class="sr-only">40%</span>
                                        </div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database<span
                                            class="float-right">60%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-primary" aria-valuenow="60" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 60%;"><span class="sr-only">60%</span>
                                        </div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details<span
                                            class="float-right">80%</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-info" aria-valuenow="80" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 80%;"><span class="sr-only">80%</span>
                                        </div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account setup<span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-success" aria-valuenow="100" aria-valuemin="0"
                                            aria-valuemax="100" style="width: 100%;"><span class="sr-only">100%</span>
                                        </div>
                                    </div>
                                </div>
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
                                            <p class="text-primary m-0 font-weight-bold">Product Info</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="Update_product.php" method="post">
                                                <div class="form-row">
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"product_id\"><strong>Product ID
                                                                    </strong></label><input class=\"form-control\"
                                                                type=\"text\" placeholder=\"".$row['id_p']."\" name=\"product_id\" readonly=\"readonly\"></div>
                                                    </div>";
                                                    ?>
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"price\"><strong>Price
                                                                    </strong></label><input class=\"form-control\"
                                                                type=\"number\" placeholder=\"".$row['price']."\" name=\"price\"></div>
                                                    </div>";
                                                    ?>
                                                </div>
                                                <div class="form-row">
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"product_name\"><strong>Product Name
                                                                    </strong></label><input class=\"form-control\"
                                                                type=\"text\" placeholder=\"".$row['title']."\" name=\"product_name\"></div>
                                                    </div>";
                                                    ?>
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"summary\"><strong>Summary
                                                                    </strong></label><input class=\"form-control\"
                                                                type=\"text\" placeholder=\"".$row['summary']."\" name=\"summary\"></div>
                                                    </div>";
                                                    ?>
                                                </div>
                                                <?php 
                                            echo "<div class=\"form-group\">";
                                                echo "<label
                                                        for=\"slug\"><strong>Slug</strong></label><input
                                                        class=\"form-control\" type=\"text\"placeholder=\"".$row['slug'].
                                                        "\"name=\"slug\" readonly=\"readonly\">
                                                </div>";
                                                ?>
                                                <div class="form-group"><button
                                                        class="btn btn-primary bg-gradient-deepbluesky bg-gradient-deepbluesky btn-sm"
                                                        type="submit" name="pInfo">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Shop Information</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="Update_product.php" method="post">
                                                <?php 
                                                $sql2 = "SELECT title from sub_category where id_sub = ".$row["id_cat"];
                                                $query2 = mysqli_query($conn,$sql2);
                                                $row2 = mysqli_fetch_array($query2);
                                                echo "<div class=\"form-group\">";
                                                echo "<label
                                                        for=\"category\"><strong>Category</strong></label><input
                                                        class=\"form-control\" type=\"text\"placeholder=\"".$row2['title'].
                                                        "\"name=\"category\" readonly=\"readonly\">
                                                </div>";
                                                ?>
                                                <?php
                                            echo "<div class=\"form-group\">";
                                                echo "<label
                                                        for=\"meta_title\"><strong>Meta title</strong></label><input
                                                        class=\"form-control\" type=\"text\"placeholder=\"".$row['meta_title'].
                                                        "\"name=\"meta_title\">
                                                </div>";
                                            ?>
                                                <div class="form-row">
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"quantity\"><strong>Quantity
                                                                    </strong></label><input class=\"form-control\"
                                                                type=\"number\" placeholder=\"".$row['quantity']."\" name=\"quantity\"></div>
                                                    </div>";
                                                    ?>
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"sales\"><strong>Sales
                                                                    </strong></label><input class=\"form-control\"
                                                                type=\"number\" placeholder=\"0\" name=\"sales\" readonly=\"readonly\"></div>
                                                    </div>";
                                                    ?>
                                                </div>
                                                <div class="form-row">
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"crtDate\"><strong>Created at
                                                                    </strong></label><input class=\"form-control\"
                                                                type=\"datetime\" placeholder=\"".$row['created_at']."\" name=\"crtDate\" readonly=\"readonly\"></div>
                                                    </div>";
                                                    ?>
                                                    <?php
                                                    echo    "<div class=\"col\">"."
                                                        <div class=\"form-group\"><label for=\"updDate\"><strong>Last updated
                                                                    </strong></label><input class=\"form-control\"
                                                                type=\"datetime\" placeholder=\"".$row['updated_at']."\" name=\"updDate\" readonly=\"readonly\"></div>
                                                    </div>";
                                                    ?>
                                                </div>
                                                <div class="form-group"><button
                                                        class="btn btn-primary bg-gradient-deepbluesky bg-gradient-deepbluesky btn-sm"
                                                        type="submit" name="shopInfo">Save&nbsp;Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <?php
                    if (isset($_GET["error"])){
                        echo "<h3 class=\"modal-title\" id=\"exampleModalLongTitle\">Error</h3>";
                    } 
                    if (isset($_GET["res"])){
                        echo "<h3 class=\"modal-title\" id=\"exampleModalLongTitle\">Update</h3>";
                    } 
                    if (isset($_GET["confirm"])){
                        echo "<h3 class=\"modal-title\" id=\"exampleModalLongTitle\">Delete</h3>";
                    } 
                    ?>
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
                                if ($_GET["error"] == "format"){
                                    $mtotal = "Only JPG, JPEG, PNG & GIF files are allowed !";
                                }
                                if ($_GET["error"] == "file"){
                                    $mtotal = "Image already exists !";
                                }
                            }
                            if (isset($_GET["res"])){
                                if ($_GET["res"] == "success"){
                                    $mtotal = "Product updated successfully !";
                                }
                                if ($_GET["res"] == "success2"){
                                    $mtotal = "Image already exists, path changed successfully!";
                                }
                                if ($_GET["res"] == "failure"){
                                    $mtotal = "Product failed to update !";
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
                                    $mtotal = "Product about to be deleted, are you sure ?";
                                }                            
                            } 
                            
                            echo('<h4>'.$mtotal.'</h4>');
                            ?>

                        </div>
                        <div class="modal-footer">
                        <a class="btn btn-secondary"  <?php if(!isset(($_GET['confirm']))) echo('data-dismiss="modal"'); ?> href="<?php if(isset($_GET['confirm'])) echo "Delete_product.php?id=".$_SESSION['id_p'];
                                            else echo('#');?>"><?php
                            if(isset($_GET['confirm'])) echo "Confirm";
                            else echo('Close');
                             ?>
                             </a>
                             <?php if (isset($_GET['confirm'])){ if($_GET['confirm'] == true){
                                 echo "<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>";
                             } }?>                        </div>
                    </div>
                </div>
            </div>
            <button id="a" type="button" class="btn btn-primary"
                style="background-color:transparent;border-color:transparent;box-shadow: 10px 10px 10px rgba(0, 0, 0, 0);"
                data-toggle="modal" data-target="#exampleModalLong">
            </button>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © GEEK Store 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-charts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>