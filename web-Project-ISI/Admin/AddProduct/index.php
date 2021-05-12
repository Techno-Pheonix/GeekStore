<?php   
  require_once "../includes/dbh.inc.php";
  require_once "../assets/templates/navbar.php";
?>
<div class="container-fluid">
    <h2 class="text-dark mb-1">Create Product</h3>
  </div>
  <div class="container my-5">
    <!--The alerts-->
    <?php if (isset($_GET["error"]) and $_GET["error"] == "file_ext"):?>
        <div class="alert alert-danger" role="alert">File type must be jpeg!</div>
    <?php elseif (isset($_GET["slug"]) and $_GET["slug"] == "exits"): ?>
    <div class="alert alert-danger" role="alert">Slug Already used!</div>
    <?php elseif (isset($_GET["category"]) and $_GET["category"] == "nothing"): ?>
    <div class="alert alert-danger" role="alert">Category empty!</div>
    <?php elseif (isset($_GET["sucess"]) and $_GET["sucess"] == "true"): ?>
    <div class="alert alert-success" role="alert">Insertion sucessfully!</div>
    <?php endif ?>
    <!--Form-->
    <form action="add_prod.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="Name">Product Name</label>
        <input type="text" required class="form-control" id="Name" name="prod-name" aria-describedby="emailHelp"
          placeholder="Please Enter Name...">
      </div>
      <div class="form-group">
        <label for="Meta Data">Product Meta Name</label>
        <input type="text" required class="form-control" id="Meta Data" name="prod-meta" aria-describedby="emailHelp"
          placeholder="Please Enter Meta title...">
      </div>
      <div class="form-group">
        <label for="Slug">Product Slug</label>
        <input type="text" required class="form-control" id="Slug" name="prod-slug" aria-describedby="emailHelp"
          placeholder="Please Enter Slug...">
      </div>
      <div class="form-group">
        <label for="Summary">Product Summary</label>
        <input type="text" required class="form-control" id="Summary" name="prod-summary" aria-describedby="emailHelp"
          placeholder="Please Enter summary...">
      </div>
      <div class="form-group">
        <label for="Category">Select Category</label>
        <select class="form-control" id="Category" name="prod-category">
          <option value="none"> Select category 
          <?php 
          $sql = "SELECT * FROM sub_category";
          $result = mysqli_query($conn, $sql);?>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <option value="<?php echo  $row["id_sub"] ?>"><?php echo $row["title"] ?></option>
          <?php endwhile ?>
        </select>
      </div>
      <div class="form-group">
        <label for="Quantity">Quantity</label>
        <input type="number" min="1" step="0.01" required class="form-control" id="prod-quantity" name="Quantity"
          aria-describedby="emailHelp" placeholder="Please Enter Quantity...">
      </div>
      <div class="form-group">
        <label for="Price">Price in USD</label>
        <input type="number" min="1" step="0.01" required class="form-control" id="prod-price" name="Price"
          aria-describedby="emailHelp" placeholder="Please Enter price...">
      </div>
      <div class="form-group">
        <label for="Image">Upload Image</label>
        <input type="file" required class="form-control-file" name="file" id="Image">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <button type="reset" class="btn btn-secondary" name="submit">Reset</button>
    </form>
  </div>
  <?php 
  require_once "../assets/templates/footer.php";
  ?>