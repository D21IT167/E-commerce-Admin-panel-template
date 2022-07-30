<?php

include("config.php");

$response = array();

$pro_id = $_POST['pr_id'];

$result_array = [];
$query = "SELECT * FROM `products` WHERE product_id='$pro_id'";
$query_run = mysqli_query($con, $query) or die(mysqli_error($con));

$image_query= "SELECT * FROM product_image WHERE product_id='$pro_id'";
$image_run= mysqli_query($con, $image_query) or die(mysqli_error($con));

if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
        array_push($result_array, $row);
    }

    $final_data = $result_array[0];

    $status= $final_data['status'] == '1' ? 'Active' : 'Deactive' ;

    $created_id= $final_data['created_by'];
    $created_query= "SELECT display_name FROM `admin` WHERE admin_id='$created_id'";
    $created_run= mysqli_query($con, $created_query) or die(mysqli_error($con));

    $updated_id= $final_data['updated_by'];
    $updated_query= "SELECT display_name FROM `admin` WHERE admin_id='$updated_id'";
    $updated_run= mysqli_query($con, $updated_query) or die(mysqli_error($con));

    $html = '
        
      <div class="modal-body">
        <div class="mb-3">
            <h5 class="modal-title" id="ViewProductLabel">Product details</h5>
        </div><hr>
        
        <div class="mb-3">';
        while ($imagerow = mysqli_fetch_assoc($image_run)) {
        $html.='<img class="img img-sm img-thumbnail" src="images/'.$imagerow['image'].'"/>';
        }
        $html.='</div>

        <div class="mb-3">
        
            <label>Product Id: '.$final_data['product_id'].'</label>
        </div>

        <div class="mb-3">
            <label>Product Name: '.$final_data['product_name'].'</label>
        </div>

        <div class="mb-3">
            <label>Description: '.$final_data['description'].'</label>
        </div>

        <div class="mb-3">
            <label>Price: Rs.'.$final_data['price'].'</label>
        </div>

        <div class="mb-3">
            <label>Discount: Rs.'.$final_data['discount'].'</label>
        </div>

        <div class="mb-3">
            <label>Quantity: '.$final_data['quantity'].'</label>
        </div>

        <div class="mb-3">
            <label>Status: '.$status.'</label>
        </div>

        <div class="mb-3">';
        while ($created_name = mysqli_fetch_assoc($created_run)) {
    $html.='
            <label>Created By: '.$created_name['display_name'].'</label>';
            }
    $html.='
        </div>

        <div class="mb-3">
            <label>Creation Datetime: '.$final_data['creation_datetime'].'</label>
        </div>

        <div class="mb-3">';
            while ($updated_name = mysqli_fetch_assoc($updated_run)) {
    $html.='
            <label>Updated By: '.$updated_name['display_name'].'</label>';
        }
    $html.='
        </div>

        <div class="mb-3">
            <label>Updation Datetime: '.$final_data['updation_datetime'].'</label>
        </div>
      </div><hr>
    ';

    $response['status'] = "1";
    $response['message'] = "Success";
    $response['html'] = $html;
} else {
    $response['status'] = "0";
    $response['message'] = "No data found";
}

echo json_encode($response);