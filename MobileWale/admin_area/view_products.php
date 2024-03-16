<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="text-center text-success">All Products</h2>
    <table class="table table-bordered mt-5">
        <thead class="table-success text-center">
            
            <tr>
                <th>Product ID</th>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="table-light text-center">
        <?php
$get_product = "select * from `products`";
$result_product = mysqli_query($conn,$get_product);
$number=0;
while($row_product = mysqli_fetch_assoc($result_product)){
    $product_id = $row_product['product_id'];
    $product_title = $row_product['product_title'];
    $product_image1 = $row_product['product_image1'];
    $product_price = $row_product['product_price'];
    $status= $row_product['status'];
    $number++;
    ?>

<tr class='text-center'>
<td><?php echo $number ?></td>
<td><?php echo $product_title; ?></td>
<td><?php echo "<img src='./product_images/$product_image1' class='product_img'/>"; ?></td>
<td><?php echo $product_price; ?></td>
<td><?php
$get_count = "select * from `orders_pending` where product_id = $product_id";
$result_count = mysqli_query($conn,$get_count);
$row_count = mysqli_num_rows($result_count);
echo $row_count;

?></td>
<td><?php echo $status; ?></td>
<td><a href='index.php?edit_products=<?php echo $product_id ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
<td><a href='index.php?delete_product=<?php echo $product_id ?>'><i class='fa-solid fa-trash'></i></a></td>
</tr>
<?php
}

?>
            
        </tbody>

    </table>
</body>
</html>