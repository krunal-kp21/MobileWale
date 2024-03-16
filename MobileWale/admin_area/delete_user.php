<?php

if(isset($_GET['delete_user'])){
    $delete_id =$_GET['delete_user'];
    // delete query

    $delete_user = "delete from `user_table` where user_id=$delete_id";
    $result_user = mysqli_query($conn,$delete_user);
    if($result_user){
        echo "<script>alert('User deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }
}

?>