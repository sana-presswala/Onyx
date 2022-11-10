<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="SELECT * FROM past_orders WHERE order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount=$row_fetch['amount_due'];
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']?></title>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<body style="background-color:#f6e0b5">
    <h1 class="text-center">Confirm Payment</h1>
   <div class="container my-5">
    <form action="" method="POST">
        <div class="form-outline mt-2 m-auto w-50">
            <label for="invoice_number" class="form-label">Invoice Number:</label>
            <input type="text" id="invoice_number" class="form-control" name="invoice_number" required value="<?php echo $invoice_number; ?>">
        </div>
        <div class="form-outline mt-2 m-auto w-50">
        <label for="amount" class="form-label">Amount:</label>
            <input type="text" id="amount" class="form-control"  name="amount" required value="<?php echo $amount; ?>">
        </div>
        <div class="form-outline my-4 m-auto w-50">
            <select name="payment_mode" class="form-select m-auto">
                <option value="">Select Payment Mode</option>
                <option value="">UPI</option>
                <option value="">Netbanking</option>
                <option value="">Paypal</option>
                <option value="">Cash on Delivery</option>
                <option value="">Credit/Debit card</option>
            </select>
        </div>
        <div class="form-outline my-4 text-center m-auto">
            <input type="submit" style='background-color:#eea990; border-color:#aa6f73' class="py-2 px-4" value="Confirm Payment" name="Confirm">
        </div>
    </form>
   </div>

<?php
if(isset($_POST['Confirm'])){
    $update_query="Update past_orders set order_status=2 WHERE order_id=$order_id";
    $result_query=mysqli_query($con,$update_query);
    if($result_query){
        echo "<script>alert('Payment confirmed successfully')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    }

}
?>
    


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>