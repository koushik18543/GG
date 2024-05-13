<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php 
              $query = "SELECT COUNT(*) AS ord_count FROM orders";
              $query_run = mysqli_query($con, $query);
              if($query_run)
              {
                $result = mysqli_fetch_assoc($query_run);
                $ordCount = $result['ord_count'];
              }
              ?>
                <h3><?php echo $ordCount ?></h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard-check"></i>
              </div>
              <a href="view_orders.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php 
              $query = "SELECT COUNT(*) AS product_count FROM product";
              $query_run = mysqli_query($con, $query);
              if($query_run)
              {
                $result = mysqli_fetch_assoc($query_run);
                $productCount = $result['product_count'];
              }
              ?>
                <h3><?php echo $productCount ?></h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="view_product.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php 
              $query = "SELECT COUNT(*) AS user_count FROM customer";
              $query_run = mysqli_query($con, $query);
              if($query_run)
              {
                $result = mysqli_fetch_assoc($query_run);
                $userCount = $result['user_count'];
              }
              ?>
                <h3><?php echo $userCount ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="registered.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</div>
<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>