<?php
include('../includes/connect.php');
if(isset($_GET['edit_complaint'])){
    $edit_id=$_GET['edit_complaint'];
    $get_data="UPDATE complaints set complaint_status=2 where complaint_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    if($result){
        echo "<script>alert('Complaint Marked as resolved successfully')</script>";
        echo"<script>window.open('./index.php?complaints','_self')</script>";
    }else{
        echo "unsuccessful";
    }
}
?>