<?php
include("header.php"); 
require("config.php");

if (isset($_REQUEST['edit'])) {
    $p_id = $_REQUEST['edit'];

    $product_query = "SELECT * FROM products WHERE product_id='$p_id'";
    $product_run = mysqli_query($con, $product_query) or die(mysqli_error($con));

    $image_query = "SELECT * FROM product_image WHERE product_id='$p_id'";
    $image_run = mysqli_query($con, $image_query) or die(mysqli_error($con));
}
?>
<section class="content-main" style="max-width:650px">
    <div class="content-header">
        <h2 class="content-title">Edit product</h2>
    </div>
    <form action="update_product.php" method="POST">
        <?php
        while ($product = mysqli_fetch_assoc($product_run)) {
        ?>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <input type="hidden" class="form-control" id="editproduct_id" name="editproduct_id"
                        value="<?php echo $product['product_id'] ?>" />

                    <div class="mb-4" style="width: 34rem;">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="editproduct_name" name="editproduct_name"
                            value="<?php echo $product['product_name'] ?>" />
                    </div>

                    <div class="mb-4" style="width: 34rem;">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" rows="4" name="editproduct_description"
                            id="editproduct_description"><?php echo $product['description'] ?></textarea>
                    </div>

                    <div class="mb-4" style="width: 34rem;">
                        <label class="form-label">Price</label>
                        <input type="number" class="form-control" id="editproduct_price" name="editproduct_price"
                            value="<?php echo $product['price'] ?>" />
                    </div>

                    <div class="mb-4" style="width: 34rem;">
                        <label class="form-label">Discount</label>
                        <input type="number" class="form-control" id="editproduct_discount" name="editproduct_discount"
                            value="<?php echo $product['discount'] ?>" />
                    </div>

                    <div class="mb-4" style="width: 34rem;">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="editproduct_quantity" name="editproduct_quantity"
                            value="<?php echo $product['quantity'] ?>" />
                    </div>

                    <div class="mb-4" style="width: 34rem;">
                        <label for="status" class="form-label"> Status</label>
                        <select class="form-control" id="editstatus" name="editstatus">
                            <?php if ($product['status'] == '1') { ?>
                            <option value="1" selected>Active</option>
                            <option value="0">Deactive</option>
                            <?php } else { ?>
                            <option value="0" selected>Deactive</option>
                            <option value="1">Active</option>
                            <?php } ?> 
                        </select>
                    </div>

                    <div class="mb-4" style="width: 34rem;">
                        <?php while ($image = mysqli_fetch_assoc($image_run)) { ?>
                        <label class="form-label">Images</label>
                        <input class="form-control" type="file" name="editproduct_image" id="editproduct_image" value="<?php echo   $image['image']; ?>" multiple required>
                        <?php } ?>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </form>
</section>
<?php
    include "footer.php";
?>