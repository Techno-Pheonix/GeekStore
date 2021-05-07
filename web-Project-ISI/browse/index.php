
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">


    <title>Hello, world!</title>
  </head>
  <body>
    
  <?php require_once "../includes/navbar.php"; ?>
    <div class="container">
      <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <?php if (isset($_GET["catg"])): ?>
            <li class="breadcrumb-item"><a href="./index.php?catg=<?php echo $_GET["catg"]; ?>"><?php echo $_GET["catg"]; ?></a></li>
            <?php endif; ?>
            <?php if (isset($_GET["sub_catg"])): ?>
            <li class="breadcrumb-item"><a href="./index.php?sub_catg=<?php $_GET["sub_catg"]?>"><?php echo $_GET["sub_catg"]; ?></a></li>
            <?php endif; ?>
        </ol>
    </nav>
        <div class="row mt-2">
              <div class="col-md-12 col-xl-3 bg-light">
                <section>
                  <?php 
                  $sql = "SELECT * FROM category;";git p
                  $result = mysqli_query($conn, $sql);
                  ?>
                  <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <ul class="dropdown-ul">
                      <a href="./index.php?catg=<?php echo $row["slug"] ?>" class="w-100">
                      <li class="cat-item"><span class="btn btn-primary center px-1 py-1 w-100"><?php echo $row['title'] ?></span>
                      </a>  
                      <ul class="bg-liste-cat  w-100">
                          <?php 
                          $sql_cat = "SELECT sub.* FROM sub_category sub,category where category.id_cat = sub.id_cat and category.id_cat = ".$row['id_cat'].";";
                          $result_cat = mysqli_query($conn, $sql_cat);
                          ?>
                          <?php while ($row_cat = mysqli_fetch_assoc($result_cat)): ?>
                          <a href="./index.php?catg=<?php echo $row["slug"] ?>&sub_catg=<?php echo $row_cat["title"] ?> " class="w-100">
                            <li class="center card-item"><?php echo $row_cat["title"] ?></li>
                          </a>
                          <?php endwhile ?>
                        </ul>
                      </li>
                    </ul>
                    <?php endwhile ?>      
                </section>
                <h4>Price :</h4>
                <div class="d-flex align-items-center justify-content-center">
                  <div class="middle">
                    <div class="slider-container">
                      <div class="row">
                        <div class="col-6">
                          <span class="bar"><span class="fill"></span></span>
                          <input id="slider" class="slider" type="range" min="0" max="100" value="50" onchange="updateTextInput(this.value);">
                          
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control w-10" id="textInput" value="50" >
                        </div>
                      </div>
                      </div>
                  </div>
                </div>
              </div>  


              
            <div class="col-md-12 col-xl-9 col-sm-12 bg-light">
              <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                <label>Show&nbsp;
                  <select class="form-control form-control-sm custom-select custom-select-sm">
                    <option value="10" selected="">12</option>
                    <option value="25">20</option>
                    <option value="50">40</option>
                  </select>
                  &nbsp;
                </label>
              </div>  
              <div class="row">
                <?php 
                $sql = "SELECT * FROM product;";
                $result = mysqli_query($conn, $sql);
                ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                  <div class="col-md-6 col-xl-4 col-sm-12 mb-2" >
                    <div class="card">
                      <img class="card-img-top img-fluid" src="../pictures/<?php echo $row["picture"]?>" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $row["title"] ?></h5>
                        <h5 class="card-title"><?php echo $row["price"] ?></h5>
                        <p class="card-text"><?php echo substr($row["summary"],0,30)  ?></p>
                        <a href="../product?id=<?php echo $row["id_p"];?>" class="btn btn-primary">Check The product</a>
                      </div>
                    </div>
                  </div>
                <?php endwhile ?>   
                </div>

                <div aria-label="Page navigation example" class="center">
                  <ul class="pagination">
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </div>

    
            </div> 
              
        </div>
    </div>

    
          


  </body>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
</html>