<?php
include "config.php";
if(isset($_REQUEST['delete']))
{
  
   $del_id = mysqli_real_escape_string($con,$_REQUEST['delete']);
   $del_query = "delete from products where product_id='".$_REQUEST['delete']."'";
   if(mysqli_query($con,$del_query))
   {
      header('location:products.php');
   }
   else
   {
      echo '<p>problem in deleting data</p>';
      echo '<p><a href="products.php">go back</a></p>';
   }
}
?>