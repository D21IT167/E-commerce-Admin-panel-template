<?php
include "config.php";
if(isset($_REQUEST['delete']))
{
  
   $del_id = mysqli_real_escape_string($con,$_REQUEST['delete']);
   $del_query = "delete from category where category_id='".$_REQUEST['delete']."'";
   if(mysqli_query($con,$del_query))
   {
      header('location:category.php');
   }
   else
   {
      echo '<p>problem in deleting data</p>';
      echo '<p><a href="category.php">go back</a></p>';
   }
}
?>