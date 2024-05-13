<?php
// session_start(); comment hai bcoz session_start kiya hai topbar.php mai
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
?>
<div class="content-wrapper">
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
                            <!-- <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right"><i class="fa-solid fa-user-plus fa-bounce" title="Add User"></i></a> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Customer ID</th>
                                        <th>product</th>
                                        <!-- <th>Phone no</th> -->
                                        <th>Date</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM orders";
                                        $res = mysqli_query($con,$query);

                                        if(mysqli_num_rows($res) > 0)
                                        {
                                            foreach($res as $row)
                                            {
                                                ?>
                                                <tr>
                                                <td><?php echo $row['cust_id']; ?></td>
                                                <td><?php echo $row['prod_name']; ?></td>
                                                <td><?php echo $row['ord_dte']; ?></td>
                                                <td><?php echo $row['tot_amt']; ?></td>
                                                
                                                <td><button type="button" class="btn btn-unstyled badge badge-success"><?php echo $row['status']; ?></button></td>
                                                    
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
<?php include('includes/script.php'); ?>
<?php include('includes/footer.php'); ?>