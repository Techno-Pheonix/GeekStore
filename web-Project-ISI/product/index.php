  <?php require_once "../includes/header.php"; ?>
    <link rel="stylesheet" href="style.css">
    <title>Hello, world!</title>
  </head>
  <body>
    
  <?php require_once "../includes/navbar.php"; ?>
  <?php

  if (isset($_POST["add_to_cart"])){
    $item_array = array(
      "item_id" => $_GET["id"],
      "item_name" => $_POST["title"],
      "item_price"=> $_POST["price"],
      "item_quantity"=> $_POST["quantity"],
      "item_av_quantity" => $_POST["av_quantity"]
    );

    $count = count($_SESSION["shopping_cart"]);
    $exists = false;

    for ($i = 0 ;$i<$count;$i++){
      if ($_SESSION["shopping_cart"][$i]["item_id"] == $item_array["item_id"]){
        $_SESSION["shopping_cart"][$i]["item_quantity"] =$item_array["item_quantity"];
        $exists=true;
      }
    }
  
    if (!$exists){
      $_SESSION["shopping_cart"][$count] = $item_array;
    }
  }
  ?>
  <?php 

  var_dump($_SESSION["shopping_cart"]);
    $sql = "SELECT * FROM product where id_p = ".$_GET["id"].";";
    $result = mysqli_query($conn, $sql);
    ?>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div class="container">
      <div class="product row mt-4">
        <img class="col-md-6 col-sm-12" src="../pictures/<?php echo $row["picture"]?>" alt="" height="500px" width="30%">
        <div class="col-md-5 col-sm-12 prod-form pt-5">
          <form action="index.php?id=<?php echo $_GET["id"];?>&add=success" method="post">  
            <h1 class="prod-name my-5"><?php echo $row["title"] ?></h1>
            <div class=" price-add row">
              <h4 class="col-4 " style="color :#14213d">Quantity: </h4>
              <div class="col-4 d-flex mr-3" style="height:40px">
                <div class="btn btn-dark" onclick="sous()">-</div>
                <div class="form-group">
                  <input type="text" name="quantity" class="form-control" style="width:45px" value=1 width=20 id="quantity" name="quantity">
                </div>
                <input type="text" class="d-none" name="id" value="<?php echo $_GET["id"]?>">
                <input type="text" class="d-none" name="price" value="<?php echo $row["price"]?>">
                <input type="text" class="d-none" name="title" value="<?php echo $row["title"]?>">
                <input type="text" id="av_quantity" class="d-none" name="av_quantity" value="<?php echo $row["quantity"]?>">
                <div class="btn btn-dark" onclick="add()">+</div>
              </div>
            </div>
            <div class="price-add">
              <h2><?php echo number_format($row["price"],2) ?> &nbsp $</h2>
              <button type="submit" id="to_cart" name="add_to_cart">Add To Cart</button>
            </div>
          </form>
          <?php if(isset($_GET["add"])): ?>
          <div class="alert alert-success" role="alert">
            Items Added To Cart
          </div>
          <?php endif ?>
        </div>
      </div>
      <div class="prod-desc">
        <h1 class="other-title">
          Description :
        </h1>
        <p><?php echo $row["summary"] ?></p>
      </div>
    <?php endwhile ?> 


      <h1 class="other-title">
        Other Items :
      </h1>
      <div class="other-items my-4 row gx-3">
                <?php 
                $sql = "SELECT * FROM sub_category, product as p where p.id_cat = sub_category.id_sub and  p.id_p <> ".$_GET["id"]." LIMIT 3;";                
                $result = mysqli_query($conn, $sql);
                ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                  <div class="col-md-6 col-xl-4 col-sm-12 mb-2" >
                    <div class="card">
                      <img class="card-img-top img-fluid" src="../pictures/<?php echo $row["picture"]?>" alt="Card image cap">
                      <div class="card-body">
                        <h3 class="card-title text-primary"><?php echo $row["title"] ?></h3>
                        <h5 class="card-title"><?php echo $row["price"] ?>$</h5>
                        <p class="card-text text-secondary"><?php echo substr($row["summary"],0,40)."...";
                        for ($j = 0;$j<40-strlen(substr($row["summary"],0,40));$j++):?>
                          <span style="opacity:0">a</span>
                        <?php endfor ?> 
                        </p>
                        <a href="./?id=<?php echo $row["id_p"];?>" class="btn btn-primary">Check The product</a>
                      </div>
                    </div>
                  </div>
                <?php endwhile ?>   
      </div>
    </div>

    <script>
      const el = document.getElementById("quantity")
      const qty = document.querySelector("#av_quantity").value

      const add = ()=>{
        if (parseInt(el.value)<qty)
        el.value= parseInt(el.value)+1
      }

      const sous = ()=>{
        if (parseInt(el.value)>1)el.value = parseInt(el.value)-1
      }
    </script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>