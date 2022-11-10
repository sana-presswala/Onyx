<h2 class="text-center mb-4">All Users</h2>
<table class="table table-bordered border-dark table-striped border-color-dark mt-5">
    <thead>
    <tr>
        <th>S.no</th>
        <th>Username</th>
        <th>Email address</th>
        <th>Phone Number</th>
        <th>Points</th>
        <th>Orders placed</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include('../includes/connect.php');
    $get_user="SELECT * FROM user_";
    $result=mysqli_query($con,$get_user);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $number++;
        $user_id=$row['user_id'];
        $username=$row['username'];
        $email_add=$row['email_add'];
        $phone_number=$row['phone_number'];
        $points=$row['points'];
        $select_orders="SELECT * FROM past_orders WHERE user_id=$user_id";
        $result_orders=mysqli_query($con,$select_orders);
        $number_of_orders=mysqli_num_rows($result_orders);
        echo "
        <tr>
        <td>$number</td>
        <td>$username</td>
        <td>$email_add</td>
        <td>$phone_number</td>
        <td>$points</td>
        <td>$number_of_orders</td>
        <td><a href='index.php?delete_user=$user_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
    }
    ?>
    </tbody>
</table>