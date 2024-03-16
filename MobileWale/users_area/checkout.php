<?php
// connect file


include("../include/connect.php");
session_start();

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Mobile Checkout Page</title>
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
.logo{
  height: 7%;
  width: 7%;
}
    </style>
</head>
<body>
    <div class="container-flud">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="../images/logo.png" class= "logo" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-bg-color" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../display_all.php">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method='get'>
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
        name="search_data">
        <input type="Submit" value="search" class="btn btn-primary" name="search_data_product">
        <!-- <button class="btn btn-outline-success text-bg-primary"  type="submit">Search</button> -->
      </form>
    </div>
  </div>
</nav>
<!-- calling cart function -->

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
    <a class='nav-link active text-white' aria-current='page' href='user_login.php'>Login</a>
    </li>";
}else{
      echo "<li class='nav-item'>
      <a class='nav-link active text-white' aria-current='page' href='user_logout.php'>Logout</a>
      </li>";
}

?>

                
            </ul>
         </nav>
    </div>
    <div class="bg-light">
        <h3 class="text-center">Online Store</h3>
        <P class="text-center">Online Mobile shopping is Available</P>
    </div>

    <!-- Fourth Child -->
    

        <div class="col-md-10 ">
            <div class="row">
                <?php
                if(!isset($_SESSION['user_name'])){
                    include('user_login.php');
                }else{
                    include('payment.php');
                }
              ?>
                  <!-- row end -->
            </div>
            <!-- column end -->
        </div>
    </div>    
</div>




    





<!-- Last Child --> 
    <!-- Include footer -->
<?php
include("../include/footer.php")
?>

    </div>
<!-- Bootstrap Javascript link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>