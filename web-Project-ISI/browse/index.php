  <?php
  if (!isset($_GET["page"])){
    $page=1;
  }else{
    $page = $_GET["page"];
  }
  $number_per_page = 12;
  $catg="";
  if (isset($_GET["catg"])){
    $catg = "catg=".$_GET["catg"];
  }
  $sub_catg="";
  if (isset($_GET["sub_catg"])){
    $sub_catg = "&sub_catg=".$_GET["sub_catg"];
  }
  ?>
  <?php require_once '../includes/header.php'; ?>
  <link rel="stylesheet" href="style.css">
    <title>Hello, world!</title>
  </head>
  <body>
  <?php require_once '../includes/navbar.php'; ?>
    <div class="container">
      <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <?php if (isset($_GET["catg"])): ?>
            <?php $url="catg=". $_GET["catg"]; ?>
            <li class="breadcrumb-item"><a href="./index.php?<?php echo $catg; ?>"><?php echo $_GET["catg"]; ?></a></li>
            <?php endif; ?>
            <?php if (isset($_GET["sub_catg"])): ?>
            <?php $url="catg=". $_GET["catg"] ."&sub_catg=".$_GET["sub_catg"]; ?>
            <li class="breadcrumb-item"><a href="./index.php?<?php echo $catg; ?><?php echo $sub_catg; ?>"><?php echo $_GET["sub_catg"]; ?></a></li>
            <?php endif; ?>
        </ol>
    </nav>
        <div class="row mt-2">
              <div class="col-md-4 col-xl-3 bg-light">
                <section>
                  <?php 
                  $sql = "SELECT * FROM category;";
                  $result = mysqli_query($conn, $sql);
                  ?>
                  <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <ul class="dropdown-ul">
                      <a href="./index.php?catg=<?php echo $row["slug"] ?>" class="catg_target w-100">
                      <li class="cat-item"><span class="btn btn-primary center px-1 py-1 w-100"><?php echo $row['title'] ?></span>
                      </a>  
                      <ul class="bg-liste-cat w-100">
                          <?php 
                          $sql_cat = "SELECT sub.* FROM sub_category sub,category where category.id_cat = sub.id_cat and category.id_cat = ".$row['id_cat'].";";
                          $result_cat = mysqli_query($conn, $sql_cat);
                          ?>
                          <?php while ($row_cat = mysqli_fetch_assoc($result_cat)): ?>
                          <a href="./index.php?catg=<?php echo $row["slug"] ?>&sub_catg=<?php echo $row_cat["title"] ?> " class="w-100" style="text-decoration:none;color:black;">
                            <li class="center card-item"><?php echo $row_cat["title"] ?></li>
                          </a>
                          <?php endwhile ?>
                        </ul>
                      </li>
                    </ul>
                    <?php endwhile ?>      
                </section>
                <h4 class="mt-5">Price :</h4>
                <div class="d-flex align-items-center justify-content-center mb-5">
                    <div class="middle">
                      <form action="index.php?<?php echo ''.$catg; ?><?php echo ''.$sub_catg; ?>" method="POST">
                        <div class="slider-container">
                          <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Min :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="min" aria-describedby="emailHelp" placeholder="Min">
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Max :</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="max" aria-describedby="emailHelp" placeholder="Max">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex justify-content-center">
                        <button class="btn btn-dark" type="submit">
                          Search
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>  

            <div class="col-md-8 col-xl-9 col-sm-12 bg-light">     
              <div class="row">
                <?php 
                $this_page=($page-1)*$number_per_page;
                //Get Min price
                $min = 0;
                if (isset($_POST["min"])){
                  $min = (int)$_POST["min"];
                }
                // Get max price
                $max = 1000000;
                if (isset($_POST["max"])){
                  $max = (int)$_POST["max"];
                }

                if (isset($_GET["sub_catg"])){
                  //Get sub category ID
                  $x = $_GET["sub_catg"];
                  $sql_sub = "SELECT * FROM sub_category where title = '$x' ;";
                  $result = mysqli_query($conn, $sql_sub);
                  $row = mysqli_fetch_assoc($result);
                  //Get Items Count
                  $sql1 = "SELECT count(*) as nb FROM product as p where  p.id_cat = ".$row["id_sub"]." ;";
                  $result1 = mysqli_query($conn, $sql1);
                  $row1 = mysqli_fetch_assoc($result1);
                  $num_of_res = $row1["nb"];
                  //the actual query

                  $sql = "SELECT  * FROM product as p where  p.id_cat = ".$row["id_sub"]." and p.price>=".$min." and p.price<=".$max."  LIMIT ".$this_page." , ".$number_per_page." ;";
                }else if (isset($_GET["catg"])){
                  //Get category ID
                  $x = $_GET["catg"];
                  $sql_sub = "SELECT * FROM category where slug = '$x' ;";
                  $result = mysqli_query($conn, $sql_sub);
                  $row = mysqli_fetch_assoc($result);
                  //Get Items Count
                  $sql1 = "SELECT DISTINCT count(*) as nb from product as p, category as c,sub_category as s 
                  where p.id_cat = s.id_sub and s.id_cat = c.id_cat and c.id_cat =".$row["id_cat"].";";
                  $result1 = mysqli_query($conn, $sql1);
                  $row1 = mysqli_fetch_assoc($result1);
                  $num_of_res = $row1["nb"];
                  $resultcheck = mysqli_num_rows($result1);
                  $sql = "SELECT DISTINCT p.*,c.slug as cat_slug from product as p, category as c,sub_category as s 
                  where p.id_cat = s.id_sub and s.id_cat = c.id_cat and c.id_cat =".$row["id_cat"]." and p.price>=".$min." and p.price<=".$max." LIMIT ".$this_page." , ".$number_per_page." ;";
                }
                $result = mysqli_query($conn, $sql);
                $resultNums = mysqli_num_rows($result);
                if ($resultNums ==0):?>
                <div class="d-flex justify-content-center w-100 my-2">
                  <div class="alert alert-primary" role="alert">
                    No products yet
                  </div>
                </div>
                <?php endif;?>
                <?php $number_of_pages = ceil($num_of_res/$number_per_page); ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                
                  <div class="col-md-6 col-xl-4 col-sm-12 mb-2" >
                    <div class="card h-100">
                      <img class="card-img-top img-fluid" width=175px height =200px; src="../pictures/<?php echo $row["picture"]?>" alt="Card image cap">
                      <div class="card-body">
                        <h3 class="card-title mb-3 text-primary"><?php echo $row["title"] ?></h3>
                        <h5 class="card-title"><?php echo $row["price"] ?>$</h5>
                        <p class="card-text text-secondary"><?php echo substr($row["summary"],0,40)."...";
                        for ($j = 0;$j<40-strlen(substr($row["summary"],0,40));$j++):?>
                          <span style="opacity:0">c</span>
                        <?php endfor ?></p>
                        <a href="../product?id=<?php echo $row["id_p"];?>" class="btn btn-primary">Check The product</a>
                      </div>
                    </div>
                  </div>
                  
                <?php endwhile ?>   
                </div>

                <div aria-label="Page navigation example" class="center">
                  <ul class="pagination">
                    <!--Previous button-->
                    <li class="page-item">
                      <a class="page-link" href="index.php?<?php echo $url; ?>&page=<?php 
                      if ($page-1>0){
                        echo $page-1;
                      }else{
                        echo $page;
                      }
                      ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <?php 
                    for($i = $page-3;$i<=$page+3;$i++):?>
                    <?php if ($i>=1 && $i<=$number_of_pages):?>
                      <li class="page-item<?php if ($i==$page) echo " active"?>"><a class="page-link" 
                      href="index.php?<?php echo $url; ?>&page=<?php echo $i;?>"><?php echo $i;?></a></li>
                    <?php endif; ?>
                    <?php endfor;?>                    
                    <!--Next button-->
                    <li class="page-item">
                      <a class="page-link" href="index.php?<?php echo $url;?>&page=<?php 
                      if ($page+1<=$number_of_pages){
                        echo $page+1;
                      }else{
                        echo $page;
                      }
                      ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="container ">
                    <div id="pagination-wrapper"></div>
                </div>
    
    
            </div> 
              
        </div>
    </div>

    
  </body>
  
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
    window.onload = ()=>{
      console.log(window.screen.width)
      if (window.screen.width<500){
        const el = document.querySelectorAll(".catg_target")
        for (let i=0;i<el.length;i++){
          el[i].href = "#"
      }
      }
    }
  </script>
</html>