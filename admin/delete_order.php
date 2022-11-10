<?php
include('../includes/connect.php');
if(isset($_GET['delete_order'])){
    $edit_id=$_GET['delete_order'];
    $get_data="DELETE FROM past_orders where order_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    if($result){
        echo "<script>alert('Order deleted successfully')</script>";
        echo"<script>window.open('./index.php?all_order','_self')</script>";
    }else{
        echo "unsuccessful";
    }
}
?>