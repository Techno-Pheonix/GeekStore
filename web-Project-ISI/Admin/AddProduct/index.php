<?php   require_once "..\..\includes\header.php";
        require_once "..\..\includes\\navbar.php";
?>
<div class="container my-5">
    <h2 class="my-3">Add Product:</h2>
    <?php 
    
    if (isset($_GET["error"]) and $_GET["error"] == "file_ext"){
        echo '<div class="alert alert-danger" role="alert">File type must be jpeg!</div>';
    }?>
    <form action="add_prod.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="Name">Product Name</label>
        <input type="text" required  class="form-control" id="Name" name="prod-name" aria-describedby="emailHelp" placeholder="Please Enter Name...">
      </div>
      <div class="form-group">
        <label for="Meta Data">Product Meta Name</label>
        <input type="text" required  class="form-control" id="Meta Data" name="prod-meta" aria-describedby="emailHelp" placeholder="Please Enter Meta title...">
      </div>
      <div class="form-group">
        <label for="Slug">Product Slug</label>
        <input type="text" required class="form-control" id="Slug" name="prod-slug" aria-describedby="emailHelp" placeholder="Please Enter Slug...">
      </div>
      <div class="form-group">
        <label for="Summary">Product Summary</label>
        <input type="text" required  class="form-control" id="Summary" name="prod-summary" aria-describedby="emailHelp" placeholder="Please Enter summary...">
      </div>
      <div class="form-group">
        <label for="Category">Example select</label>
        <select class="form-control" id="Category" name="prod-category">
            <option value="Tech">Tech</option>
            <option value="Gaming">Gaming</option>
            <option value="Anime">Anime</option>
        </select>
      </div>
      <div class="form-group">
        <label for="Quantity">Quantity</label>
        <input type="number" min="1" step="0.01" required  class="form-control" id="prod-quantity" name="Quantity" aria-describedby="emailHelp" placeholder="Please Enter Quantity...">
      </div>
      <div class="form-group">
        <label for="Price">Price in USD</label>
        <input type="number" min="1" step="0.01" required  class="form-control" id="prod-price" name="Price" aria-describedby="emailHelp" placeholder="Please Enter price...">
      </div>
      <div class="form-group">
        <label for="Image">Upload Image</label>
        <input type="file" required class="form-control-file" name="file" id="Image">
      </div>        
      
      
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form> 
</div>

<?php require_once "..\..\includes\\footer.php"; ?>