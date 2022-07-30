<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add User</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/auth.css" rel="stylesheet">
    <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">

  <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
  

  <!-- custom style -->
  <link href="css/ui.css" rel="stylesheet" type="text/css"/>
  <link href="css/responsive.css" rel="stylesheet" />

  <!-- iconfont -->
  <link rel="stylesheet" href="font/material-icon/css/round.css"/>
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
              <a href="view_category.php">View Category</a>
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
            <a href="manage_orders.php">Manage Orders</a>
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
          <a class="menu-link" href="users.php"> <img src="images/file-earmark-person-fill.svg"> 
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
          <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i> 
            <span class="text">Settings</span> 
          </a>
          <div class="submenu">
            <a href="setting.php">Setting sample 1</a>
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

    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
                <div class="card-body text-center">
                    <h6 class="mb-4 text-muted">Add new user</h6>
                    <form action="" method="">
                        <div class="mb-3 text-start">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="name" class="form-label">UserName</label>
                            <input type="text" class="form-control" placeholder="Enter UserName" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="email" class="form-label">Email adress</label>
                            <input type="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="mb-3 text-start">
                            <label for="name" class="form-label">Contact number</label>
                            <input type="number" class="form-control" placeholder="Enter your Phone number" required>
                        </div>
                        <div class="mb-3 text-start">
                            
                            <div class="col-md-5 col-12 me-auto mb-md-0 mb-3 align-items-center">
                                <label for="roleid" class="form-label">Role ID  </label>
                                <select class="form-select">
                                    <option>Select role id</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>

                        <!-- 
                        <div class="mb-3">
                            <input type="password" class="form-control" placeholder="Confirm password" required>
                        </div> 
                        -->
                        
                        <button class="btn btn-primary shadow-2 mb-4 mt-2">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>