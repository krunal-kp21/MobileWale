<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="table-info">
        <?php
$get_users = "select * from `user_table`";
$result = mysqli_query($conn,$get_users);
$row_count=mysqli_num_rows($result);


if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No users in List</h2>";
}else{
    echo " <tr>
<th>SrNo</th>
<th>User Name</th>
<th>User Email</th>
<th>User Address</th>
<th>User Mobile</th>
<th>Delete</th>
</tr>
</thead>
<tbody class='table-secodary'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id = $row_data['user_id'];
        $user_name = $row_data['user_name'];
        $user_email = $row_data['user_email'];
        $user_address = $row_data['user_address'];
        $user_mobile = $row_data['user_mobile'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$user_name</td>
        <td>$user_email</td>
        <td>$user_address</td>
        <td>$user_mobile</td>
        <td><a href='index.php?delete_user=$user_id'><i class='fa-solid fa-trash'></i></a></td>
    </tr> ";
    }

}
?>
        
        
    </tbody>
</table>