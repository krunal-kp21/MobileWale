<?php
    include('../include/connect.php');
    include('../functions/common_functions.php');
    session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
    <div class="container-fluid m-5">
        <h2 class="text-center mb-5">Admin Login</h2>
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
                        <label for="password" class="form-label"><b>Password</b></label>
                        <input type="password" id="login_password" name="login_password" placeholder="Enter your password" required='required'
                        class='form-control'>
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                        <p class="small fw-bold pt-1 mt-2">Don't have account? <a href='admin_registration.php' class="link-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>


<?php
if(isset($_POST['admin_login'])){
    $login_username = $_POST['user_name'];
    $login_password = $_POST['login_password'];

    $select_query = "select * from `admin_table` where admin_name = '$login_username'";
    $result = mysqli_query($conn,$select_query);
    $row_count= mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    if($row_count >0){
        if(password_verify($login_password,$row_data['admin_password'])){
            // echo "<script>alert('Login successful')</script>";
            if($row_count==1){
                $_SESSION['user_name'] = $login_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('../admin_area/index.php','_self')</script>";
            }else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
}




?>