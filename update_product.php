<?php 
  session_start();
  if (!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
  }
require "config.php";
$msg = 'Product updated successfully!';

if(isset($_POST['submit']))
{	
  $pi_id=$_POST['editproduct_id'];
  $update_product_name = $_POST['editproduct_name'];
  $update_product_description = $_POST['editproduct_description'];
  $update_product_price=$_POST['editproduct_price'];
  $update_product_discount=$_POST['editproduct_discount'];
  $update_product_quantity=$_POST['editproduct_quantity'];
  $update_status=$_POST['editstatus'];
  $updated_by= $_SESSION["user"];
  $update_product_image= $_POST['editproduct_image'];

  $psql = "UPDATE `products` SET `product_name` = '$update_product_name', `description` = '$update_product_description', `price`='$update_product_price',`discount`='$update_product_discount',`quantity`='$update_product_quantity', `status` = '$update_status', `updated_by` = '$updated_by' WHERE `product_id` = '$pi_id'" ;

  if($psql_run= mysqli_query($con,$psql)){
    $pimage="UPDATE `product_image` SET `image`='$update_product_image' WHERE `product_id` = '$pi_id'";
    if($pimage_run= mysqli_query($con,$pimage)){
        header("Location: products.php");
    }
    else{
        echo "Error: " . $pimage . " " . mysqli_error($con);
    }
  }
  else{
    echo "Error: " . $psql . " " . mysqli_error($con);
  }
	
  if($psql_run){
    header("Location: products.php");
  }else{
    
  }
  mysqli_close($con);
}
