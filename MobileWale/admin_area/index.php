
<?php
// connect file


include("../include/connect.php");
include("../functions/common_functions.php");
session_start();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css file -->
    <link rel="stylesheet" href="../style.css">

    <!-- Font awsome link -->




    <style>
        .admin_image {
  width: 100px;
  object-fit: contain;
}
.product_img{
    width: 100px;
    object-fit: contain;
}
body{
    overflow-x:hidden;
}
.footer{
    position: absolute;
    bottom: 0;
}

    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                    <?php
if(!isset($_SESSION['user_name'])){
  echo "<li class='nav-item'>
  <a class='nav-link active' aria-current='page' href='./admin_login.php'>Welcome Guest</a>
</li>";
}else{
    echo "<li class='nav-item'>
    <a class='nav-link active ' aria-current='page' href='./admin_logout.php'>Welcome ".$_SESSION['user_name']."</a>
  </li>";
}


if(!isset($_SESSION['user_name'])){
    echo "<li class='nav-item'>
    <a class='nav-link active ' aria-current='page' href='./admin_login.php'>Login</a>
    </li>";
}else{
      echo "<li class='nav-item'>
      <a class='nav-link active ' aria-current='page' href='./admin_logout.php'>Logout</a>
      </li>";
}

?>
                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">Welcome Guest</a>
                        </li> -->
                    </ul>

                </nav>
            </div>
        </nav>

        <!-- Second child -->
        <div class="bg-light">
            <h3 class="text-center p-2 bg-secondary">Manage details</h3>
        </div>
        <!-- Third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center ">
                <div class="px-5">
                    <a href="#" class=""><img src="../images/admin_logo.jpg" alt="" class = "admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center align-items-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-2 mx-2">Inser Product</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-2 mx-2">View Product</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-2 mx-2">Insert categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-2 mx-2">View categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-2 mx-2">Insert Brand</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-2 mx-2">View Brand</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-2 mx-2">All Orders</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-2 mx-2">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-2 mx-2">Logout</a></button>

                </div>
            </div>
        </div>
        <!-- Fourth child -->
        <div class="container my-5">
            <?php
            if(isset($_GET['insert_categories'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brand.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_product'])){
                include('delete_product.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if(isset($_GET['edit_category'])){
                include('edit_category.php');
            }
            if(isset($_GET['edit_brand'])){
                include('edit_brand.php');
            }
            if(isset($_GET['delete_category'])){
                include('delete_category.php');
            }
            if(isset($_GET['delete_brand'])){
                include('delete_brand.php');
            }
            if(isset($_GET['list_orders'])){
                include('list_orders.php');
            }
            if(isset($_GET['delete_order'])){
                include('delete_order.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            if(isset($_GET['delete_user'])){
                include('delete_user.php');
            }

            ?>
            
        </div>
        <!-- last child -->
        <?php
include("../include/footer.php")
?>

    </div>    


<!-- Bootstrap js link -->
</body>
</html>