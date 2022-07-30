<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
session_start();
include "header.php";
require "config.php";
$results_per_page = 10;
$query = "SELECT * FROM `category`";
$result = mysqli_query($con, $query);

$number_of_result = mysqli_num_rows($result);
$number_of_page = ceil($number_of_result / $results_per_page);


if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}
$page_first_result = ($page - 1) * $results_per_page;
$query = $query . " LIMIT " . $page_first_result . ',' . $results_per_page;
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
} else {
    $msg = "No Record found";
}
?>

<section class="content-main">

    <div class="content-header">
        <h2 class="content-title">Categories </h2>
        <div>
            <a href="add_category.php" class="btn btn-primary">Add new category</a>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col-md-12 col-12 me-auto mb-md-0 mb-3">

                    <table class="table">
                        <?php if ($msg != '') { ?>
                            <div id="login-alert" class="alert alert-success col-sm-12"><?php echo $msg; ?></div>
                        <?php } ?>
                </div>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Parent ID</th>
                        <th>Status</th>
                        <th>Created_by</th>
                        <th>Creation_datetime</th>
                        <th>Updated_by</th>
                        <th>Updation_datetime</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td class="category_id"><?php echo $row['category_id']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['category_description']; ?></td>
                            <td><?php if ($row['parent_category_id'] == '0') {
                                    echo "No parent";
                                } else {
                                    $parentQuery = "SELECT * FROM `category` WHERE parent_category_id=0";
                                    $parentresult = mysqli_query($con, $parentQuery);
                                    while ($parentrow = mysqli_fetch_assoc($parentresult)) {
                                        if ($parentrow['category_id'] == $row['parent_category_id']) {
                                            echo $parentrow['category_name'];
                                        }
                                    }
                                } ?></td>
                            <td><?php if ($row['status'] == 1) {
                                    echo "Active";
                                } else {
                                    echo "Deactive";
                                } ?></td>

                            <td>
                                <?php
                                $created_id = $row['created_by'];
                                $created_query = "SELECT display_name FROM `admin` WHERE admin_id='$created_id'";
                                $created_run = mysqli_query($con, $created_query) or die(mysqli_error($con));
                                while ($created_name = mysqli_fetch_assoc($created_run)) {
                                    echo $created_name['display_name'];
                                }
                                ?>
                            </td>
                            <td><?php echo $row['creation_datetime']; ?></td>
                            <td>
                                <?php

                                $updated_id = $row['updated_by'];
                                $updated_query = "SELECT display_name FROM `admin` WHERE admin_id='$updated_id'";
                                $updated_run = mysqli_query($con, $updated_query) or die(mysqli_error($con));
                                while ($updated_name = mysqli_fetch_assoc($updated_run)) {
                                    echo $updated_name['display_name'];
                                }
                                ?>
                            </td>
                            <td><?php echo $row['updation_datetime']; ?></td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light"> <img src="images/three-dots.svg"> </a>
                                    <div class="dropdown-menu">
                                        <button type="button" class="btn btn-border-none edit_btn" onclick="return EditMdl(<?php echo $row['category_id']; ?>)">Edit</button><br>
                                        <a href="delete_category.php?delete=<?php echo $row['category_id']; ?>" onclick="return delFunction()" class="btn btn-border-none">Delete</a>
                                    </div>
                                </div>
                            </td>
                        <tr>
                        <?php } ?>
                </tbody>
                </table>
            </div>
        </header>
    </div>

    <!-- pagination-->
    <div class="pagination">
        <?php
        if ($page >= 2) {
            echo "<a  href='category.php?page=" . ($page - 1) . "'>  Prev </a>";
        }
        for ($page = 1; $page <= $number_of_page; $page++) {
            echo '<a  href = "category.php?page=' . $page . '">' . $page . ' </a>';
        }

        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                $pagLink .= "<a href='category.php?page=" . $i . "'>" . $i . " </a>";
            } else {
                $pagLink .= "<a href='category.php?page=" . $i . "'> " . $i . " </a>";
            }
        };
        echo $pagLink;

        if ($page < $total_pages) {
            echo "<a href='category.php?page=" . ($page + 1) . "'>  Next </a>";
        }
        ?>
    </div>
    <!-- end pagination-->

    <!--edit modal-->
    <div class="modal fade" id="EditCategory" tabindex="-1" aria-labelledby="EditCatgoryLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-header">
                <h5 class="modal-title" id="EditCategoryLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-content" id="updateDataMdl_Response">
            </div>

        </div>
    </div>
    <!-- end edit modal -->

    <script>
        function EditMdl(category_id) {
            if (category_id != "" && category_id > 0) {
                $.ajax({
                    type: "POST",
                    url: "edit_category.php",
                    data: {
                        'cat_id': category_id,
                    },
                    success: function(data) {
                        data = JSON.parse(data);

                        if (data.status == '1') {
                            $('#updateDataMdl_Response').html(data.html);
                            $('#EditCategory').modal('show');
                        } else {
                            alert(response.message);
                        }
                    }
                });
            }
        }

        function delFunction() {
            var r = confirm("Delete Category?");
            if (r == false) {
                return false;
            }
        }
    </script>

    <?php
    include "footer.php";
    ?>