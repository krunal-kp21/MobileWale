<?php
    include('../include/connect.php');
    include('../functions/common_functions.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!-- Bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css file -->
    <link rel="stylesheet" href="style.css">
    
</head>
<style>
    .payment_img{
        width:100%;
        margin:auto;
        display:block;
    }
</style>
<body>
    <!-- php code to access user id -->
    <?php
        $user_ip = getIPAddress();
        $user_name = $_SESSION['user_name'];
        // echo '$user_name';
        $get_user = "select * from `user_table` where user_ip='$user_ip' ";
        $result = mysqli_query($conn,$get_user);
        $run_query= mysqli_fetch_array($result);
        $user_id = $run_query['user_id'];
        
    


?>
    <div class="container">
        <h2 class="text-center text-info">Payment Option</h2>
        <div class="row mt-5 d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../images/upilogo.png" alt="" class="payment_img"></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class='text-center'>Pay Offline</h2></a>
            </div>
            
        </div>
    </div>
    
</body>
</html>