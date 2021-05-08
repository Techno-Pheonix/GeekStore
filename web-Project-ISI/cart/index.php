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

    <title>Hello, world!</title>
  </head>
  <body>
  <?php require_once "../includes/navbar.php"; ?>
    <div class="container">
        <div class="row pt-4">
            <div class="col-lg-8 panier-contenu mx-1">
                <h3 class="my-3">Mon Panier</h3>
                <?php 
                $i=-1;
                foreach ($_SESSION["shopping_cart"] as $item):?>
                <?php $i=$i+1;?>                    
                    <div class="prod">
                        <div class="row">
                            <div class="col-md-4 center">
                                <img src="img.jpg" height="220px" width="100%" style="max-width: 300px;">
                            </div>
                            <div class="col-md-8">
                                <h1 class="price_tag" id =<?php echo $i;?>><?php echo $item["item_price"]?>$</h1>
                                <input type="text" class="d-none item_price" name="title" value="<?php echo $item["item_price"]?>">
            
                                <h5 class="text-secondary my-3"><?php echo $item["item_name"];?></h5>
                                <form action="">
                                    <div class="d-flex align-items-center justify-content-start flex-st my-4">
                                        <label for="exampleFormControlSelect1" class="mx-2">Quantity</label>
                                        <div class="col-4 d-flex mr-3" style="height:40px">
                                            <div class="btn btn-dark" onclick="sous(this.id)" id ="<?php echo $i;?>">-</div>
                                            <div class="form-group">
                                                <input type="text" name="quantity" class="form-control quantity_btn" quantity_btn" style="width:40px" value=1 width=20 id="this.id" name="quantity">
                                            </div>
                                            <div class="btn btn-dark" onclick="add(this.id)" id ="<?php echo $i;?>">+</div>
                                        </div>
                                    </div> 
                                </form>
                            </div>
                        </div>
                        <hr>
                    </div>
                <?php endforeach ?>
            </div>
  
            <div class="col-lg-3 total-price mx-1 ">
            <div class="d-flex">
                    <h4>Total Price : </h4><h4 id="total_price">12</h4><h4>$</h4>
                </div>    
            
                <div class="d-flex">
                    <h4>Tax:</h4><h4 id ="tax">12</h4><h4>%</h4>
                </div>
                <h4 id = "Final_price">Total: 12%</h4>
                <hr>
                <div class="center">
                    <button class="btn btn-primary btn-lg">Procced to shipment</button>
                </div>
            </div>
        </div>
    </div>
    

    <script>
        window.onload = ()=>{
            update()
            console.log("nah")
        }
        const updateElem=(id)=>{
            const el = document.querySelectorAll(".quantity_btn")[id]
            const el1 = document.querySelectorAll(".price_tag")[id]
            const el2 = document.querySelectorAll(".item_price")[id]
            el1.innerText = el2.value*el.value+"$";
        }
        const update = ()=>{            
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
            final_price.innerText = "Final price : "+parseInt(total_price.innerText)*(1-(parseInt(tax.innerText)/100))+"$"
        }
        const add = (id)=>{
            const el = document.querySelectorAll(".quantity_btn")[id]
            el.value= parseInt(el.value)+1
            updateElem(id)
            update()
        }
        const sous = (id)=>{
            const el = document.querySelectorAll(".quantity_btn")[id]
            if (parseInt(el.value)>1)el.value = parseInt(el.value)-1
            updateElem(id)
            update()
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>