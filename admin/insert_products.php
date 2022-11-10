<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['description'];
    $category=$_POST['product_categories'];
    $manufacturer=$_POST['product_Manufacturer'];
    $stock=$_POST['items_in_stock'];
    $costprice=$_POST['cost_price'];
    $selprice=$_POST['Price_after_discount'];
    $mrp=$_POST['mrp'];
    $points=$_POST['Points'];
    
    $img1=$_FILES['img_1']['name'];
    $img2=$_FILES['img_2']['name'];
    $img3=$_FILES['img_3']['name'];

    $temp_img1=$_FILES['img_1']['tmp_name'];
    $temp_img2=$_FILES['img_2']['tmp_name'];
    $temp_img3=$_FILES['img_3']['tmp_name'];

    if($img1=='' or $selprice=='' or $stock=='' or $costprice=='' or $selprice=='' or $product_title=='' or $product_description=='' or $category=='' or $manufacturer==''){
        echo "<script>alert('please fill all the compulsory fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_img1,"./product_images/$img1");
        move_uploaded_file($temp_img2,"./product_images/$img2");
        move_uploaded_file($temp_img3,"./product_images/$img3");
        
        $insert_query="INSERT INTO inventory(Product_name,Product_description,MRP,Cost_price,price_after_discount,past_sale,img1,img2,img3,items_in_stock,points,category_id,manufacturer_id) 
        VALUES ('$product_title','$product_description','$mrp','$costprice','$selprice',0,'$img1','$img2','$img3','$stock','$points','$category','$manufacturer')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Product successfully added')</script>";
        }else{
            echo "<script>alert('Unsuccesful. Try again')</script>";
        }
    }
}
?>

<h2 class="text-center">Insert Products</h2>
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-outline mt-4 w-50 m-auto">
        <label for="product_title" class="form-label">
        Product Title
        </label>
        <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required" >
    </div>

    <div class="form-outline mb-4 w-50 m-auto">
        <label for="description" class="form-label mt-4">
        Description
        </label>
        <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required" >
    </div>

    <div class="form-outline mb-4 w-50 m-auto">
        <select name="product_categories" id="" class="form-select">
            <option values="">Select a Category</option>
            <?php
                $select_query="SELECT * FROM category";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_title=$row['ctgry_name'];
                    $category_id=$row['ctgry_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
            ?>
        </select>
    </div>

    <div class="form-outline mb-1 w-50 m-auto">
        <select name="product_Manufacturer" id="" class="form-select">
            <option values="">Select a Manufacturer</option>
            <?php
                $select_query="SELECT * FROM manufacturer";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $man_title=$row['name'];
                    $man_id=$row['man_id'];
                    echo "<option value='$man_id'>$man_title</option>";
                }
            ?>
        </select>
    </div>

    <div class="form-outline mb-1 w-50 m-auto">
        <div class="row">
            <div class="col-3">
                <label for="img_1" class="form-label mt-4">
                    Product Image 1
                </label>
            </div>  
            <div class="col-9 mt-3">
                <input type="file" name="img_1" id="img_1" class="form-control" required="required" >
            </div>  
        </div>
    </div>

    <div class="form-outline mb-1 w-50 m-auto">
        <div class="row">
            <div class="col-3">
                <label for="img_2" class="form-label mt-4">
                    Product Image 2
                </label>
            </div>  
            <div class="col-9 mt-3">
                <input type="file" name="img_2" id="img_2" class="form-control">
            </div>  
        </div>
    </div>

    <div class="form-outline mb-1 w-50 m-auto">
        <div class="row">
            <div class="col-3">
                <label for="img_3" class="form-label mt-4">
                    Product Image 3
                </label>
            </div>  
            <div class="col-9 mt-3">
                <input type="file" name="img_3" id="img_3" class="form-control">
            </div>  
        </div>
    </div>

    <div class="form-outline mb-1 w-50 m-auto">
        <div class="row">
            <div class="col-3">
                <label for="items_in_stock" class="form-label mt-4">
                    Items In Stock
                </label>
            </div>  
            <div class="col-3 mt-3">
                <input type="text" name="items_in_stock" id="items_in_stock" class="form-control" placeholder="Enter a Number" autocomplete="off" required="required" >
            </div> 
            <div class="col-1"></div> 
            <div class="col-2">
                <label for="cost_price" class="form-label mt-4">
                    Cost Price
                </label>
            </div>  
            <div class="col-3 mt-3">
                <input type="text" name="cost_price" id="cost_price" class="form-control" placeholder="Enter a Number" autocomplete="off" required="required" >
            </div>  
        </div>
    </div>
    <div class="form-outline mb-1 w-50 m-auto">
        <div class="row">
            <div class="col-3">
                <label for="Price_after_discount" class="form-label mt-4">
                    Selling Price
                </label>
            </div>  
            <div class="col-3 mt-3">
                <input type="text" name="Price_after_discount" id="Price_after_discount" class="form-control" placeholder="Enter a Number" autocomplete="off" required="required" >
            </div>  
            <div class="col-1"></div> 
            <div class="col-2">
                <label for="mrp" class="form-label mt-4">
                    MRP
                </label>
            </div>  
            <div class="col-3 mt-3">
                <input type="text" name="mrp" id="mrp" class="form-control" placeholder="Enter a Number" autocomplete="off">
            </div>  
        </div>
    </div>
    <div class="form-outline mb-4 w-50 m-auto">
        <div class="row">
            <div class="col-3">
                <label for="Points" class="form-label mt-4">
                    Points
                </label>
            </div>  
            <div class="col-3 mt-3">
                <input type="text" name="Points" id="Points" class="form-control" placeholder="Enter a Number" autocomplete="off" required="required" >
            </div> 
            <div class="col-6"></div> 
        </div>
    </div>
    
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="insert_product" class="btn mb-3 px-4" style="background-color:#eea990; border-color:#aa6f73" placeholder="Insert Product" >
    </div>
</div>
    
    
    

</form>