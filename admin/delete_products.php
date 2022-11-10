<?php
include('../includes/connect.php');
if(isset($_GET['delete_products'])){
    $edit_id=$_GET['delete_products'];
    $get_data="DELETE FROM `inventory` where inv_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    if($result){
        echo "<script>alert('Product deleted successfully')</script>";
        echo"<script>window.open('./index.php?view_products','_self')</script>";
    }else{
        echo "unsuccessful";
    }
}
?>
