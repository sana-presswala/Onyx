<?php
include('../includes/connect.php');
if(isset($_POST['insert_man'])){
    $manufacturer_name=$_POST['man_title'];

    $select_query="SELECT * FROM manufacturer WHERE name='$manufacturer_name'";
    $select_result=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($select_result);
    if($number>0){
        echo "<script>alert('Manufacturer already exists')</script>";
    }else{
        $insert_query="INSERT INTO manufacturer(name) VALUES ('$manufacturer_name')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Manufacturer successfully added')</script>";
        }
    }
}
?>


<h2 class="text-center">Insert Manufacturers</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group mb-3 w-90">
        <span class="input-group-text" id="basic-addon1"><i class="fa-sharp fa-solid fa-gem" style="color:#eea990"></i></span>
        <input type="text" class="form-control" name="man_title" placeholder="Insert Manufacturers" aria-label="Manufacturer" aria-describedby="basic-addon1"/>
    </div>
    <div class="input-group mb-3 w-10 m-auto">
        <input type="submit" style="background-color:#eea990; border-color:#aa6f73" class="p-2 my-3" name="insert_man" value="Insert Manufacturers"/>
        <!-- <button class="p-3 my-3 border-0" style="background-color:#eea990; border-color:#aa6f73">Insert Categories</button> -->
    </div>
</form>