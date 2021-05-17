
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="icon" href="../pictures/fav.ico" />
    <title>Cart</title>
  </head>
  <body>
  <?php require_once "../includes/navbar.php"; ?>

    <div class="container">
        <div class="row pt-4">
            <div class="col-lg-<?php if (count($_SESSION["shopping_cart"])) echo "8"; else echo "12";?> panier-contenu mx-1 bg-light">
                <h3 class="my-3">Mon Panier</h3>
                <?php if (count($_SESSION["shopping_cart"]) == 0):?>
                
                    <div class="alert alert-primary" role="alert">
                        No Items In Cart
                    </div>
                <?php endif ?>
                <?php 
                $i=-1;
                foreach ($_SESSION["shopping_cart"] as $item):?>
                <?php
                $sql = "SELECT * FROM product where id_p = ".$item["item_id"]." ;";                
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                ?>
                <?php $i=$i+1;?>                    
                    <div class="prod">
                        <div class="row my-2">
                            <div class="col-md-4 center">
                                <img src="../pictures/<?php echo $row["picture"];?>" height="220px" width="100%" style="max-width: 300px;">
                            </div>
                            <div class="col-md-8">
                                <h1 class="price_tag" id =<?php echo $i;?>><?php echo number_format($item["item_price"]*$item["item_quantity"],2)?>$</h1>
                                <input type="text" class="d-none item_price" name="title" value="<?php echo $item["item_price"]?>">
                                <input type="text" class="d-none item_id" name="title" value="<?php echo $item["item_id"]?>">
                                <input type="text" class="d-none item_av_quantity" name="item_av_quantity" value="<?php echo $item["item_av_quantity"]?>">
                                <h5 class="text-secondary my-3"><?php echo $item["item_name"];?></h5>
                                <div class="d-flex align-items-center justify-content-start flex-st my-4">
                                    <label or="exampleFormControlSelect1" class="mx-2">Quantity</label>
                                    <div class="col-4 d-flex mr-3" style="height:40px">
                                        <button class="btn btn-dark" onclick="sous(this.id)" id ="<?php echo $i;?>">-</button>
                                        <div class="form-group">
                                            <input type="text" name="item_quantity" class="form-control quantity_btn item_quantity"  style="width:50px" value=<?php echo $item["item_quantity"]?> width=20 id="this.id" name="quantity">
                                        </div>
                                        <button class="btn btn-dark" onclick="add(this.id)" id ="<?php echo $i;?>">+</button>
                                    </div>
                                </div> 
                                <button class="btn btn-danger remove_btn" id ="<?php echo $i;?>" class ="remove" onclick="remove(this.id)" name="remove_btn">Remove</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                <?php endforeach ?>
            </div>
            <?php if (count($_SESSION["shopping_cart"])):?>
                <div class="col-lg-3 total-price mx-1 bg-light">
                <div class="d-flex">
                        <h4>Total Price : </h4><h4 id="total_price">12</h4><h4>$</h4>
                    </div>    
                
                    <div class="d-flex">
                        <h4>Tax:</h4><h4 id ="tax">12</h4><h4>%</h4>
                    </div>
                    <h4 id = "Final_price">Total: 12%</h4>
                    <hr>
                    <div class="center">
                        <a href="../payement/index.php">
                            <button class="btn btn-primary btn-lg">Procced to shipment</button>
                        </a>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        window.onload = ()=>{
            updateTotalPrice()
        }
        
        const updateElem=(id)=>{
            const el = document.querySelectorAll(".quantity_btn")[id]
            const el1 = document.querySelectorAll(".price_tag")[id]
            const el2 = document.querySelectorAll(".item_price")[id]
            el1.innerText = el2.value*el.value+"$";
        }

        const updateTotalPrice = ()=>{            
            let total_price = document.querySelector("#total_price")
            let items_prices = document.querySelectorAll(".price_tag")
            let sum=0
            for (let i=0;i<items_prices.length;i++){
                str = items_prices[i].innerText
                sum+=parseInt(str.substring(0,str.length-1));
            }
            total_price.innerText = sum
            const final_price = document.querySelector("#Final_price")
            const tax = document.querySelector("#tax")
            final_price.innerText = "Final price : "+Math.round(parseInt(total_price.innerText)*(1+(parseInt(tax.innerText)/100)) * 100) / 100+"$"
        }

        const add = (id)=>{
            const el = document.querySelectorAll(".quantity_btn")[id]
            const qty_av = document.querySelectorAll(".item_av_quantity")[id]
            if (parseInt(el.value)<10)el.value= parseInt(el.value)+1
            updateElem(id)
            updateTotalPrice()

            const info  = {id,quantity : el.value}
            fetch("./update.php", {
                method: "POST",
                body:JSON.stringify(info)
                })
                .then(function(result) { 
                    return result.json();
                }).then((res)=>{
                    console.log(res)
                })

        }

        const sous = (id)=>{
           
            const el = document.querySelectorAll(".quantity_btn")[id]
            if (parseInt(el.value)>1)el.value = parseInt(el.value)-1
            updateElem(id)
            updateTotalPrice()
            const info  = {id,quantity : el.value}
            fetch("./update.php", {
                method: "POST",
                body:JSON.stringify(info)
                })
                .then(function(result) { 
                    return result.json();
                }).then((res)=>{
                    console.log(res)
                })

        }

        const remove=(id)=>{
            const info = {id}
            const el = document.querySelectorAll(".remove_btn")[id]
            const prod_info = el.parentElement
            prod_info.parentElement.remove()
            fetch("./remove.php", {
                method: "POST",
                body:JSON.stringify(info)
                })
                .then(function(result) {
                    
                return result.json();
                }).then((res)=>{
                    console.log(res)
                })
                updateTotalPrice()
        }
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?php require_once '../includes/footer.php'; ?>
  </body>
</html>