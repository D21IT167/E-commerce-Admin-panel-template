<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
include "header.php";
require "config.php";
$results_per_page = 10;
$query = "SELECT * FROM `products`";
$result = mysqli_query($con, $query);

$imagequery = "SELECT * FROM `product_image`";
$imageresult = mysqli_query($con, $imagequery);

$number_of_result = mysqli_num_rows($result);
$number_of_page = ceil($number_of_result / $results_per_page);

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$page_first_result = ($page - 1) * $results_per_page;
$query = "SELECT * FROM products LIMIT " . $page_first_result . ',' . $results_per_page;
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
} else {
    $msg = "No Record found";
}
?>

<!--filter panel 
<div class="card mb-4">
    <header class="card-header">
        <div class="row align-items-center">
            <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                <select class="form-select">
                    <option>products</option>
                    <option>Women</option>
                    <option>Men</option>
                    <option>Kids</option>
                </select>
            </div>

            <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                <select class="form-select">
                    <option>Sub products</option>
                    <option>T-shirt</option>
                    <option>Shirt</option>
                    <option>Jeans</option>
                    <option>shorts</option>
                </select>
            </div>

            <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                <select class="form-select">
                    <option>Size</option>
                    <option>XS</option>
                    <option>S</option>
                    <option>M</option>
                    <option>XL</option>
                    <option>XXL</option>
                    <option>XXXL</option>
                </select>
            </div>

            <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                <select class="form-select">
                    <option>Color</option>
                    <option>Red</option>
                    <option>Blue</option>
                    <option>Pink</option>
                    <option>Yellow</option>
                    <option>Black</option>
                    <option>White</option>
                </select>
            </div>
        </div>
    </header>
</div>


end filter panel-->

<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Products </h2>
        <div>
            <a href="add_product.php" class="btn btn-primary">Add new product</a>
        </div>
    </div>

    <div class="card mb-4">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col-md-12 col-12 me-auto mb-md-0 mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Price <i class="fa fa-rupee-sign" aria-hidden="true"></i></th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td class="product_id"><?php echo $row['product_id']; ?></td>
                                    <td>
                                        <?php
                                        while ($imagerow = mysqli_fetch_assoc($imageresult)) {
                                            if ($imagerow['product_id'] == $row['product_id']) {
                                                $image = $imagerow['image']; ?>
                                                <img class="img-sm img-thumbnail" src="./images/<?php echo $image; ?>">
                                        <?php
                                                break;
                                            }
                                        } ?>
                                    </td>
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td><i class="fa fa-rupee-sign" aria-hidden="true"></i><?php echo $row['price']; ?> <br> <i class="fa fa-tag" aria-hidden="true"></i><?php echo $row['discount']; ?></td>
                                    <td><?php if ($row['status'] == 1) {
                                            echo "Active";
                                        } else {
                                            echo "Deactive";
                                        } ?></td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light"> <img src="images/three-dots.svg"> </a>
                                            <div class="dropdown-menu">
                                                <button type="button" class="btn btn-border-none productview_btn" onclick="return ProductViewMdl(<?php echo $row['product_id']; ?>)">View</button><br>
                                                <a href="edit_product.php?edit=<?php echo $row['product_id']; ?>" class="btn btn-border-none edit">Edit</a><br>
                                                <a href="delete_product.php?delete=<?php echo $row['product_id']; ?>" onclick="return productdelFunction()" class="btn btn-border-none">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                <tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- pagination-->
                <div class="pagination">
                    <?php
                    if ($page >= 2) {
                        echo "<a href='products.php?page=" . ($page - 1) . "'>  Prev </a>";
                    }
                    for ($page = 1; $page <= $number_of_page; $page++) {
                        echo '<a href = "products.php?page=' . $page . '">' . $page . ' </a>';
                    }

                    for ($i = 1; $i <= $total_pages; $i++) {
                        if ($i == $page) {
                            $pagLink .= "<a href='products.php?page=" . $i . "'>" . $i . " </a>";
                        } else {
                            $pagLink .= "<a href='products.php?page=" . $i . "'> " . $i . " </a>";
                        }
                    };
                    echo $pagLink;

                    if ($page < $total_pages) {
                        echo "<a href='products.php?page=" . ($page + 1) . "'>  Next </a>";
                    }
                    ?>
                </div>
                <!-- end pagination-->
            </div>
        </header>
    </div>
</section>


<!--view modal-->
<div class="modal fade" id="ViewProduct" tabindex="-1" aria-labelledby="ViewProductLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="productviewDataMdl_Response">
        </div>
    </div>
</div>
<!-- end view modal -->


<script>

    function ProductViewMdl(product_id) {
        if (product_id != "" && product_id > 0) {
            $.ajax({
                type: "POST",
                url: "view_product.php",
                data: {
                    'pr_id': product_id,
                },
                success: function(data) {
                    data = JSON.parse(data);

                    if (data.status == '1') {
                        $('#productviewDataMdl_Response').html(data.html);
                        $('#ViewProduct').modal('show');
                    } else {
                        alert(response.message);
                    }
                }
            });
        }
    }

    function productdelFunction() {
        var r = confirm("Delete Product?");
        if (r == false) {
            return false;
        }
    }
</script>

<?php
include "footer.php";
?>