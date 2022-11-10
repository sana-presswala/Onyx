<?php
include('../includes/connect.php');
if(isset($_GET['delete_categories'])){
    $edit_id=$_GET['delete_categories'];
    $get_data="DELETE FROM category where ctgry_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    if($result){
        echo "<script>alert('Category deleted successfully')</script>";
        echo"<script>window.open('./index.php?view_categories','_self')</script>";
    }else{
        echo "unsuccessful";
    }
}
?>
