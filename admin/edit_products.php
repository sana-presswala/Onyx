<?php
include('../includes/connect.php');
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="SELECT * FROM `inventory` where inv_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_name=$row['Product_name'];
    $Product_description=$row['Product_description'];
    $category_id =$row['category_id'];
    $manufacturer_id=$row['manufacturer_id'];
    $img1=$row['img1'];
    $img2=$row['img2'];
    $img3=$row['img3'];
    $items_in_stock=$row['items_in_stock'];
    $cost_price=$row['Cost_price'];
    $price_after_discount=$row['price_after_discount'];
    $MRP=$row['MRP'];
    $points=$row['points'];
    
}
?>

<h2 class="text-center">Edit Product</h2>
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-outline mt-4 w-50 m-auto">
        <label for="product_title" class="form-label">
            Product Title
        </label>
        <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $product_name ?>" autocomplete="off" required="required" >
    </div>

    <div class="form-outline mb-4 w-50 m-auto">
        <label for="description" class="form-label mt-4">
        Description
    </label>
    <input type="text" name="description" id="description" class="form-control" value="<?php echo $Product_description ?>" autocomplete="off" required="required" >
</div>

<div class="form-outline mb-4 w-50 m-auto">
    <select name="product_categories" id="" class="form-select">
        <?php $select_query_temp="SELECT * FROM category where ctgry_id=$category_id";
                $result_query_temp=mysqli_query($con,$select_query_temp);
                $row_temp=mysqli_fetch_assoc($result_query_temp);
                $category_title=$row_temp['ctgry_name'];
                ?>
            <option values="<?php echo $category_id?>"><?php echo $category_title ?></option>
            <?php
                $select_query="SELECT * FROM category where ctgry_id!=$category_id";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_title=$row['ctgry_name'];
                    $category_id1=$row['ctgry_id'];
                    echo "<option value='$category_id1'>$category_title</option>";
                }
            ?>
        </select>
    </div>
    
    <div class="form-outline mb-1 w-50 m-auto">
        <select name="product_Manufacturer" id="" class="form-select">
            <?php $select_query_temp="SELECT * FROM manufacturer where man_id=$manufacturer_id";
                $result_query_temp=mysqli_query($con,$select_query_temp);
                $row_temp=mysqli_fetch_assoc($result_query_temp);
                $man_title=$row_temp['name'];
                ?>
            <option values="<?php echo $manufacturer_id ?>"><?php echo $man_title ?></option>
            <?php
                $select_query="SELECT * FROM manufacturer where man_id!=$manufacturer_id";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $man_title=$row['name'];
                    $man_id1=$row['man_id'];
                    echo "<option value='$man_id1'>$man_title</option>";
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
                <input type="file" name="img_1" id="img_1" class="form-control">
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
                <input type="text" name="items_in_stock" id="items_in_stock" class="form-control" value="<?php echo $items_in_stock ?>" autocomplete="off" required="required" >
            </div> 
            <div class="col-1"></div> 
            <div class="col-2">
                <label for="cost_price" class="form-label mt-4">
                    Cost Price
                </label>
            </div>  
            <div class="col-3 mt-3">
                <input type="text" name="cost_price" id="cost_price" class="form-control" value="<?php echo $cost_price ?>" autocomplete="off" required="required" >
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
                <input type="text" name="Price_after_discount" id="Price_after_discount" class="form-control" value="<?php echo $price_after_discount ?>" autocomplete="off" required="required" >
            </div>  
            <div class="col-1"></div> 
            <div class="col-2">
                <label for="mrp" class="form-label mt-4">
                    MRP
                </label>
            </div>  
            <div class="col-3 mt-3">
                <input type="text" name="mrp" id="mrp" class="form-control" value="<?php echo $MRP ?>" autocomplete="off">
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
                <input type="text" name="Points" id="Points" class="form-control" value="<?php echo $points ?>" autocomplete="off" required="required" >
            </div> 
            <div class="col-6"></div> 
        </div>
    </div>
    
    <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="edit_product" class="btn mb-3 px-4" style="background-color:#eea990; border-color:#aa6f73" placeholder="Edit Product" >
    </div>
</div>
</form>


<?php
if(isset($_POST['edit_product'])){
    $product_name=$_POST['product_title'];
    $Product_description=$_POST['description'];
    $category_id =$_POST['product_categories'];
    $manufacturer_id=$_POST['product_Manufacturer'];
    // $img1=$_POST['img1'];
    // $img2=$_POST['img2'];
    // $img3=$_POST['img3'];
    $items_in_stock=$_POST['items_in_stock'];
    $cost_price=$_POST['cost_price'];
    $price_after_discount=$_POST['Price_after_discount'];
    $MRP=$_POST['mrp'];
    $points=$_POST['Points'];

    if($product_name=="" || $Product_description=="" || $category_id=='' || $manufacturer_id==''||
    $items_in_stock=='' || $cost_price=='' || $price_after_discount=='' || $points==''){
        echo "<script>alert('Please fill all the neccessary fields')</script>";
    }else{
        $update_product="UPDATE inventory set Product_name='$product_name',Product_description='$Product_description',
        items_in_stock=$items_in_stock,Cost_price=$cost_price,
        price_after_discount=$price_after_discount,MRP=$MRP,points=$points where inv_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }
}
?>