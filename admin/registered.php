<?php
// session_start(); comment hai bcoz session_start kiya hai topbar.php mai
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<head>
    <script src="https://kit.fontawesome.com/c186916733.js" crossorigin="anonymous"></script>
</head>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Modal -->
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="regForm" action="admin_code.php" method="post" onsubmit="return validateForm()">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="">Email Id</label>
                    <input type="text" id="email" name="email" class="form-control" placeholder="Email Id">
                </div>
                <div class="form-group">
                    <label for="">Phone No</label>
                    <input type="text" id="number" name="phone" class="form-control" placeholder="Phone No">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" id="psw" name="psw" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" id="confirmpsw" name="repeatpsw" class="form-control" placeholder="confirm-password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addUser" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Delete User -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="admin_code.php" method="post">
        <div class="modal-body">
            <input type="hidden" name="delete_id" class="delete_user_id">
            <p>
                Are sure you want to delete this user data ?
            </p>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="DeleteUserbtn" class="btn btn-primary">Yes,Delete.!</button>
            </div>
        </form>
    </div>
  </div>
</div>
<!-- Delete user End -->



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
              <li class="breadcrumb-item active">Registered Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                    if(isset($_SESSION['status']))
                    {
                        echo "<h4>".$_SESSION['status']."</h4>";
                        unset($_SESSION['status']);
                    } 
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Registered Users</h3>
                        <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right"><i class="fa-solid fa-user-plus fa-bounce" title="Add User"></i></a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone no</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM customer";
                                    $res = mysqli_query($con,$query);

                                    if(mysqli_num_rows($res) > 0)
                                    {
                                        foreach($res as $row)
                                        {
                                            ?>
                                            <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-unstyled"><a href="registered_edit.php?user_id=<?php echo $row['id']; ?>"><i class='fas fa-edit' title="Edit user"></i></a></button> <span>|</span>
                                                <button type="button" value="<?php echo $row['id']; ?>" class="btn btn-unstyled deletebtn"><i class='fas fa-trash' title="Delete user"></i></button>
                                            </td>
                                                
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td>No User Found</td>
                                        </tr>

                                        <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<script src="valid.js"></script>

<?php include('includes/script.php'); ?>

<script>
    $(document).ready(function () {
        $('.deletebtn').click(function (e) { 
            e.preventDefault();

            var user_id = $(this).val();
            // console.log(user_id);
            $('.delete_user_id').val(user_id);
            $('#DeleteModal').modal('show');
        });
    });
</script>



<?php include('includes/footer.php'); ?>

