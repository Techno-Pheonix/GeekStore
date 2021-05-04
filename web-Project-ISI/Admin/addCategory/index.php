<?php   
    require_once "../../includes/dbh.inc.php";
    require_once "../assets/templates/navbar.php";
?>
<div class="container-fluid">
    <h2 class="text-dark mb-1">Create Category</h3>
  </div>
  <div class="container my-5">
    <!--The alerts-->
    <?php if (isset($_GET["slug"]) and $_GET["slug"] == "exits"): ?>
    <div class="alert alert-danger" role="alert">Slug Already used!</div>
    <?php elseif (isset($_GET["error"]) and $_GET["error"] == "stmtfailed"): ?>
    <div class="alert alert-danger" role="alert">Error occured while inserting!</div>
    <?php elseif (isset($_GET["error"]) and $_GET["error"] == "None"): ?>
    <div class="alert alert-success" role="alert">Inserted successfully!</div>
    <?php endif ?>
    <!--Form-->
    <form action="add_cat.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="Name">Category Name</label>
        <input type="text" required class="form-control" id="Name" name="Category_name" aria-describedby="emailHelp"
          placeholder="Please Enter Name...">
      </div>
      <div class="form-group">
        <label for="Meta Data">Category Meta Name</label>
        <input type="text" required class="form-control" id="Meta Data" name="Category_meta" aria-describedby="emailHelp"
          placeholder="Please Enter Meta title...">
      </div>
      <div class="form-group">
        <label for="Slug">Category Slug</label>
        <input type="text" required class="form-control" id="Slug" name="Category_slug" aria-describedby="emailHelp"
          placeholder="Please Enter Slug...">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <button type="reset" class="btn btn-secondary" name="reset">Reset</button>
    </form>
  </div>
  <?php 
  require_once "../assets/templates/footer.php";
  ?>