<?php
include('../includes/connect.php');
if(isset($_GET['delete_man'])){
    $edit_id=$_GET['delete_man'];
    $get_data="DELETE FROM manufacturer where man_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    if($result){
        echo "<script>alert('Mnaufacturer deleted successfully')</script>";
        echo"<script>window.open('./index.php?view_man','_self')</script>";
    }else{
        echo "unsuccessful";
    }
}
?>