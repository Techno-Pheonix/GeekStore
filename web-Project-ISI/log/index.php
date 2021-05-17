<?php
require_once "../includes/header.php"; ?>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css">
    <title>Geek Store - Log</title>
  </head>
  <body>
    
<?php require_once "../includes/navbar.php"; ?>
<div class="container-fluid">
                    <div class="title text-center mt-4">
                    <h3 class="text-dark mb-4">Purchases</h3></div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Purchase Info</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="data_Table" role="grid"
                                aria-describedby="dataTable_info">
                                <table class="table dataTable my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Command</th>
                                            <th>Date</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$sql = "SELECT p.title as ProdName, p.picture as pic, c.id_c as idCmd, s.datetime as dte, s.total_price*s.quantity as total, s.quantity as qty from product p,sales s, commande c where p.id_p = s.id_p and s.id_c = c.id_c and c.id_user = ".$_SESSION['user_id'];
$query = mysqli_query($conn,$sql);

?>
                                        <?php
while ($row = mysqli_fetch_array($query)) {
    echo "<tr data-href=\"#\">";
    echo "<td><img class=\"rounded-circle mr-2\" width=\"30\" height=\"30\" src=\"". $row['pic'] ."\">". $row['ProdName'] ."</td>";
    echo "<td>" . $row['qty'] . "</td>";
    echo "<td>" . $row['idCmd']. "</td>";
    echo "<td>" . $row['dte']. "</td>";
    echo "<td>" . $row['total'] . "</td>";
    echo "</tr>";
}

?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Command</th>
                                            <th>Date</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
    <?php require_once "../includes/footer.php";?>
    <script src="../admin/assets/js/jquery.min.js"></script>
    <script src="../admin/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../admin/assets/js/chart.min.js"></script>
    <script src="../admin/assets/js/bs-charts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../admin/assets/js/theme.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>
    <script>
        function createnew() {
            window.location.href = "AddProduct/index.php";
        }
    </script>
    
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
                order: [[3, 'dsc']],
                rowGroup: {
                    startRender: null,
                    endRender: function ( rows, group ) {
                    var salaryAvg = rows
                    .data()
                    .pluck(4)
                    .reduce( function (a, b) {
                        return a + b.replace(/[^\d]/g, '')*1;
                    }, 0) ;
                    salaryAvg = $.fn.dataTable.render.number(',', '.', 0, '$').display( salaryAvg );
                    return $('<tr/>')
                    .append( '<td colspan="2">Command Id°'+group+'</td>' )
                    .append( '<td> </td>' )
                    .append( '<td/>' )
                    .append( '<td>'+salaryAvg+'</td>' );
                    },
                    dataSrc: 2
                },
                ordering: true,
                "columnDefs" : [ {
                "targets": [0,1,4], /* column index */
                "orderable" : false, /* true or false */
                }]
            } );
} );
    </script>
</body>

</html>