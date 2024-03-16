<?php
    include('../include/connect.php');
    include('../functions/common_functions.php');
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
        <!-- Bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow: hidden;
        }
    </style>

</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Registration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-4">
                <img src="../images/admin_registration.png" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <form action="" method="post">
                    <div class="form-outline mb-4 col-xl-6">
                        <label for="user_name" class="form-label"><b>Username</b></label>
                        <input type="text" id="user_name" name="user_name" placeholder="Enter your Username" required='required'
                        class='form-control'>
                    </div>
                    <div class="form-outline mb-4 col-xl-6">
                        <label for="email" class="form-label"><b>Email</b></label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required='required'
                        class='form-control'>
                    </div>
                    <div class="form-outline mb-4 col-xl-6">
                        <label for="password" class="form-label"><b>Password</b></label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required='required'
                        class='form-control'>
                    </div>
                    <div class="form-outline mb-4 col-xl-6">
                        <label for="confirm_password" class="form-label"><b>Confirm Password</b></label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter your confirm password" required='required'
                        class='form-control'>
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold pt-1 mt-2">Do you have account? <a href='admin_login.php' class="link-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<!-- Php code -->
<?php

if(isset($_POST['admin_registration'])){
    $admin_username = $_POST['user_name'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $hash_password = password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_admin_password = $_POST['confirm_password'];


    // select_query

    $select_query = "select * from `admin_table` where admin_name= '$admin_username' or admin_email= '$admin_email'";
    $result = mysqli_query($conn,$select_query);
    $row_count = mysqli_num_rows($result);
    if($row_count>0){
        echo "<script>alert('Username already exist')</script>";
    }else if($admin_password!=$confirm_admin_password){
echo "<script>alert('Password do not match')</script>";
    }else{

    
    // insert query
    $insert_query = "insert into `admin_table` (admin_name,admin_email,admin_password) values ('$admin_username','$admin_email','$hash_password')";
    $sql_execute = mysqli_query($conn,$insert_query);
    if($sql_execute){
        echo "<script>alert('Data inserted successfully')</script>";
        echo "<script>window.open('../admin_area/index.php','_self')</script>";

    }else{
        die(mysqli_error($conn));
    }
}
}

?>