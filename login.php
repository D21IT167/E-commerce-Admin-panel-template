<?php
session_start();
include_once("config.php");
$errorMessage = '';
if(!empty($_POST["login"]) && $_POST["loginId"]!=''&& $_POST["loginPass"]!='') {	
	$loginId = $_POST['loginId'];
	$password = $_POST['loginPass'];
	$sqlQuery = "SELECT admin_id FROM admin WHERE username='".$loginId."' AND password='".$password."'";
	$resultSet = mysqli_query($con, $sqlQuery) or die("database error:". mysqli_error($con));
	$isValidLogin = mysqli_num_rows($resultSet);	
	if($isValidLogin){
		if(!empty($_POST["remember"])) {
			setcookie ("loginId", $loginId, time()+ (10 * 365 * 24 * 60 * 60));  
			setcookie ("loginPass",	$password,	time()+ (10 * 365 * 24 * 60 * 60));
		} else {
			setcookie ("loginId",""); 
			setcookie ("loginPass","");
		}
		$userDetails = mysqli_fetch_assoc($resultSet);
		$_SESSION["user"] = $userDetails['admin_id'];
		header("location:dashboard.php"); 		
	} else {		
		$errorMessage = "Invalid login!";		 
	}
} else if(!empty($_POST["loginId"])){
	$errorMessage = "Enter Both user and password!";	
}	
?>

<!DOCTYPE HTML>
<html lang="en">

<head>

   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Login admin panel</title>
   <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
   <link href="css/bootstrap.css?v=1.1" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" href="fonts/material-icon/css/round.css" />
   <!-- custom style -->
   <link href="css/ui.css?v=1.1" rel="stylesheet" type="text/css" />
   <link href="css/responsive.css?v=1.1" rel="stylesheet" />

</head>

<body>

   <b class="screen-overlay"></b>

   <main>
      <header class="main-header navbar">
         <div class="col-brand">
            <a href="login.php" class="brand-wrap">
               <img src="images/logo.svg" height="46" class="logo" alt="Ecommerce dashboard template">
            </a>
         </div>
      </header>

      <section class="content-main">

         <div class="card shadow mx-auto" style="max-width: 380px; margin-top:100px;">
            <div class="card-body">
               
               <h4 class="card-title mb-4">Sign in</h4>

               

                  <?php if ($errorMessage != '') { ?>
                     <div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $errorMessage; ?></div>                            
                  <?php } ?>

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                  <div class="mb-3 field-group">
                  <div><label for="login"></label></div>
                  <input type="text" class="form-control" id="loginId" name="loginId"  value="<?php if(isset($_COOKIE["loginId"])) { echo $_COOKIE["loginId"]; } ?>" placeholder="Username" required>

                  <div class="mb-3 field-group">
                  <div><label for="password"></label></div>
                  <input type="password" class="form-control" id="loginPass" name="loginPass" value="<?php if(isset($_COOKIE["loginPass"])) { echo $_COOKIE["loginPass"]; } ?>" placeholder="Password" required>
                  </div>

                  <div class="mb-3 field-group">
                     <label>
					         <input  type="checkbox" id="remember" name="remember" <?php if(isset($_COOKIE["loginId"])) { ?> checked <?php } ?>> Remember me
					      </label>
                  </div> 

                  <div class="mb-4 field-group">
                  <div> <input type="submit" name="login" value="Login" class="btn btn-primary"></div>

                  </div>
               </form>
            </div>
         </div>
      </section> 
      <?php
      include "footer.php";
      ?>