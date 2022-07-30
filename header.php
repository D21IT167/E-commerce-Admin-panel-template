<?php 
  session_start();
  if (!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
  }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clothing estore</title>
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->

    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/pagination.css" rel="stylesheet" type="text/css" />
    <!-- custom style -->
    <link href="css/ui.css" rel="stylesheet" type="text/css" />
    <link href="css/responsive.css" rel="stylesheet" />
  	
    <!-- iconfont -->
    <!-- <link rel="stylesheet" href="font/material-icon/css/round.css" /> -->

    <script src="assets/vendor/jquery/jquery.min.js"></script>

</head>


<body>
    <b class="screen-overlay"></b>

    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
          <a href="dashboard.php" class="brand-wrap">
            <img src="images/logo.svg" height="46" class="logo" alt="Admin">
          </a>
          <div>
            <button class="btn btn-icon btn-aside-minimize"> <img src="images/box-arrow-left.svg"> </button>
          </div>
        </div> 
        
        <nav>
          <ul class="menu-aside">
            <li class="menu-item active"> 
              <a class="menu-link" href="dashboard.php"> <img src="images/house-door-fill.svg">     
                <span class="text">Dashboard</span> 
              </a> 
            </li>
            <hr>
            <li class="menu-item has-submenu">
                <a class="menu-link" href="category.php"> <img src="images/bucket-fill.svg"> 
                  <span class="text">Category</span> 
                </a> 
                <div class="submenu">
                  <a href="category.php">View Category</a>
                  <a href="add_category.php">Add Category</a>
                </div>
              </li>
            <li class="menu-item has-submenu"> 
              <a class="menu-link" href="products.php"> <img src="images/bag-check-fill.svg">  
                <span class="text">Products</span> 
              </a> 
              <div class="submenu">
                <a href="products.php">View products</a>
                <a href="add_product.php">Add Products</a>
                
              </div>
            </li>
            <li class="menu-item has-submenu"> 
              <a class="menu-link" href="orders.php"> <img src="images/cart-check-fill.svg"> 
                <span class="text">Orders</span> 
              </a>
              <div class="submenu">
                <a href="orders.php">Manage Orders</a>
              </div> 
            </li>
            <hr>
            <li class="menu-item has-submenu"> 
              <a class="menu-link" href="roles.php"> <img src="images/person-lines-fill.svg">  
                <span class="text">Roles & Permissions</span> 
              </a> 
              <div class="submenu">
                <a href="role.php">Roles</a>
                <a href="permission.php">Permission</a>
              </div> 
            </li>
            <li class="menu-item has-submenu"> 
              <a class="menu-link" href="page-form-product-1.php"> <img src="images/file-earmark-person-fill.svg"> 
                <span class="text">Users</span> 
              </a> 
              <div class="submenu">
                <a href="users.php">Manage Users</a> 
                <a href="register.php">Add Users</a>
              </div>
            </li>
        
           <!-- <li class="menu-item has-submenu"> 
              <a class="menu-link" href="#"> <i class="icon material-icons md-person"></i>  
                <span class="text">Account</span> 
              </a> 
              <div class="submenu">
                <a href="page-account-login.php">User login</a>
                <a href="page-account-register.php">User registration</a>
                <a href="page-error-404.php">Error 404</a>
              </div>
            </li>-->
            
          </ul>
          <hr>
          <ul class="menu-aside">
            <li class="menu-item has-submenu"> 
              <a class="menu-link" href="#"> <span class="fas fa-cog" style="color: black"></span> 
                <span class="text">Settings</span> 
              </a>
              <div class="submenu">
                <a href="page-settings-1.php">Setting sample 1</a>
                <a href="page-settings-2.php">Setting sample 2</a>
              </div>
            </li>
            <!--<li class="menu-item">
              <a class="menu-link" href="page-0-blank.php"> <i class="icon material-icons md-local_offer"></i> 
                <span class="text"> Page </span>
              </a> 
            </li>-->
          </ul>
          <br>
          <br>
        </nav>
        </aside>

    <main class="main-wrap">
        <header class="main-header navbar">
            <div class="col-search">
                <!--<form class="searchform">
                    <div class="input-group">
                        <input list="search_terms" type="text" class="form-control" placeholder="Search Panel">
                        <button class="btn btn-light bg" type="button"> <img src="images/search.svg">
                        </button>
                    </div>
                    <datalist id="search_terms">
                        <option value="Tshirts">
                        <option value="Shirt">
                        <option value="Jeans">
                    </datalist>
                </form>-->
            </div>
            <div class="col-nav">
                <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i
                        class="md-28 material-icons md-menu"></i> </button>
                <ul class="nav">
                    <!--<li class="nav-item">
                        <a class="nav-link btn-icon" onclick="darkmode(this)" title="Dark mode" href="#"> <i
                                class="material-icons md-nights_stay"></i> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-icon" href="#"> <i class="material-icons md-notifications_active"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> English </a>
                    </li>-->
                    <li class="dropdown nav-item">
                        <a  data-bs-toggle="dropdown" href="#"> <img
                                class="img-xs rounded-circle" src="images/avatar1.jpg" alt="User"></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="profile.php">My profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item text-danger" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>