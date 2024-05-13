<?php
// session_start(); comment hai bcoz session_start kiya hai topbar.php mai
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
              <li class="breadcrumb-item active">Edit Registered Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Registered Users</h3>
                        <a href="registered.php" class="btn btn-danger btn-sm float-right">Back</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                              <form action="admin_code.php" method="post">
                                <div class="modal-body">
                                  <?php
                                  if(isset($_GET['user_id']))
                                  {
                                    $user_id=$_GET['user_id'];
                                    $query = "SELECT * FROM customer WHERE id='$user_id' LIMIT 1";
                                    $query_run = mysqli_query($con,$query);
                                    
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                      foreach($query_run as $row)
                                      {
                                        ?>
                                          <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">
                                          <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="Name">
                                          </div>
                                          <div class="form-group">
                                            <label for="">Email Id</label>
                                            <input type="text" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="Email Id">
                                          </div>
                                          <div class="form-group">
                                            <label for="">Phone No</label>
                                            <input type="text" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Phone No">
                                          </div>
                                          <div class="form-group">
                                            <label for="">Address</label>
                                            <input type="text" name="add" value="<?php echo $row['address'] ?>" class="form-control" placeholder="Address">
                                          </div>
                                          <input type="hidden" name="psw" value="<?php echo $row['password'] ?>" class="form-control" placeholder="Password">
                                          <div class="form-group">
                                            <!-- <label for="">Confirm Password</label> -->
                                            <input type="hidden" name="repeatpsw" value="<?php echo $row['password'] ?>" class="form-control" placeholder="confirm-password">
                                          </div>
                                        <?php
                                      }
                                    }
                                    else
                                    {
                                      echo "<script type='text/javascript'>alert('User not found!'); window.location ='registered.php';</script>";
                                      echo "<h4>User not found!</h4>";
                                    }
                                  }
                                  
                                  ?>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" name="updateUser" class="btn btn-info">Update</button>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>
