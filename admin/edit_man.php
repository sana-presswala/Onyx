<?php
include('../includes/connect.php');
if(isset($_GET['edit_man'])){
    $edit_id=$_GET['edit_man'];
    $get_data="SELECT * FROM manufacturer where man_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $man_id=$row['man_id'];    
}
?>

<h2 class="text-center">Edit Manufacturer</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mt-4 w-50 m-auto">
        <label for="category_title" class="form-label">
            Manufacturer name
        </label>
        <input type="text" name="man_title" id="man_title" class="form-control" value="<?php echo $name ?>" autocomplete="off" required="required" >
    </div>  
    <div class="form-outline mb-4 my-4 w-50 m-auto">
        <input type="submit" name="edit_man" class="btn mb-3 px-4" style="background-color:#eea990; border-color:#aa6f73" placeholder="Edit Product" >
    </div>
</div>
</form>


<?php
if(isset($_POST['edit_man'])){
    $man_name=$_POST['man_title'];
    if($man_name==""){
        echo "<script>alert('Please fill all the neccessary fields')</script>";
    }else{
        $update_man="UPDATE manufacturer set name='$man_name' where man_id=$edit_id";
        $result_update=mysqli_query($con,$update_man);
        if($result_update){
            echo "<script>alert('Manufacturer updated successfully')</script>";
            echo "<script>window.open('index.php?view_man','_self')</script>";
        }
    }
}
?>