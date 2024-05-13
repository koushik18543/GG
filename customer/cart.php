<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');
if(isset($_GET['cust_id']))
{
    $cust_id=$_GET['cust_id'];
    $_SESSION['cust-id']=$_GET['cust_id'];
    
}
?>
<head>
    <script src="https://kit.fontawesome.com/c186916733.js" crossorigin="anonymous"></script>
</head>
<div class="content-wrapper">
<div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header mx-auto text-center ">
                            <h3 class="card-title text-muted"><b>Products in the Cart</b></h3>
                            <!-- <a href="#" data-toggle="modal" data-target="#AddUserModal" class="btn btn-primary btn-sm float-right"><i class="fa-solid fa-user-plus fa-bounce" title="Add User"></i></a> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                        $stmt = "SELECT id FROM customer WHERE email='{$_SESSION['email']}'";
                        $res = mysqli_query($con,$stmt);
                        if(mysqli_num_rows($res) > 0)
                        {
                            foreach($res as $row)
                            {
                                ?>
                            <form action="cart_action.php?cust_id=<?php echo $row['id'];?>" method="post">
                                <table id="example1" class="table table-bordered table-hover table-primary">
                                    <thead>
                                        <tr class="mx-auto text-center">
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th><button type="submit" name="del-cart" class="badge badge-danger p-1" onclick="return confirm('Are you sure want to clear your cart?');"><i class="fas fa-trash"></i>&nbsp;&nbsp;Clear Cart</button></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php                                        
                                            $query = "SELECT * FROM cart WHERE cust_id=$cust_id";
                                            $res = mysqli_query($con,$query);

                                            if(mysqli_num_rows($res) > 0)
                                            {
                                                foreach($res as $row)
                                                {
                                                    ?>
                                                    <tr class="mx-auto text-center">
                                                    
                                                    <td><img src="image/<?php echo $row['prod_img']; ?>" alt="plant image" style="max-height: 100px; max-width: 100px;"></td>
                                                    <td><?php echo $row['prod_name']; ?></td>
                                                    <td>&#8377;<?php echo $row['price']; ?></td>
                                                    <td><?php echo $row['qty']; ?></td>
                                                    <td>&#8377;<?php echo $row['total_price']; ?></td>
                                                    
                                                    <td>
                                                        <input type="hidden" name="item_id" value="<?php echo $row['prod_id']; ?>">
                                                         <br><button type="submit" name="remove-item" class="badge badge-danger p-1" onclick="return confirm('Are you sure want to remove these product?');"><i class='fas fa-trash' title="remove product"></i></button>
                                                    </td>
                                                    
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            
                                            else
                                            {
                                                ?>
                                                <tr>
                                                    <td colspan="6" class="mx-auto text-center">No Products added to the cart!</td>
                                                </tr>

                                                <?php
                                            }
                                        ?>
                                        <?php
                                        $qry="SELECT SUM(`total_price`) AS grand_price FROM cart WHERE cust_id=$cust_id";
                                        $query_run = mysqli_query($con, $qry);
                                        if($query_run)
                                        {
                                            $result = mysqli_fetch_assoc($query_run);
                                            $Sum_price = $result['grand_price'];
                                            $_SESSION['total-price']=$result['grand_price'];
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="2" class="text-center"> <a href="index.php" class="btn btn-success"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Continue Shopping</a> <span>
                                              <!-- <button type="submit" name="update" class="btn btn-dark ml-3">Update</button>   -->
                                            </span></td>
                                            <td colspan="2" class="text-center">Grand Total</td>
                                            <td class="text-center">&#8377;<?php echo $Sum_price; ?></td>
                                            <td class="text-center"><a href="mojo.php" class="btn btn-info"><i class="far fa-credit-card"></i>&nbsp;&nbsp;Checkout</a></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </form>
                            <?php
                            }
                        }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
            
</div>
</div>
<?php include('includes/script.php'); ?>