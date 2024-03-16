<?php
    include('../include/connect.php');
    if(isset($_POST['insert_product'])){

        $product_title = $_POST['product_title'];
        $product_description = $_POST['product_description'];
        $product_keywords = $_POST['product_keywords'];
        $product_category = $_POST['product_category'];
        $product_brands = $_POST['product_brands'];
        $product_price = $_POST['product_price'];

        // accesing images
        $product_image1 = $_FILES['product_image1']['name'];
        $product_image2 = $_FILES['product_image2']['name'];
        $product_image3 = $_FILES['product_image3']['name'];

        // accesing images temp name
        $temp_image1 = $_FILES['product_image1']['tmp_name'];
        $temp_image2 = $_FILES['product_image2']['tmp_name'];
        $temp_image3 = $_FILES['product_image3']['tmp_name'];

        $product_status = 'true';

        // checking empty condition
        if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or 
        $product_brands=='' or $product_price=='' or $temp_image1=='' or $temp_image2=='' or $temp_image3==''){
            echo "<script>alert('please fill available field')</script>";
            exit();
        }else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");


            // insert Products
            $insert_product = "insert into `products`(product_title,product_description,product_keywords,category_id,
            brand_id,product_image1,product_image2,product_image3,product_price,date,status) 
            values('$product_title','$product_description','$product_keywords','$product_category',
            '$product_brands','$product_image1','$product_image2','$product_image3','$product_price',now(),
            '$product_status')";
            $result_query = mysqli_query($conn,$insert_product);
            if($result_query){
                echo "<script>alert('Successfully inserted the product')</script>";
            }
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Css file -->
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <!-- Product Description -->
    <div class="container mt-3 w-50 m-auto">
        <h1 class="text-center">Insert Product</h1>
        <!-- form -->
        <form action="" method= "post" enctype="multipart/form-data">
            <div class="form-outline mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" class="form-control" id="product_title" placeholder="Enter your product title" autocomplete="off" required>
            </div>
        <!-- Description -->
        <div class="form-outline mb-4">
            <label for="Description" class="form-label">Product Description</label>
            <input type="text" name="product_description" class="form-control" id="Description" placeholder="Enter product Description" autocomplete="off" required>
        </div>
        <!-- keywords -->
        <div class="form-outline mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_keywords" class="form-control" id="product_keywords" placeholder="Enter product keywords" autocomplete="off" required>
        </div>
        <!-- Select category -->
        <div class="form-outline mb-4">
            <select name="product_category" id="" class="form-select">
            <option value="value">Select category</option>
            <?php
                $select_query= "select * from `categories`";
                $result = mysqli_query($conn,$select_query);
                while($row=mysqli_fetch_assoc($result)){
                    $category_id = $row['category_id'];
                    $category_title = $row['category_title'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
            ?>
            </select>
        </div>
        <!-- select brands -->
        <div class="form-outline mb-4">
            <select name="product_brands" id="" class="form-select">
                <option value="value">Select brand</option>
                <?php
                $select_query= "select * from `brands`";
                $result = mysqli_query($conn,$select_query);
                while($row=mysqli_fetch_assoc($result)){
                    $brand_id = $row['brand_id'];
                    $brand_title = $row['brand_title'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
            ?>
                
            </select>
        </div>
        <!-- Image1 -->
        <div class="form-outline mb-4">
            <label for="product_image1" class="form-label">Product image 1</label>
            <input type="file" name="product_image1" class="form-control" id="product_image1" required>
        </div>
        <!-- Image2 -->
        <div class="form-outline mb-4">
            <label for="product_image2" class="form-label">Product image 2</label>
            <input type="file" name="product_image2" class="form-control" id="product_image2" required>
        </div>
        <!-- Image3 -->
        <div class="form-outline mb-4">
            <label for="product_image3" class="form-label">Product image 3</label>
            <input type="file" name="product_image3" class="form-control" id="product_image3" required>
        </div>
        <!-- Product Price -->
        <div class="form-outline mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" class="form-control" id="product_price" placeholder="Enter product price" autocomplete="off" required>
        </div>
        <div class="form-outline mb-6">
            <input type="submit" name="insert_product" class="btn btn-info" value="Insert Products">
        </div>
        </form>
    


















 <!-- Bootstrap Javascript link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
</body>
</html>