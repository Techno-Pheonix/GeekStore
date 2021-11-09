<?php   
  require_once "../../includes/dbh.inc.php";
  require_once "../assets/templates/navbar.php";
?>
<div class="container-fluid">
    <h2 class="text-dark mb-1">Create Product</h3>
  </div>
  <div class="container my-5">
    <!--The alerts-->
    <?php if (isset($_GET["error"]) and $_GET["error"] == "stmtfailed"): ?>
    <div class="alert alert-danger" role="alert">Error occured while inserting!</div>
    <?php elseif (isset($_GET["sucess"]) and $_GET["sucess"] == "true"): ?>
    <div class="alert alert-success" role="alert">Inserted successfully!</div>
    <?php endif ?>
    <!--Form-->
    <form action="add_sub_cat.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="Name">Sub category Name</label>
        <input type="text" required class="form-control" id="Name" name="sub-name" aria-describedby="emailHelp"
          placeholder="Please Enter Name...">
      </div>
      <div class="form-group">
        <label for="Category">Select Category</label>
        <select class="form-control" id="Category" name="sub-category">
          <option value="none"> Select category 
          <?php 
          $sql = "SELECT * FROM category";
          $result = mysqli_query($conn, $sql);
          ?>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <option value="<?php echo $row['id_cat'] ?>"><?php echo $row['title'] ?></option>
          <?php endwhile ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      <button type="reset" class="btn btn-secondary" name="submit">Reset</button>
    </form>
  </div>
  <?php 
  require_once "../assets/templates/footer.php";
  ?>