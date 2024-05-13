<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config/dbcon.php');

?>
<head>
    
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c186916733.js" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style type="text/css">
    body
    {
        /* margin-top:20px; */
        background-color:#f2f6fc;
        color:#69707a;
    }
  .img-account-profile
  {
    height: 10rem;
  }
  .rounded-circle 
  {
    border-radius: 50% !important;
  }
  .card 
  {
    box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
  }
  .card .card-header 
  {
    font-weight: 500;
  }
  .card-header:first-child 
  {
    border-radius: 0.35rem 0.35rem 0 0;
  }
  .card-header 
  {
    padding: 1rem 1.35rem;
    margin-bottom: 0;
    background-color: rgba(33, 40, 50, 0.03);
    border-bottom: 1px solid rgba(33, 40, 50, 0.125);
  }
  .form-control, .dataTable-input 
  {
    display: block;
    width: 100%;
    padding: 0.875rem 1.125rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1;
    color: #69707a;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #c5ccd6;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.35rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .nav-borders .nav-link.active 
  {
    color: #0061f2;
    border-bottom-color: #0061f2;
  }
  .nav-borders .nav-link 
  {
    color: #69707a;
    border-bottom-width: 0.125rem;
    border-bottom-style: solid;
    border-bottom-color: transparent;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    padding-left: 0;
    padding-right: 0;
    margin-left: 1rem;
    margin-right: 1rem;
  }
</style>
</head>
<body>
  <div class="container mr-1">
  <?php
                if(isset($_SESSION['product']))
                {
            ?> 
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <strong> <?php echo $_SESSION['product']; ?> </strong> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php
                  unset($_SESSION['product']);
                }
              ?>
  </div>
<div class="container-xl px-4 mt-5"> 
      <div class="row">
        <div class="col-xl-4">
          <div class="card mb-4 mb-xl-0">
            <!-- <div class="card-header">Profile Picture</div>
              <div class="card-body text-center">
                <img class="img-account-profile rounded-square mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt>
                <div class="small font-italic text-muted mb-4"></div>
            </div> -->
            </div>
          </div>
          <div class="col-xl-8">
            <div class="card mb-4">
              <div class="card-header">Add Products</div>
                <div class="card-body">
                  
                    <form action="add_product_code.php" method="post">
                      <div class="mb-3">  
                        <label class="small mb-1" for="inputProductName">Product Name</label>
                        <input class="form-control" name="prod_name" id="inputUsername" type="text" placeholder="Enter product name">
                      </div>
                        <!-- <div class="row gx-3 mb-3">
                          <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">First name</label>
                            <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Last name</label>
                            <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" </div> -->
                        <div class="row gx-3 mb-3">
                          <!-- <div class="col-md-6">
                            <label class="small mb-1" for="inputOrgName">Organization name</label>
                            <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name"  -->
                          <div class="col-md-6">
                            <label class="small mb-1" for="inputProductImage">Product Image</label>
                            <input class="form-control" name="prod_img" id="inputProductImage" type="file">
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="small mb-1" for="inputProductType">Product Type</label>
                          <br>
                            <div class="col-md-6">
                                <select name="prod_type" class="form-control">
                                    <option value=""></option>
                                    <option value="indoor">Indoor</option>
                                    <option value="outdoor">Outdoor</option>
                                    <option value="seed">Seed</option>
                                    <option value="pot">Pot</option>
                                </select>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                          <div class="col-md-6">
                            <label class="small mb-1" for="inputPrice">Price</label>
                            <input class="form-control" name="prod_price" id="inputPrice" type="text" placeholder="Enter product price">
                          </div>
                        </div>
                        <div class="row gx-3 mb-3">
                          <div class="col-md-6">
                            <label class="small mb-1" for="inputDiscount">Discount</label>
                            <input class="form-control" id="inputDiscount" type="text" name="prod_dis" placeholder="Enter Product Discount">
                          </div>
                        </div>
                        <button class="btn btn-info" type="submit" name="add_btn">ADD</button>
                    </form>
                    
          </div>
          </div>
        </div>
      </div>
    </div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
</script> 
</body>
</html>
<?php include('includes/script.php'); ?>