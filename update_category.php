<?php 
  session_start();
  if (!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
  }
require "config.php";
$msg = 'category updated successfully!';

if(isset($_POST['submit']))
{	
  $ci_id=$_POST['editcategory_id'];
  $update_category_name = $_POST['editcategory_name'];
  $update_category_description = $_POST['editcategory_description'];
  $update_status=$_POST['editstatus'];
  $parent_category= $_POST['editparent_category_id'];
  $updated_by= $_SESSION["user"];

  $sql = "UPDATE `category` SET `category_name` = '$update_category_name', `category_description` = '$update_category_description', `parent_category_id`='$parent_category', `status` = '$update_status', `updated_by` = '$updated_by' WHERE `category_id` = '$ci_id'" ;

  $sql_run= mysqli_query($con,$sql) or die(mysqli_error($con));
	
  if($sql_run){
    header("Location: category.php");
  }else{
    
  }
  mysqli_close($con);
}
?>