<?php
if ($_SESSION['isadmin']==true){
  $account = "Admin Panel";
  $link = "/admin";
}
else {
  $account = "My Account";
  $link = "/profile";
}
?>
<div >
      <footer class="pt-4 my-md-5 pt-md-5 border-top d-flex justify-content-center mt-4">
        <div class="footer row">
          
          <div class="col-6 col-md">
            <h5>Products</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Trending</a></li>
              <li><a class="text-muted" href="#">Best Seller</a></li>
              <li><a class="text-muted" href="#">Discounts</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>User</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href=<?php echo("$link"); ?>><?php echo($account); ?></a></li>
              <li><a class="text-muted" href="/faq">FAQ</a></li>
              <li><a class="text-muted" href="#">Terms and conditions</a></li>
            </ul>
          </div>
          <div class="col-6 col-md">
            <h5>About Us</h5>
            <ul class="list-unstyled text-small">
              <li><a class="text-muted" href="#">Contact</a></li>
              <li><a class="text-muted" href="#">Location</a></li>
              <li><a class="text-muted" href="#">Delivery</a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>