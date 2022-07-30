<?php

include("config.php");

$response = array();

$c_id = $_POST['cat_id'];

$result_array = [];
$query = "SELECT * FROM category WHERE category_id='$c_id'";
$query_run = mysqli_query($con, $query) or die(mysqli_error($con));

if (mysqli_num_rows($query_run) > 0) {
  foreach ($query_run as $row) {
    array_push($result_array, $row);
  }

  $final_data = $result_array[0];
  $pc_id = $final_data['parent_category_id'];
  $parent_category = 'No parent';
  $is_active = $final_data['status'] == '1' ? 'selected' : '';
  $is_deactive = $final_data['status'] == '0' ? 'selected' : '';

  if ($pc_id == '0') {
    $parent_category == 'No parent';
  } else {
    $category_query = "SELECT * FROM category WHERE category_id='$pc_id'";
    $category_run = mysqli_query($con, $category_query) or die(mysqli_error($con));

    while ($row = mysqli_fetch_assoc($category_run)) {
      $parent_category = $row['category_name'];
    }
  }

  $selectQuery = "SELECT * FROM category WHERE parent_category_id = 0";
  $result = mysqli_query($con, $selectQuery) or die(mysqli_error($con));

  $html = '
    
      <div class="modal-body">

          <form action="update_category.php" method="POST">
              <input type="hidden"  class="form-control" id="editcategory_id" name="editcategory_id" value= "' . $final_data['category_id'] . '" />

              <div class="mb-4" style="width: 28rem;">
                  <label for="category_name" class="form-label">Category Name</label>
                  <input type="text"  class="form-control" id="editcategory_name" name="editcategory_name" value= "' . $final_data['category_name'] . '" />
              </div>

              <div class="mb-4" style="width: 28rem;">
                  <label class="form-label">Description</label>
                  <textarea placeholder="Category Description" class="form-control" rows="4" name="editcategory_description">' . $final_data['category_description'] . '</textarea>
                  
              </div>
              
              <div class="mb-4" style="width: 28rem;">
                  <label for="staus" class="form-label"> Status</label>
                  <select  class="form-control" id="editstatus" name="editstatus">
                  <option value="0" ' . $is_deactive . '>Deactive</option>
                  <option value="1" ' . $is_active . '>Active</option>
                  </select>
              </div>
              <div class="mb-4" style="width: 28rem;">
                  <label class="form-label" for="parent_category_id">Parent Category</label>
                  <select class="form-select" name="editparent_category_id" id="editparent_category_id ">
                  <option value="' . $final_data['parent_category_id'] . '" selected>' . $parent_category . '</option>';


              while ($row = mysqli_fetch_assoc($result)) {
        $html .= '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
              }
        $html .= '<option value="0">No parent</option>
            </select>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-border-none" name="submit">update</button>
            </div>
          </form>
      </div>
    ';

  $response['status'] = "1";
  $response['message'] = "Success";
  $response['html'] = $html;
} else {
  $response['status'] = "0";
  $response['message'] = "No data found";
}

echo json_encode($response);




