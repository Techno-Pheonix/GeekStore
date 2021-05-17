<?php
session_start();
if ($_SESSION['isadmin'] == false){
    header("location:login.php");
    exit();
}
require_once 'includes/dbh.inc.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Geek Store</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap2.min.css">
    <link rel="icon" href="../pictures/fav.ico" />
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
                <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php"><i
                                class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="profile.php"><i
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
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><button
                                        class="btn btn-primary bg-gradient-deepbluesky dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false" type="button"><span
                                            class="d-none d-lg-inline mr-2 text-white-600 small"><?php echo($_SESSION['user']); ?></span><img
                                            class="border rounded-circle img-profile" width="60px" height="60px"
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3><a
                            class="btn btn-primary bg-gradient-deepbluesky btn-sm d-none d-sm-inline-block"
                            role="button" href="#"><i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate
                            Report</a>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                                                <span>Earnings (this month)</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span>$<?php
                                            $sql1 = "SELECT SUM(quantity*total_price) as thismonth from sales where MONTH(datetime) = MONTH(CURRENT_DATE())
                                            AND YEAR(datetime) = YEAR(CURRENT_DATE())";
                                            $query = mysqli_query($conn,$sql1);
                                            $row = mysqli_fetch_assoc($query);
                                            echo($row['thismonth']);
                                            ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1">
                                                <span>Earnings (annual)</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span>$<?php
                                            $sql1 = "SELECT SUM(quantity*total_price) as thismonth from sales where YEAR(datetime) = YEAR(CURRENT_DATE())";
                                            $query = mysqli_query($conn,$sql1);
                                            $row = mysqli_fetch_assoc($query);
                                            echo($row['thismonth']);
                                            ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-info font-weight-bold text-xs mb-1">
                                                <span>Visitors (Today)</span></div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark font-weight-bold h5 mb-0 mr-3">
                                                       <div class="visitor-count"> <?php include "../counter.php"; ?> </div></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1">
                                                <span>Sales today</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span><?php 
                                            $sql4 = "CREATE VIEW view1 AS
                                            SELECT DISTINCT c.id_c from sales s, commande c where MONTH(s.datetime) = MONTH(CURRENT_DATE()) AND YEAR(datetime) = YEAR(CURRENT_DATE()) AND DAY(s.datetime) = DAY(CURRENT_DATE()) AND s.id_c = c.id_c;
                                            ";
                                            $query = mysqli_query($conn,$sql4);
                                            $sql5 = "SELECT count(*) as today from view1;";
                                            $query = mysqli_query($conn,$sql5);
                                            $row = mysqli_fetch_assoc($query);
                                            echo($row['today']);
                                            $sql6 = "DROP VIEW view1;";
                                            $query = mysqli_query($conn,$sql5);
                                            ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Earnings Overview</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false" type="button"><i
                                                class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                            role="menu">
                                            <p class="text-center dropdown-header">dropdown header:</p><a
                                                class="dropdown-item" role="presentation" href="#">&nbsp;Action</a><a
                                                class="dropdown-item" role="presentation" href="#">&nbsp;Another
                                                action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item"
                                                role="presentation" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                    <input type="text" class="d-none" value="<?php 
                                    $sql = "SELECT count(*) as nb ,datetime from sales as s where DATE_FORMAT(datetime, \"%Y-%m\") <= \"".date("Y-m")."\" GROUP BY MONTH(datetime) DESC;" ;
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                        echo $row["nb"]." ";
                                        echo $row["datetime"]." ";
                                    };
                                    ?>" id="graph_data" >
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Products Sales</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false" type="button"><i
                                                class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in"
                                            role="menu">
                                            <p class="text-center dropdown-header">dropdown header:</p><a
                                                class="dropdown-item" role="presentation" href="#">&nbsp;Action</a><a
                                                class="dropdown-item" role="presentation" href="#">&nbsp;Another
                                                action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item"
                                                role="presentation" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    const graph_data = document.querySelector("#graph_data");
    const tab = graph_data.value.trim().split(' ')
    const len = tab.length

    const labels = [];
    const data_set = [];
    for (let i=0 ;i<len;i+=3){
        labels.push(tab[i+1])
        data_set.push(tab[i])
    }
console.log(labels)
console.log(data_set)    

    
        

    const data = {
    labels: labels,
    datasets: [{
        label: 'Earnings review',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: data_set,
    }]
    };
    
    const config = {
        type: 'line',
        data,
        options: {}
    };


  // === include 'setup' then 'config' above ===

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
</body>

</html>