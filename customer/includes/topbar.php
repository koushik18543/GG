<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) 
{
    session_start(); // Start the session only if it hasn't been started yet
}
include('config/dbcon.php');
ob_end_clean();
// Redirect if session email is not set
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Logout logic
if (isset($_POST['Logout'])) 
{	
    //session_destroy();
    header("Location: login.php");
    exit();
}
?>
<head>
  <script src="https://kit.fontawesome.com/c186916733.js" crossorigin="anonymous"></script>
</head>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form class="form-inline" method="post">
          <div class="input-group input-group-sm">
            <div class="input-group-append">
              <button class="btn btn-navbar mt-1" name="Logout">
                <i class="fa-sharp fa-solid fa-right-from-bracket fa-fade"></i> Logout
              </button>
            </div>
          </div>
	</form> 
      </li>
      <li class="nav-item">
        <?php
        $query = "SELECT COUNT(*) AS cart_count FROM cart WHERE cust_id='{$_SESSION['customer_id']}'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
          $result = mysqli_fetch_assoc($query_run);
          $cartCount = $result['cart_count'];
        }
        ?>
        <?php
        $stmt = "SELECT id FROM customer WHERE email='{$_SESSION['email']}'";
        $res = mysqli_query($con,$stmt);
      if(mysqli_num_rows($res) > 0)
      {
        foreach($res as $row)
        { 
        ?>
        <a class="nav-link" href="cart.php?cust_id=<?php echo $row['id'];?>"><i class="fa-solid fa-cart-shopping fa-shake"></i><span id="cart-item" class="badge badge-danger ml-1"><?php echo $cartCount ?></span></a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
          <?php
        }
      } 
          ?>
	  </a>
        </div>
      </li>

    </ul>
</nav>

