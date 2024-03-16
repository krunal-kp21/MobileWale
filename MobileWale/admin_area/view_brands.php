<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="table-info">
        <tr>
            <th>Sr No</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="table-secondary text-light">
        <?php

$select_brand = "select * from `brands`";
$result = mysqli_query($conn,$select_brand);
$number=0;
while($row=mysqli_fetch_array($result)){
    $brand_id = $row['brand_id'];
    $brand_title =$row['brand_title'];
    $number++;



?>
        <tr>
            <td><?php echo $number ; ?></td>
            <td><?php echo $brand_title ; ?></td>
            <td><a href='index.php?edit_brand=<?php echo $brand_id ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id ?>'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
}

?>
    </tbody>
</table>