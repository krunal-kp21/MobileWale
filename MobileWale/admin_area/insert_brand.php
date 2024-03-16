<?php

include('../include/connect.php');
if(isset($_POST['insert_brand'])){
    $brand_title = $_POST['brand_title'];
    // Select from the databases
    $select_query = "select * from `brands` where brand_title = '$brand_title'";
    $result_select= mysqli_query($conn,$select_query);
    $number =mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This Brand is present inside the database')</script>";
    }else{
    $insert_query1 = "insert into `brands` (brand_title) values ('$brand_title')";
    $result1= mysqli_query($conn,$insert_query1);
    if($result1){
        echo "<script>alert('Brand has been inserted successfully')</script>";
    }
}
}

?>



<h2 class="text-center">Insert brands</h2>
<form action="" method="post" class= "mb-4">
    <div class="input-group w-90 mb-4">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert brand" ">
    </div>
    <div class="input-group w-10 mb-1">
        <input type="submit" class="bg-info border-0 p-2 my-2" name="insert_brand" value="Insert brand" class="bg-info">
        <!-- <button class="bg-info p-2 my-2 border-0" >Insert Brand</button> -->
    </div>

</form>