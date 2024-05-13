<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

?>
<head>
    <script src="https://kit.fontawesome.com/c186916733.js" crossorigin="anonymous"></script>
</head>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">View Products</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container" >
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products</h3>
                            <!-- <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right"><i class="fa-solid fa-user-plus fa-bounce" title="Add User"></i></a> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover table-dark">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM product";
                                        $res = mysqli_query($con,$query);

                                        if(mysqli_num_rows($res) > 0)
                                        {
                                            foreach($res as $row)
                                            {
                                                ?>
                                                <tr>
                                                <td><img src="image/<?php echo $row['image']; ?>" alt="plant image" style="max-height: 100px; max-width: 100px;"></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['price']; ?></td>
                                                <td><?php echo $row['discount']; ?></td>
                                                <td><?php echo $row['type']; ?></td>    
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
