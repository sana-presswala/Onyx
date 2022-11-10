<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
</head>
<body>
<?php
$username=$_SESSION['username'];
$get_user="SELECT * FROM user_ WHERE username='$username'";
$result=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];
?>

<h3 class="text-center mb-4">All Orders</h3>
<table class="table table-bordered border-dark table-striped border-color-dark mt-5">
    <thead>
    <tr>
        <th>S.no</th>
        <th>Amount</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Status</th>
        <th>Confirm Order</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $get_order_details="SELECT * FROM past_orders WHERE user_id=$user_id";
            $result_orders=mysqli_query($con,$get_order_details);
            $number=0;
            while($row_data=mysqli_fetch_assoc($result_orders)){
                $number++;
                $order_id=$row_data['order_id'];
                $amount_due=$row_data['amount_due'];
                $total_products=$row_data['total_products'];
                $invoice_number=$row_data['invoice_number'];
                $order_status=$row_data['order_status'];


                $order_date=$row_data['order_date'];
                $order_id=$row_data['order_id'];

                $select_query_status="SELECT * FROM order_status where status_id=$order_status";
                $result_status=mysqli_query($con,$select_query_status);
                $row_status=mysqli_fetch_assoc($result_status);
                $order_status_words=$row_status['status'];
                echo "<tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$total_products</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                    <td>$order_status_words</td>";
                    if($order_status==1){
                    echo "<td><a href='confirm_payment.php?order_id=$order_id' style='color:black'>confirm</a></td>
                    </tr>";
                    }else{
                    echo "<td>Paid</td>
                    </tr>";
                        
                    }
            }
        ?>
    </tbody>
</table>
</body>
</html>