<?php
session_start();
if ($_SESSION['isadmin'] == false){
    header("location:login.php");
    exit();
}
require_once 'includes/dbh.inc.php';
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = "SELECT * from user where id_user = ".$id;
$_SESSION['perm'] = " readonly=\"readonly\"";
$_SESSION['url'] = "profile.php?id=".$id;
}
else
{
$sql = "SELECT * from user where id_user =".$_SESSION['user_id'];
$_SESSION['perm'] = "";
$_SESSION['url'] = "profile.php";
}

$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Geek Store</title>
    <link rel="icon" href="../pictures/fav.ico" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap2.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css">
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="profile.php"><i
                                class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Users.php"><i
                                class="fas fa-users"></i><span>Users</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Products.php"><i
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
                                        class="btn btn-primary bg-gradient-deepbluesky py-0" type="button"><i
                                            class="fas fa-search"></i></button></div>
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
                                                    class="btn btn-primary bg-gradient-deepbluesky py-0"
                                                    type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><button
                                        class="btn btn-primary bg-gradient-deepbluesky dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false" type="button"><span
                                            class="d-none d-lg-inline mr-2 text-white-600 small"><?php echo($_SESSION['user']); ?></span><img
                                            class="border rounded-circle img-profile"
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
                    <h3 class="text-dark mb-4">Profile</h3>
                    <a  href="<?php echo($_SESSION['url']."?") ?>confirm=true">
                        <button
                        class="btn btn-primary bg-gradient-deepbluesky bg-gradient-deepbluesky" type="button"
                        style="margin-bottom: 15px;">Delete User</button></a>
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
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Purchases</h6>
                                </div>
                                <div class="card-body">
                            <div class="table-responsive table mt-2" id="data_Table" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Command</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
if(!isset($_GET['id']))
$sql2 = "SELECT p.title as ProdName, p.picture as pic, c.id_c as idCmd, s.datetime as dte, s.total_price*s.quantity as total, s.quantity as qty from product p,sales s, commande c where p.id_p = s.id_p and s.id_c = c.id_c and c.id_user = ".$_SESSION['user_id'];
else
$sql2 = "SELECT p.title as ProdName, p.picture as pic, c.id_c as idCmd, s.datetime as dte, s.total_price*s.quantity as total, s.quantity as qty from product p,sales s, commande c where p.id_p = s.id_p and s.id_c = c.id_c and c.id_user = ".$_GET['id'];
$query2 = mysqli_query($conn,$sql2);
?>
                                        <?php
while ($row2 = mysqli_fetch_array($query2)) {
    echo "<tr data-href=\"#\">";
    echo "<td><img class=\"rounded-circle mr-2\" width=\"30\" height=\"30\" src=\"". $row2['pic'] ."\">". $row2['ProdName'] ."</td>";
    echo "<td>" . $row2['qty'] . "</td>";
    echo "<td>" . $row2['idCmd']." at ".$row2['dte']."</td>";
    echo "<td>" . $row2['total'] . "</td>";
    echo "</tr>";
}
?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Command</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
                        <a class="btn btn-secondary"  <?php if(!($_GET['confirm'] == true)) echo('data-dismiss="modal"'); ?> href="<?php if($_GET['confirm'] == true) echo "Delete_profile.php?id=".$id;
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
            <button id="a" type="button" class="btn btn-primary"
                style="background-color:transparent;border-color:transparent;box-shadow: 10px 10px 10px rgba(0, 0, 0, 0);"
                data-toggle="modal" data-target="#exampleModalLong">
            </button>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © GEEK Store 2019</span></div>
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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>
    <script>
        let isCommandPressed = false;
        window.addEventListener("keydown", (event) => {
        if (event.which === 91) {
            isCommandPressed = true;
        }
        });

        window.addEventListener("keyup", (event) => {
        if (event.which === 91) {
            isCommandPressed = false;
        }
        });
        $(document).ready(function () {
            $(document.body).on("click", "tr[data-href]", function () {
                //window.location.href = this.dataset.href;
                if (isCommandPressed) {
                    window.open(this.dataset.href, "_blank");
                    }
                else {
                    window.location.href = this.dataset.href;
                    }
            });
        });
        $(document).ready(function() {
            $('#dataTable').DataTable( {
                "pagingType": "first_last_numbers",
                order: [[2, 'desc']],
                rowGroup: {
                    startRender: null,
                    endRender: function ( rows, group ) {
                    var salaryAvg = rows
                    .data()
                    .pluck(3)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0) ;
                    salaryAvg = $.fn.dataTable.render.number(',', '.', 0, '$').display( salaryAvg );
                    return $('<tr/>')
                    .append( '<td colspan="2">Command Id°'+group+'</td>' )
                    .append( '<td>'+salaryAvg+'</td>' );
                    },
                    dataSrc: 2
                },
                ordering: true,
                "columnDefs" : [ {
                "targets": [0,1,3], /* column index */
                "orderable" : false, /* true or false */
                },
                {
                    targets: [2],
                    visible: false
                }
                ],
                searching: false,
                lengthMenu: [ 2, 4, 8 ]
            } );
        } );
    </script>
</body>

</html>