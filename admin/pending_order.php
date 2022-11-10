<h2 class="text-center mb-4">Pending Orders</h2>
<table class="table table-bordered border-dark table-striped border-color-dark mt-5">
    <thead>
    <tr>
        <th>S.no</th>
        <th>Invoice Number</th>
        <th>Username</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Order Date</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include('../includes/connect.php');
    $get_orders="SELECT * FROM past_orders where order_status=1";
    $result=mysqli_query($con,$get_orders);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $number++;
        $order_id=$row['order_id'];
        $user_id=$row['user_id'];
        $invoice_number=$row['invoice_number'];
        $amount_due=$row['amount_due'];
        $total_products=$row['total_products'];
        $invoice_number=$row['invoice_number'];
        $order_date=$row['order_date'];
        $order_status=$row['order_status'];
        $select_user="SELECT * FROM user_ WHERE user_id=$user_id";
        $result_user=mysqli_query($con,$select_user);
        $user_row=mysqli_fetch_assoc($result_user);
        $username=$user_row['username'];
        echo "
        <tr>
        <td>$number</td>
        <td>$invoice_number</td>
        <td>$username</td>
        <td>$amount_due</td>
        <td>$total_products</td>
        <td>$order_date</td>
        <td><a href='index.php?delete_order=$order_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
    }
    ?>
    </tbody>
</table>