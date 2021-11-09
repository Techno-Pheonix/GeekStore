<?php
session_start();
if ($_SESSION['isadmin'] == false){
    header("location:login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Users - Geek Store</title>
    <link rel="icon" href="../pictures/fav.ico" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap2.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="Users.php"><i
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
                    <h3 class="text-dark mb-4">Userbase</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">User Info</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="data_Table" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>E-mail</th>
                                            <th>Account creation date</th>
                                            <th>Last Online</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
require_once 'includes/dbh.inc.php';
$sql = "SELECT * from user";
$query = mysqli_query($conn,$sql);

?>
                                        <?php
while ($row = mysqli_fetch_array($query)) {
    $deleted = "";
    if($row['admin']==-1) $deleted = "*";
    echo "<tr data-href=\"profile.php?id=". $row['id_user']."\">";
    echo "<td><img class=\"rounded-circle mr-2\" width=\"30\" height=\"30\" src=\"../avatars/". $row['avatar'] ."\">" . $row['first_name'] ." ". $row['last_name'] . $deleted . "</td>";
    echo "<td>" . $row['adress'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['registered_at'] . "</td>";
    echo "<td>" . $row['lastlogin'] . "</td>";
    echo "</tr>";
}
?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>E-mail</th>
                                            <th>Account creation date</th>
                                            <th>Last Online</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <p>(*): Deleted</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © GEEK Store 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-charts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script>
function FilteredSearch() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("catInput");
  filter = input.value;
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
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
                "pagingType": "first_last_numbers"
            } );
        });
</script>
</body>

</html>