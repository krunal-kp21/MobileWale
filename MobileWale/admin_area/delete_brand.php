<?php

if(isset($_GET['delete_brand'])){
    $delete_id =$_GET['delete_brand'];
    // delete query

    $delete_brand = "delete from `brands` where brand_id=$delete_id";
    $result_brand = mysqli_query($conn,$delete_brand);
    if($result_brand){
        echo "<script>alert('brand deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}

?>