<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include "header.php";
require "config.php";
$Message = '';
$selectQuery = "SELECT * FROM `category` WHERE parent_category_id=0";
$result = mysqli_query($con, $selectQuery) or die(mysqli_error($con));

$catquery = "SELECT * FROM category WHERE parent_category_id != 0";
$catresult = mysqli_query($con, $catquery) or die(mysqli_error($con));


if (isset($_POST['add'])) {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['description'];
    $product_price = $_POST['price'];
    $product_discount = $_POST['discount'];
    $product_quantity = $_POST['quantity'];
    $category = $_POST['mycategory'];
    $subcategory = $_POST['subcategory'];
    $created_by = $_SESSION["user"];
    $image = $_POST['image'];
    $sql = "INSERT INTO `products`(`product_name`, `description`, `quantity`, `price`,`discount`, `status`, `created_by`, `updated_by`) VALUES ('$product_name','$product_description','$product_quantity','$product_price','$product_discount','1','$created_by','$created_by')";

    if (mysqli_query($con, $sql)) {
        $id = "SELECT product_id FROM `products` WHERE product_name='$product_name'";
        $id_result = mysqli_query($con, $id) or die(mysqli_error($con));
        while ($id_row = mysqli_fetch_assoc($id_result)) {
            $id_product = $id_row['product_id'];
        }

        $imgquery = "INSERT INTO `product_image`(`product_id`, `image`,`status`, `created_by`, `updated_by`) VALUES ('$id_product','$image','1','$created_by','$created_by')";
        if (mysqli_query($con, $imgquery)) {
            $category_insert= "INSERT INTO `category_product`(`product_id`, `category_id`,  `status`, `created_by`, `updated_by`) VALUES ('$id_product','$category','1','$created_by','$created_by')";
            if(mysqli_query($con, $category_insert)){
                $Message = "New Product added successfully!";
            }
            else{
                "Error: " . $category_insert . " " . mysqli_error($con);
            }
        } else {
            echo "Error: " . $imgquery . " " . mysqli_error($con);
        }
    } else {
        echo "Error: " . $sql . " " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>


<section class="content-main" style="max-width:920px">

    <div class="content-header">
        <h2 class="content-title">Add product</h2>
    </div>
    <form action="" method="POST">
        <div class="card mb-4">
            <div class="card-body">
                <?php if ($Message != '') { ?>
                    <div id="login-alert" class="alert alert-success col-sm-12">
                        <?php echo $Message;
                            $headerproduct = "<script>
                            window.location = 'products.php';</script>";
                            echo $headerproduct;
                        ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-4">
                        <h6>1. General info</h6>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-4">
                            <label class="form-label">Product title</label>
                            <input type="text" placeholder="Type here" class="form-control" name="product_name" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea placeholder="Type here" class="form-control" rows="4" name="description" required></textarea>
                        </div>
                    </div> <!-- col.// -->
                </div> <!-- row.// -->

                <hr class="mb-4 mt-0">

                <div class="row">
                    <div class="col-md-4">
                        <h6>2. Pricing</h6>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-4" style="max-width:250px;">
                            <label class="form-label">Cost</label>
                            <input type="number" placeholder="00.0" class="form-control" name="price" required>
                        </div>
                        <div class="mb-4" style="max-width:250px;">
                            <label class="form-label">Discount</label>
                            <input type="number" placeholder="00.0" class="form-control" name="discount" required>
                        </div>
                    </div> <!-- col.// -->
                </div> <!-- row.// -->

                <hr class="mb-4 mt-0">

                <div class="row">
                    <div class="col-md-4">
                        <h6>3. Category</h6>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-4">

                            <?php
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                    <input class="form-check-input" name="mycategory" type="radio" value="<?php echo $row['category_id']; ?>" required>
                                    <span class="form-check-label"> <?php echo $row['category_name']; ?> </span>
                                </label>
                            <?php } ?>

                        </div>
                    </div> <!-- col.// -->
                </div> <!-- row.// -->

                <hr class="mb-4 mt-0">

                <div class="row">
                    <div class="col-md-4">
                        <h6>4. Sub-Category</h6>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-4">
                            <?php
                            while ($cat_row = mysqli_fetch_assoc($catresult)) { ?>
                                <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                    <input class="form-check-input" name="subcategory" type="radio" value="<?php echo $cat_row['category_id']; ?>" required>
                                    <span class="form-check-label"> <?php echo $cat_row['category_name']; ?> </span>
                                </label>
                            <?php } ?>
                        </div>
                    </div> <!-- col.// -->
                </div>

                <hr class="mb-4 mt-0">

                <div class="row">
                    <div class="col-md-4">
                        <h6>5. Quantity</h6>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-4" style="max-width:250px;">
                            <label class="form-label">Quantity</label>
                            <input type="number" placeholder="0" class="form-control" name="quantity" required>
                        </div>
                    </div> <!-- col.// -->
                </div> <!-- row.// -->

                <hr class="mb-4 mt-0">

                <div class="row">
                    <div class="col-md-4">
                        <h6>6. Size</h6>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-4">
                            <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                <input class="form-check-input" checked="" name="size" type="checkbox">
                                <span class="form-check-label">XS </span>
                            </label>
                            <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                <input class="form-check-input" name="size" type="checkbox">
                                <span class="form-check-label"> S </span>
                            </label>
                            <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                <input class="form-check-input" name="size" type="checkbox">
                                <span class="form-check-label"> M </span>
                            </label>
                            <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                <input class="form-check-input" name="size" type="checkbox">
                                <span class="form-check-label"> XL </span>
                            </label>
                            <label class="mb-2 form-check form-check-inline" style="width: 45%;">
                                <input class="form-check-input" name="size" type="checkbox">
                                <span class="form-check-label">XXL</span>
                            </label>
                        </div>
                    </div> <!-- col.// -->
                </div> <!-- row.// -->

                <hr class="mb-4 mt-0">

                <div class="row">
                    <div class="col-md-4">
                        <h6>7. Media</h6>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-4">
                            <label class="form-label">Images</label>
                            <input class="form-control" type="file" name="image" multiple required>
                        </div>
                    </div> <!-- col.// -->
                </div> <!-- .row end// -->
                <hr class="mb-4 mt-0">

                <div class="d-flex justify-content-end gap-2">
                    <input type="submit" name="add" value="Add product" class="btn btn-primary">
                </div>
            </div>
        </div> <!-- card end// -->
    </form>
</section>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<?php
include "footer.php";
?>