<?php
include('../includes/connect.php');
if(isset($_GET['edit_categories'])){
    $edit_id=$_GET['edit_categories'];
    $get_data="SELECT * FROM category where ctgry_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $ctgry_name=$row['ctgry_name'];
    $category_id =$row['ctgry_id'];    
}
?>

<h2 class="text-center">Edit Category</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline mt-4 w-50 m-auto">
        <label for="category_title" class="form-label">
            Category Title
        </label>
        <input type="text" name="category_title" id="category_title" class="form-control" value="<?php echo $ctgry_name ?>" autocomplete="off" required="required" >
    </div>  
    <div class="form-outline mb-4 my-4 w-50 m-auto">
        <input type="submit" name="edit_category" class="btn mb-3 px-4" style="background-color:#eea990; border-color:#aa6f73" placeholder="Edit Product" >
    </div>
</div>
</form>


<?php
if(isset($_POST['edit_category'])){
    $category_name=$_POST['category_title'];
    if($category_name==""){
        echo "<script>alert('Please fill all the neccessary fields')</script>";
    }else{
        $update_category="UPDATE category set ctgry_name='$category_name' where ctgry_id=$edit_id";
        $result_update=mysqli_query($con,$update_category);
        if($result_update){
            echo "<script>alert('Category updated successfully')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
        }
    }
}
?>