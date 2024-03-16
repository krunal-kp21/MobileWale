<?php
    include('../include/connect.php');
    include('../functions/common_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mb-4">
        <!-- Username -->
        <label for="user_username" class="form-label"><b>Username</b></label>
        <input type="text" id="user_username" class="form-control" placeholder="Enter your Username" autocomplete="off" required = "required" name="user_username">
    </div>
    <div class="form-outline mb-4">
        <!-- User Email -->
        <label for="user_email" class="form-label"><b>User Email</b></label>
        <input type="email" id="user_email" class="form-control" placeholder="Enter your Email address" autocomplete="off" required = "required" name="user_email">
    </div>

    <div class="form-outline mb-4">
        <!-- User Password -->
        <label for="user_password" class="form-label"><b>User Password</b></label>
        <input type="password" id="user_password" class="form-control" placeholder="Enter your Password" autocomplete="off" required = "required" name="user_password">
    </div>
    <div class="form-outline mb-4">
        <!-- Confirm Password -->
        <label for="confirm_user_password" class="form-label"><b>Confirm Password</b></label>
        <input type="password" id="confirm_user_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required = "required" name="confirm_user_password">
    </div>
    <div class="form-outline mb-4">
        <!-- User Address -->
        <label for="user_address" class="form-label"><b>User Address</b></label>
        <input type="text" id="user_address" class="form-control" placeholder="Enter your Address" autocomplete="off" required = "required" name="user_address">
    </div>
    <div class="form-outline mb-4">
        <!-- User Contact -->
        <label for="user_contact" class="form-label"><b>User Contact</b></label>
        <input type="text" id="user_contact" class="form-control" placeholder="Enter your Mobile Number" autocomplete="off" required = "required" name="user_contact">
    </div>
    <div class="mt-4 pt-2">
        <a href="../index.php"><input type="submit" value="Register" class="bg-info py-2 px-3 border=0" name="user_register"></a>
        <p class="small fw-bold mt-2 pt-1">Already have account? <a href="user_login.php" class="text-danger">Login</a></p>
    </div>
</form>
            </div>
        </div>
    </div>
</body>
</html>

<!-- Php code -->
<?php

if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
    $confirm_user_password = $_POST['confirm_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_ip = getIPAddress();


    // select_query

    $select_query = "select * from `user_table` where user_name= '$user_username' or user_email= '$user_email'";
    $result = mysqli_query($conn,$select_query);
    $row_count = mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Username already exist')</script>";
    }else if($user_password!=$confirm_user_password){
echo "<script>alert('Password do not match')</script>";
    }else{

    
    // insert query
    $insert_query = "insert into `user_table` (user_name,user_email,user_password,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password',
    '$user_ip','$user_address','$user_contact')";
    $sql_execute = mysqli_query($conn,$insert_query);
    if($sql_execute){
        echo "<script>alert('Data inserted successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";

    }else{
        die(mysqli_error($conn));
    }
}
// selecting cart items

$select_cart_items = "select * from `cart_detail` where ip_adderess = '$user_ip'";
$result_cart = mysqli_query($conn,$select_cart_items);
$rows_count = mysqli_num_rows($result_cart);
if($rows_count>0){
    $_SESSION['user_name'] = $user_username;
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('chechout.php','_self')</script>";
}else{
    echo "<script>window.open('../index.php','_self')</script>";
}

}

?>