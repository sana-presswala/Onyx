<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

$user_ip=getIPAddress();
$total_price=0;
$total_points=0;
$cart_price_query="SELECT * FROM shopping_cart WHERE ip_address='$user_ip'";
$result_cart_price=mysqli_query($con,$cart_price_query);
$invoice_number=mt_rand();
$status=1;
$count_products=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];
    $select_products="SELECT* FROM inventory WHERE inv_id=$product_id";
    $run_price=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['price_after_discount']);
        $product_price_sum=array_sum($product_price);
        $total_price+=$product_price_sum;
    }
}


$get_cart="select * from shopping_cart";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}

if($subtotal!=0){
$insert_orders="INSERT INTO past_orders(user_id,amount_due,invoice_number,total_products,order_date,order_status) values ($user_id,$subtotal,$invoice_number,$count_products,NOW(),$status)";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
    echo "<script>alert('Order was submitted sccessfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
}else{
    echo "<script>window.open('profile.php','_self')</script>";
}

$empty_cart="DELETE from shopping_cart where ip_address='$user_ip'";
$result_query_empty_cart=mysqli_query($con,$empty_cart);
}
?>

