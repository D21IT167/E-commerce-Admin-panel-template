<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include "header.php";
require "config.php";
$errorMessage = '';
$selectQuery = "SELECT * FROM `category` WHERE parent_category_id=0";
$result = mysqli_query($con, $selectQuery);
if (mysqli_num_rows($result) > 0) {
} else {
     $msg = "No Record found";
}

if (isset($_POST['submit'])) {
     $category_name = $_POST['category_name'];
     $category_description = $_POST['category_description'];
     $created_by = $_SESSION["user"];
     $parent_category_id = $_POST['parent_category_id'];
     $sql = "INSERT INTO `category`(`category_name`, `category_description`, `parent_category_id`, `status`, `created_by`, `updated_by`) VALUES ('$category_name','$category_description','$parent_category_id','1','$created_by','$created_by')";

     if (mysqli_query($con, $sql)) {
          $errorMessage = "New category added successfully!";
     } else {
          echo "Error: " . $sql . " " . mysqli_error($con);
     }
     mysqli_close($con);
}
?>
<section class="content-main content-center" style="max-width:650px">
     <div class="content-header">
          <h2 class="content-title">Add Category</h2>
     </div>
     <div class="card mb-4">
          <div class="card-body">
               <div class="row">
                    <div class="col-md-4">
                         <div class="mb-4" style="width: 34rem;">
                              <?php if ($errorMessage != '') { ?>
                                   <div id="login-alert" class="alert alert-success col-sm-12">
                                        <?php echo $errorMessage;
                                             $headercategory = "<script>
                                             window.location = 'category.php';</script>";
                                             echo $headercategory;
                                        ?>
                                   </div>
                              <?php } ?>
                         </div>
                         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                              <div class="mb-4" style="width: 34rem;">
                                   <label for="category_name" class="form-label">Category Name</label>
                                   <input type="text" placeholder="Enter category name" class="form-control" id="category_name" name="category_name" required />
                              </div>

                              <div class="mb-4" style="width: 34rem;">
                                   <label class="form-label">Description</label>
                                   <textarea placeholder="Category Description" class="form-control" rows="4" name="category_description" required></textarea>
                              </div>

                              <div class="mb-4" style="width: 34rem;">
                                   <label class="form-label" for="parent_category_id">Parent Category</label>
                                   <select class="form-select" name="parent_category_id" id="parent_category_id">
                                        <option value="0">No parent</option>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($result)) { ?>
                                             <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                                        <?php } ?>
                                   </select>
                              </div>

                              <div class="d-grid">
                                   <input type="submit" name="submit" value="Create category" class="btn btn-primary">
                              </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>

</section>
</main>
<script src="js/jquery-3.5.0.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- ChartJS files-->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!-- Custom JS -->
<script src="js/script.js?v=1.0" type="text/javascript"></script>
<script>
     if (window.history.replaceState) {
          window.history.replaceState(null, null, window.location.href);
     }
</script>
</body>

</html>