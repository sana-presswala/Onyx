<?php
include('../includes/connect.php');
if(isset($_GET['delete_user'])){
    $edit_id=$_GET['delete_user'];
    $get_data="DELETE FROM user_ where user_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    if($result){
        echo "<script>alert('User deleted successfully')</script>";
        echo"<script>window.open('./index.php?all_users','_self')</script>";
    }else{
        echo "unsuccessful";
    }
}
?>