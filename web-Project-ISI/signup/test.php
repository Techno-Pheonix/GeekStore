<?php 
include_once 'dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>
    
<?php
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    $resultcheck = mysqli_num_rows($result);

    if ($resultcheck>0){
        while ($row = mysqli_fetch_assoc($result)){
            echo $row['first_name'];
        }
    }
?>

</body>
</html>