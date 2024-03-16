<?php

include('../include/connect.php');
if(isset($_POST['insert_categories'])){
    $categories_title = $_POST['category_title'];
    // select data form the database
    $select_query = "select * from `categories` where category_title='$categories_title'";
    $result_select= mysqli_query($conn,$select_query);
    $number =mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This category is present inside the database')</script>";
    }else{
    $insert_query = "insert into `categories` (category_title) values ('$categories_title')";
    $result = mysqli_query($conn,$insert_query);
    if($result){
        echo "<script>alert('category has been inserted successfully')</script>";
    }
}
}
 

?>

<h2 class="text-center">Insert categories</h2>
<form action="" method="post" class= "mb-4">
    <div class="input-group w-90 mb-4">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="category_title" placeholder="Insert Categories" aria-label="Insert Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-1">
        <input type="submit" class="bg-info border-0 p-2 my-2" name="insert_categories" value="Insert categories" class="bg-info">
        <!-- <button class="bg-info p-2 my-2 border-0" >Insert Categories</button> -->
    </div>

</form>