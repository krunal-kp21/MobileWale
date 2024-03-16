<?php
// connect file


include("include/connect.php");
include("functions/common_functions.php");
session_start();
?>

<style>
  .cart_image {
  width: 800px;
  height: 80px;
  object-fit:fill;
}

</style>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Mobile Shopping - Cart Details</title>
    <!-- Bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css file -->
    <link rel="stylesheet" href="style.css">
    <style>
      .card-img-top {
  width: 100%;
  height: 200px;
  object-fit: contain;
}
    </style>
</head>
<body>
    <div class="container-flud">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="./images/logo.png" class= "logo" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-bg-color" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="display_all.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./users_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php 
          cart_item(); 
          ?></sup></i></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- calling cart function -->
<?php
cart();
?>
<!-- Second Child -->
    <div class="bg-dark">
        <nav class="navbar navbar-expand-lg bg-dark">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <?php
                if(!isset($_SESSION['user_name'])){
                  echo "<li class='nav-item'>
                  <a class='nav-link active text-white' aria-current='page' href='#'>Welcome Guest</a>
                </li>";
                }else{
                    echo "<li class='nav-item'>
                    <a class='nav-link active text-white' aria-current='page' href='#'>Welcome ".$_SESSION['user_name']."</a>
                  </li>";
                }
if(!isset($_SESSION['user_name'])){
    echo "<li class='nav-item'>
    <a class='nav-link active text-white' aria-current='page' href='./users_area/user_login.php'>Login</a>
    </li>";
}else{
      echo "<li class='nav-item'>
      <a class='nav-link active text-white' aria-current='page' href='./users_area/user_logout.php'>Logout</a>
      </li>";
}

?>
            </ul>
         </nav>
    </div>
    <!-- Third child -->
    <div class="bg-light">
        <h3 class="text-center">Online Store</h3>
        <P class="text-center">Online Mobile shopping is Available</P>
    </div>


    <!-- Fourth child -->

    <div class="container">
        <div class="row">
          <form action="" method='post'>
            <table class="table table-bordered text-center">
                
                  <!-- php code -->
                  <?php
                      global $conn;
                      $ip= getIPAddress();
                      $total_price = 0;
                      $cart_query= "select * from `cart_detail` where ip_address= '$ip'";
                      $result= mysqli_query($conn,$cart_query);
                      $result_count = mysqli_num_rows($result);
                      if($result_count>0){
                        echo "<thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                        </thead>
                        <tbody>";
                      while($row=mysqli_fetch_array($result)){
                        $product_id = $row['product_id'];
                        $select_product="select * from `products` where product_id = '$product_id'";
                        $result_product = mysqli_query($conn,$select_product);
                        while($row_product_price=mysqli_fetch_array($result_product)){
                          $product_price = array($row_product_price['product_price']);
                          $product_table = $row_product_price['product_price'];
                          $product_title = $row_product_price['product_title'];
                          $product_image1 = $row_product_price['product_image1'];
                          $product_value =array_sum($product_price);
                          $total_price += $product_value;
                          
                       
                  ?>
                    <tr>  
                        <td><?php echo $product_title ?></td>
                        <td><img src='./admin_area/product_images/<?php echo $product_image1?>' alt='' class='cart_image'></td>
                        <td><input type="text" name="qty"></td>
                        <?php
                          $ip= getIPAddress();
                          if(isset($_POST['update_cart'])){
                            $quantities = $_POST['qty'];
                            $update_cart = "update `cart_detail` set quantity = $quantities where ip_address = '$ip'";
                            $result_product_quantities = mysqli_query($conn,$update_cart);
                            $total_price = $total_price * $quantities;
                          }
                        ?>
                        <td><?php echo $product_table?></td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                        <td>
                            <!-- <button class='bg-info px-1 py-1 border-1 mx-1'>Update</button> -->
                            <input type="submit" value="Update cart" class='bg-info px-1 py-1 border-1 mx-1' name="update_cart">
                            <!-- <button class='bg-info px-1 py-1 border-1 mx-1'>Remove</button> -->
                            <input type="submit" value="Remove cart" class='bg-info px-1 py-1 border-1 mx-1' name="remove_cart">
                        </td> 
                    </tr>
                    <?php
                        }}
                    
                    }
                    else{
                      echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                    }
                    ?>
                </tbody>
            </table>
            <!-- Subtotal -->
            
            <div class='d-flex mb-3'>
            <?php
                      global $conn;
                      $ip= getIPAddress();
                      $cart_query= "select * from `cart_detail` where ip_address= '$ip'";
                      $result= mysqli_query($conn,$cart_query);
                      $result_count = mysqli_num_rows($result);
                      if($result_count>0){
                        echo"<h4 class='px-3'>Subtotal: <strong class='text-secondary'>$total_price/-</strong></h4>
                        <input type='submit' value='Continue Shopping' class='bg-info px-1 py-1 border-1 mx-1' name='continue_shopping'>
                        <button class='bg-secondary  px-2 py-2 border-1'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</button></a>";
                      }else{
                        echo "<input type='submit' value='Continue Shopping' class='bg-info px-1 py-1 border-1 mx-1' name='continue_shopping'>";
                      }
                      if(isset($_POST['continue_shopping'])){
                        echo "<script>window.open('index.php','_self')</script>";
                      }

                    ?>
            </div>
        </div>
    </div>
    </form>

    <!-- Function to remove item -->
 <?php
  function remove_cart_item(){
    global $conn;
    if(isset($_POST['remove_cart'])){
      foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query = "delete from `cart_detail` where product_id = $remove_id";
        $run_delete = mysqli_query($conn,$delete_query);
        if($run_delete){
          echo "<script>window.open('cart.php','_self')</script>";
        }
      }
    }
  }
  echo $remove_item = remove_cart_item();

?>

    





<!-- Last Child --> 
    <!-- Include footer -->
<?php
include("./include/footer.php")
?>

    </div>
<!-- Bootstrap Javascript link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>