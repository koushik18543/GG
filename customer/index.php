<?php
// session_start();
// if(!isset($_SESSION['Email']));
// {
//     header("Location:PROJECT/login.php");
// }
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="1"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>GO Green</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">    
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Dancing+Script" rel="stylesheet">
</head>
<body style="background-color: #ffffff;">
<br><br>
<section>
    <div class="container">
    <?php
                if(isset($_SESSION['cart']))
                {
            ?> 
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Hey Customer!</strong> <?php echo $_SESSION['cart']; ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php
                  unset($_SESSION['cart']);
                }
              ?>
        <?php include('anim.php'); ?>
        <hr>
        <div class="news">
            <u style="color:red;"><h4 style="color:red; font-weight:bold;">Alert</u>⚠️</h4>
            <marquee width="100%" behavior="alternate" scrollamount="20"><h5 class="text-success"><strong>Upcoming categories!</strong>👉🏻<u>Fruit bearing plant.</u> 👉🏻<u>Plant Care.</u></h5></marquee>
        </div>
        <hr>
        <section id="productsSection">
        
            <section id="indoor">
                <h2>Indoor Plants</h2>
                <hr>
                <div class="row" >

                    <?php

                    $con = mysqli_connect('localhost','root');
                    mysqli_select_db($con,'php_user');

                    // if($con){
                    // 	echo "connection succussful";
                    // }else{
                    // 	echo "no connection";
                    // }
                    $stmt = "SELECT id FROM customer WHERE email='{$_SESSION['email']}'";
                $res = mysqli_query($con,$stmt);
              if(mysqli_num_rows($res) > 0)
              {
                foreach($res as $row)
                {
               
                    $query = " SELECT `id`, `name`, `image`, `price`, `discount` FROM `product` WHERE `type`='indoor' ";

                    $queryfire = mysqli_query($con, $query);

                    $num = mysqli_num_rows($queryfire);

                    if($num > 0){
                        while($product = mysqli_fetch_array($queryfire)){
                            ?>
                            
                        <div class="col-lg-3 col-md-3 col-sm-12 ">
                            
                            <form action="cart_action.php?cust_id=<?php echo $row['id'];?>" method="post">
                                <div class="card mb-3 bg-"style="width: 100%;">
                                    <h6 class="card-title bg-info text-white p-2 text-uppercase" style="width: 100%; border-radius: 20px;"> <?php echo
                                    $product['name'];  ?></h6>

                                    <div class="card-body p-2">
                                        <img src="image/<?php echo
                                    $product['image'];  ?>" alt="plant" class="img-fluid img-thumbnail mb-2" >

                                    <h6> &#8377;<?php echo number_format($product['price'],2);  ?><span class="badge badge-danger"> (<?php echo $product['discount'];  ?>%off) </span> </h6> 

                                    <h6 class="badge badge-success"> 4.4 <i class="fa fa-star"> </i> </h6>
                                    <input type="number" name="qty" class="form-control" placeholder="Quantity">
                                    <input type="hidden" name="price" value="<?php echo number_format($product['price'],2); ?>">
                                    <input type="hidden" name="prod_id" value="<?php echo $product['id']; ?>">
                                    <input type="hidden" name="prod_name" value="<?php echo $product['name']; ?>">
                                    <input type="hidden" name="prod_img" value="<?php echo $product['image']; ?>">

                                    </div>
                                    <div class="btn-group d-flex">
                                        <button type="submit" name="cart-btn" class="btn btn-success flex-fill"> Add to cart </button> <button name="buy-now" class="btn btn-warning flex-fill text-white"> Buy Now </button>
                                    </div>


                                </div>
                            </form>

                        </div>


                    <?php		
                        }
                    }
                }
            }
                    ?>
                </div>

            </section>
            <br>
            <hr>
            <section id="outdoor">
                <h2>Outdoor Plants</h2>
                <hr>
                <div class="row" >

                    <?php

                    $con = mysqli_connect('localhost','root');
                    mysqli_select_db($con,'php_user');

                    // if($con){
                    // 	echo "connection succussful";
                    // }else{
                    // 	echo "no connection";
                    // }
                    $stmt = "SELECT id FROM customer WHERE email='{$_SESSION['email']}'";
                $res = mysqli_query($con,$stmt);
              if(mysqli_num_rows($res) > 0)
              {
                foreach($res as $row)
                {
                    $query = " SELECT `id`,`name`, `image`, `price`, `discount` FROM `product` WHERE `type`='outdoor' ";

                    $queryfire = mysqli_query($con, $query);

                    $num = mysqli_num_rows($queryfire);

                    if($num > 0){
                        while($product = mysqli_fetch_array($queryfire)){
                            ?>
                            
                        <div class="col-lg-3 col-md-3 col-sm-12 ">
                            
                            <form action="cart_action.php?cust_id=<?php echo $row['id'];?>" method="post">
                                <div class="card mb-3"style="width: 100%;">
                                    <h6 class="card-title bg-info text-white p-2 text-uppercase" style="width: 100%; border-radius: 20px;"> <?php echo
                                    $product['name'];  ?></h6>

                                    <div class="card-body p-2">
                                        <img src="image/<?php echo
                                    $product['image'];  ?>" alt="phone" class="img-fluid img-thumbnail mb-2" >

                                    <h6> &#8377;<?php echo number_format($product['price'],2);  ?><span class="badge badge-danger"> (<?php echo $product['discount'];  ?>%off) </span> </h6> 

                                    <h6 class="badge badge-success"> 4.4 <i class="fa fa-star"> </i> </h6>

                                    <input type="number" name="qty" class="form-control" placeholder="Quantity">
                                    <input type="hidden" name="price" value="<?php echo number_format($product['price'],2); ?>">
                                    <input type="hidden" name="prod_id" value="<?php echo $product['id']; ?>">
                                    <input type="hidden" name="prod_name" value="<?php echo $product['name']; ?>">
                                    <input type="hidden" name="prod_img" value="<?php echo $product['image']; ?>">

                                    </div>
                                    <div class="btn-group d-flex">
                                        <button type="submit" name="cart-btn" class="btn btn-success flex-fill"> Add to cart </button> <button type="submit" name="buy-now" class="btn btn-warning flex-fill text-white"> BUy Now </button>
                                    </div>


                                </div>
                            </form>

                        </div>


                    <?php		
                        }
                    }
                }
            }
                    ?>
                </div>
            </section>
            <br>
            <hr>
            <section id="seeds">
                <h2>Vegetable Seeds</h2>
                <hr>
                <div class="row" >

                    <?php

                    $con = mysqli_connect('3.109.212.28','root','root');
                    mysqli_select_db($con,'php_user');

                    // if($con){
                    // 	echo "connection succussful";
                    // }else{
                    // 	echo "no connection";
                    // }
                    $stmt = "SELECT id FROM customer WHERE email='{$_SESSION['email']}'";
                    $res = mysqli_query($con,$stmt);
                  if(mysqli_num_rows($res) > 0)
                  {
                    foreach($res as $row)
                    {
                    $query = " SELECT `id`,`name`, `image`, `price`, `discount` FROM `product` WHERE `type`='seed' ";

                    $queryfire = mysqli_query($con, $query);

                    $num = mysqli_num_rows($queryfire);

                    if($num > 0){
                        while($product = mysqli_fetch_array($queryfire)){
                            ?>
                            
                        <div class="col-lg-3 col-md-3 col-sm-12 ">
                            
                            <form action="cart_action.php?cust_id=<?php echo $row['id'];?>" method="post">
                                <div class="card mb-3 bg-"style="width: 100%;">
                                    <h6 class="card-title bg-info text-white p-2 text-uppercase" style="width: 100%; border-radius: 20px;"> <?php echo
                                    $product['name'];  ?></h6>

                                    <div class="card-body p-2">
                                        <img src="image/<?php echo
                                    $product['image'];  ?>" alt="plant" class="img-fluid img-thumbnail mb-2" >

                                    <h6> &#8377;<?php echo number_format($product['price'],2);  ?><span class="badge badge-danger"> (<?php echo $product['discount'];  ?>%off) </span> </h6> 

                                    <h6 class="badge badge-success"> 4.4 <i class="fa fa-star"> </i> </h6>

                                    <input type="number" name="qty" class="form-control" placeholder="Quantity">
                                    <input type="hidden" name="price" value="<?php echo number_format($product['price'],2); ?>">
                                    <input type="hidden" name="prod_id" value="<?php echo $product['id']; ?>">
                                    <input type="hidden" name="prod_name" value="<?php echo $product['name']; ?>">
                                    <input type="hidden" name="prod_img" value="<?php echo $product['image']; ?>">

                                    </div>
                                    <div class="btn-group d-flex">
                                        <button type="submit" name="cart-btn" class="btn btn-success flex-fill"> Add to cart </button> <button type="submit" name="buy-now" class="btn btn-warning flex-fill text-white" data-product-id="{$product['product_id']}"> Buy Now </button>
                                    </div>


                                </div>
                            </form>

                        </div>


                    <?php		
                        }
                    }
                }
            }
                    ?>
                </div>

            </section>
            <br>
            <hr>
            <section id="pot">
                <h2>Plant Pots</h2>
                <hr>
                <div class="row" >

                    <?php

                    $con = mysqli_connect('3.109.212.28','root','root');
                    mysqli_select_db($con,'php_user');

                    // if($con){
                    // 	echo "connection succussful";
                    // }else{
                    // 	echo "no connection";
                    // }
                    $stmt = "SELECT id FROM customer WHERE email='{$_SESSION['email']}'";
                    $res = mysqli_query($con,$stmt);
                  if(mysqli_num_rows($res) > 0)
                  {
                    foreach($res as $row)
                    {
                        $_SESSION['customer_id']=$row['id'];
                    $query = " SELECT `id`,`name`, `image`, `price`, `discount` FROM `product` WHERE `type`='pot' ";

                    $queryfire = mysqli_query($con, $query);

                    $num = mysqli_num_rows($queryfire);

                    if($num > 0){
                        while($product = mysqli_fetch_array($queryfire)){
                            ?>
                            
                        <div class="col-lg-3 col-md-3 col-sm-12 ">
                            
                            <form action="cart_action.php?cust_id=<?php echo $row['id'];?>" method="post">
                                <div class="card mb-3"style="width: 100%;">
                                    <h6 class="card-title bg-info text-white p-2 text-uppercase" style="width: 100%; border-radius: 20px;"> <?php echo
                                    $product['name'];  ?></h6>

                                    <div class="card-body p-2">
                                        <img src="image/<?php echo
                                    $product['image'];  ?>" alt="phone" class="img-fluid img-thumbnail mb-2" >

                                    <h6> &#8377;<?php echo number_format($product['price'],2);  ?><span class="badge badge-danger"> (<?php echo $product['discount'];  ?>%off) </span> </h6> 

                                    <h6 class="badge badge-success"> 4.4 <i class="fa fa-star"> </i> </h6>

                                    <input type="number" name="qty" class="form-control" placeholder="Quantity">
                                    <input type="hidden" name="price" value="<?php echo number_format($product['price'],2); ?>">
                                    <input type="hidden" name="prod_id" value="<?php echo $product['id']; ?>">
                                    <input type="hidden" name="prod_name" value="<?php echo $product['name']; ?>">
                                    <input type="hidden" name="prod_img" value="<?php echo $product['image']; ?>">
                                    <input type="hidden" name="p_rice" value="<?php echo number_format($product['price'], 2); ?>">

                                    </div>
                                    <div class="btn-group d-flex">
                                        <button type="submit" name="cart-btn" class="btn btn-success flex-fill"> Add to cart </button> <button  name="buy-now" class="btn btn-warning flex-fill text-white"> BUy Now </button>
                                    </div>


                                </div>
                            </form>

                        </div>


                    <?php		
                        }
                    }
                }
            }
                    ?>
                </div>
            </section>
        </section>    
    </div>
</section>
<!-- Add this script at the end of your index.php file -->
<script>
    // // Use a flag to keep track of whether the page has been reloaded
    // var hasReloaded = false;
    // // Function to reload the page after a delay (if not reloaded already)
    // function reloadPage() {
    //     if (!hasReloaded) {
    //         hasReloaded = true; // Set the flag to prevent further reloads
    //         window.location.reload();
    //     }
    // }
    
    // // Set a timeout to reload the page after a short delay (e.g., 1 second)
    // var reloadTimeout = setTimeout(reloadPage, 1000); // 1000 milliseconds = 1 second
</script>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Find all "Buy Now" buttons in the form
        var buyButtons = document.querySelectorAll("button[name='buy-now']");
        
        
        // Attach a click event handler to each button
        buyButtons.forEach(function (button) {
            button.addEventListener("click", function (event) {
                //event.preventDefault(); // Prevent the form from submitting

                // Get the product price from the hidden input field
                
                var priceInput = event.target.closest("form").querySelector("input[name='price']");
                var price = priceInput.value;

                // Now you can use the 'price' variable as needed
                //alert("Price of the selected product: $" + price);
                // You can also perform additional actions here.

                // To manually submit the form, you can do this:
                // event.target.form.submit();
                var price = 123.45; // Your JavaScript variable

                // Create an XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                // Prepare the request
                xhr.open("POST", "cart_action.php", true);

                // Set the request header
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                // Define a function to handle the response
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Handle the response from cart_action.php
                        console.log(xhr.responseText);
                    }
                };

                // Send the request with the price as data
                xhr.send("price=" + price);

            });
        });
    });
</script>


<?php include('chat.php'); ?>
<?php include('includes/script.php'); ?>

</body>
</html>
