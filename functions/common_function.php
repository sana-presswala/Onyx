<?php
// include('./includes/connect.php');


function getProducts(){
    global $con;

    if(!isset($_GET['category']) && !isset($_GET['manufacturer'])){
    $select_query="SELECT * FROM inventory ORDER BY rand() LIMIT 0,12";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['inv_id'];
    $Product_name=$row['Product_name'];
    $Product_description=$row['Product_description'];
    $MRP=$row['MRP'];
    $price_after_discount=$row['price_after_discount'];
    $img1=$row['img1'];
    $Ratings=$row['Ratings'];
    $category_id=$row['category_id'];
    $manufacturer_id=$row['manufacturer_id'];
            
    if($MRP==0){
    echo "<div class='col-md-3 mb-4'>
          <div class='card' style='width: 18rem;'>
            <img src='./admin/product_images/$img1' class='card-img-top' alt='$Product_name' style='width:100%;height:200px;object-fit: contain;'>
            <div class='card-body'>
              <h5 class='card-title text-truncate'>$Product_name</h5>
              <p class='card-text text-truncate'>$Product_description</p>
            </div>
            <ul class='list-group list-group-flush'>
              <li class='list-group-item'>RS. $price_after_discount</li>";
    }else{
        echo "<div class='col-md-3 mb-4'>
        <div class='card' style='width: 18rem;'>
            <img src='./admin/product_images/$img1' class='card-img-top' alt='$Product_name' style='width:100%;height:200px;object-fit: contain;'>
            <div class='card-body'>
            <h5 class='card-title text-truncate'>$Product_name</h5>
            <p class='card-text text-truncate'>$Product_description</p>
            </div>
            <ul class='list-group list-group-flush'>
            <li class='list-group-item'>RS. $price_after_discount <s style='color:grey'>RS. $MRP</s></li>";
            }
        if($Ratings!=""){
        echo "<li class='list-group-item'>$Ratings/5</li>";
        }
        echo"</ul>
        <div class='card-body'>
          <a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:#eea990; border-color:#aa6f73'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>More Info</a>
        </div>
        </div>
        </div>"; 
    }
    }
}


function getrelatedProducts(){
    global $con;

    if(!isset($_GET['category']) && !isset($_GET['manufacturer'])){
    $select_query="SELECT * FROM inventory ORDER BY rand() LIMIT 0,4";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['inv_id'];
    $Product_name=$row['Product_name'];
    $Product_description=$row['Product_description'];
    $MRP=$row['MRP'];
    $price_after_discount=$row['price_after_discount'];
    $img1=$row['img1'];
    $Ratings=$row['Ratings'];
    $category_id=$row['category_id'];
    $manufacturer_id=$row['manufacturer_id'];
            
    if($MRP==0){
    echo "<div class='col-md-3 mb-4'>
          <div class='card' style='width: 18rem;'>
            <img src='./admin/product_images/$img1' class='card-img-top' alt='$Product_name' style='width:100%;height:200px;object-fit: contain;'>
            <div class='card-body'>
              <h5 class='card-title text-truncate'>$Product_name</h5>
              <p class='card-text text-truncate'>$Product_description</p>
            </div>
            <ul class='list-group list-group-flush'>
              <li class='list-group-item'>RS. $price_after_discount</li>";
    }else{
        echo "<div class='col-md-3 mb-4'>
        <div class='card' style='width: 18rem;'>
            <img src='./admin/product_images/$img1' class='card-img-top' alt='$Product_name' style='width:100%;height:200px;object-fit: contain;'>
            <div class='card-body'>
            <h5 class='card-title text-truncate'>$Product_name</h5>
            <p class='card-text text-truncate'>$Product_description</p>
            </div>
            <ul class='list-group list-group-flush'>
            <li class='list-group-item'>RS. $price_after_discount <s style='color:grey'>RS. $MRP</s></li>";
            }
        if($Ratings!=""){
        echo "<li class='list-group-item'>$Ratings/5</li>";
        }
        echo"</ul>
        <div class='card-body'>
          <a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:#eea990; border-color:#aa6f73'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>More Info</a>
        </div>
        </div>
        </div>"; 
    }
    }
}


function getAllProducts(){
    global $con;

    if(!isset($_GET['category']) && !isset($_GET['manufacturer'])){
    $select_query="SELECT * FROM inventory ORDER BY rand()";
    $result_query=mysqli_query($con,$select_query);
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['inv_id'];
    $Product_name=$row['Product_name'];
    $Product_description=$row['Product_description'];
    $MRP=$row['MRP'];
    $price_after_discount=$row['price_after_discount'];
    $img1=$row['img1'];
    $Ratings=$row['Ratings'];
    $category_id=$row['category_id'];
    $manufacturer_id=$row['manufacturer_id'];
            
    if($MRP==0){
    echo "<div class='col-md-3 mb-4'>
          <div class='card' style='width: 18rem;'>
            <img src='./admin/product_images/$img1' class='card-img-top' alt='$Product_name' style='width:100%;height:200px;object-fit: contain;'>
            <div class='card-body'>
              <h5 class='card-title text-truncate'>$Product_name</h5>
              <p class='card-text text-truncate text-truncate'>$Product_description</p>
            </div>
            <ul class='list-group list-group-flush'>
              <li class='list-group-item'>RS. $price_after_discount</li>";
    }else{
        echo "<div class='col-md-3 mb-4'>
        <div class='card' style='width: 18rem;'>
            <img src='./admin/product_images/$img1' class='card-img-top' alt='$Product_name' style='width:100%;height:200px;object-fit: contain;'>
            <div class='card-body'>
            <h5 class='card-title text-truncate'>$Product_name</h5>
            <p class='card-text text-truncate text-truncate'>$Product_description</p>
            </div>
            <ul class='list-group list-group-flush'>
            <li class='list-group-item'>RS. $price_after_discount <s style='color:grey'>RS. $MRP</s></li>";
            }
        if($Ratings!=""){
        echo "<li class='list-group-item'>$Ratings/5</li>";
        }
        echo"</ul>
        <div class='card-body'>
          <a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:#eea990; border-color:#aa6f73'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>More Info</a>
        </div>
        </div>
        </div>";
    }
    }
}


function getUniqueCtgry(){
    global $con;

    if(isset($_GET['category'])){
    $category_id=$_GET['category'];
    $select_query="SELECT * FROM inventory WHERE category_id='$category_id'";
    $result_query=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_query);
    if($number==0){
        echo "<h4 style='text-align:center; color:#de4343'>Unfortunatey, no products exist for this category yet</h4>";
    }else{
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['inv_id'];
    $Product_name=$row['Product_name'];
    $Product_description=$row['Product_description'];
    $MRP=$row['MRP'];
    $price_after_discount=$row['price_after_discount'];
    $img1=$row['img1'];
    $Ratings=$row['Ratings'];
    $category_id=$row['category_id'];
    $manufacturer_id=$row['manufacturer_id'];
            
    if($MRP==0){
    echo "<div class='col-md-3 mb-4'>
          <div class='card' style='width: 18rem;'>
            <img src='./admin/product_images/$img1' class='card-img-top' alt='$Product_name' style='width:100%;height:200px;object-fit: contain;'>
            <div class='card-body'>
              <h5 class='card-title text-truncate'>$Product_name</h5>
              <p class='card-text text-truncate text-truncate'>$Product_description</p>
            </div>
            <ul class='list-group list-group-flush'>
              <li class='list-group-item'>RS. $price_after_discount</li>";
    }else{
        echo "<div class='col-md-3 mb-4'>
        <div class='card' style='width: 18rem;'>
            <img src='./admin/product_images/$img1' class='card-img-top' alt='$Product_name' style='width:100%;height:200px;object-fit: contain;'>
            <div class='card-body'>
            <h5 class='card-title text-truncate'>$Product_name</h5>
            <p class='card-text text-truncate text-truncate'>$Product_description</p>
            </div>
            <ul class='list-group list-group-flush'>
            <li class='list-group-item'>RS. $price_after_discount <s style='color:grey'>RS. $MRP</s></li>";
            }
        if($Ratings!=""){
        echo "<li class='list-group-item'>$Ratings/5</li>";
        }
        echo"</ul>
        <div class='card-body'>
          <a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:#eea990; border-color:#aa6f73'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>More Info</a>
        </div>
        </div>
        </div>";
    }
    }}
}


function getUniqueManufacturer(){
    global $con;

    if(isset($_GET['manufacturer'])){
    $manufacturer_id=$_GET['manufacturer'];
    $select_query="SELECT * FROM inventory WHERE manufacturer_id='$manufacturer_id'";
    $result_query=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_query);
    if($number==0){
        echo "<h4 style='text-align:center; color:#de4343'>Unfortunatey, no products exist for this manufacturer yet</h4>";
    }else{
    while($row=mysqli_fetch_assoc($result_query)){
    $product_id=$row['inv_id'];
    $Product_name=$row['Product_name'];
    $Product_description=$row['Product_description'];
    $MRP=$row['MRP'];
    $price_after_discount=$row['price_after_discount'];
    $img1=$row['img1'];
    $Ratings=$row['Ratings'];
    $category_id=$row['category_id'];
    $manufacturer_id=$row['manufacturer_id'];
            
    if($MRP==0){
    echo "<div class='col-md-3 mb-4'>
          <div class='card' style='width: 18rem;'>
            <img src='./admin/product_images/$img1' class='card-img-top' alt='$Product_name' style='width:100%;height:200px;object-fit: contain;'>
            <div class='card-body'>
              <h5 class='card-title text-truncate'>$Product_name</h5>
              <p class='card-text text-truncate'>$Product_description</p>
            </div>
            <ul class='list-group list-group-flush'>
              <li class='list-group-item'>RS. $price_after_discount</li>";
    }else{
        echo "<div class='col-md-3 mb-4'>
        <div class='card' style='width: 18rem;'>
            <img src='./admin/product_images/$img1' class='card-img-top' alt='$Product_name' style='width:100%;height:200px;object-fit: contain;'>
            <div class='card-body'>
            <h5 class='card-title text-truncate'>$Product_name</h5>
            <p class='card-text text-truncate'>$Product_description</p>
            </div>
            <ul class='list-group list-group-flush'>
            <li class='list-group-item'>RS. $price_after_discount <s style='color:grey'>RS. $MRP</s></li>";
            }
        if($Ratings!=""){
        echo "<li class='list-group-item'>$Ratings/5</li>";
        }
        echo"</ul>
        <div class='card-body'>
          <a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:#eea990; border-color:#aa6f73'>Add to cart</a>
          <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>More Info</a>
        </div>
        </div>
        </div>";
    }
    }}
}

function getCategories(){
    global $con;
    $select_categories="SELECT * FROM category";
    $result_categories=mysqli_query($con,$select_categories);
    while($row_data=mysqli_fetch_assoc($result_categories)){
      $category_name=$row_data['ctgry_name'];
      $category_id=$row_data['ctgry_id'];
      echo "<li><a class='dropdown-item' href='index.php?category=$category_id'>$category_name</a></li>";
    }
}

function getManufacturers(){
    global $con;
    $select_manufacturer="SELECT * FROM manufacturer";
    $result_manufacturer=mysqli_query($con,$select_manufacturer);
    while($row_data=mysqli_fetch_assoc($result_manufacturer)){
      $manufacturer_name=$row_data['name'];
      $manufacturer_id=$row_data['man_id'];
      echo "<li><a class='dropdown-item' href='index.php?manufacturer=$manufacturer_id'>$manufacturer_name</a></li>";
    }
}


function searchProduct(){
    global $con;
    if(isset($_GET['search_data_product'])){
      $search_data_value=$_GET['search_data'];
      $select_query="SELECT * FROM inventory where Product_name like '%$search_data_value%' or Product_description like '%$search_data_value%'";
      $result_query=mysqli_query($con,$select_query);
      $number=mysqli_num_rows($result_query);
      if($number==0){
          echo "<h4 style='text-align:center; color:#de4343'>No products match your search, try searching something else</h4>";
      }else{
      while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['inv_id'];
      $Product_name=$row['Product_name'];
      $Product_description=$row['Product_description'];
      $MRP=$row['MRP'];
      $price_after_discount=$row['price_after_discount'];
      $img1=$row['img1'];
      $Ratings=$row['Ratings'];
      $category_id=$row['category_id'];
      $manufacturer_id=$row['manufacturer_id'];
              
      if($MRP==0){
      echo "<div class='col-md-3 mb-4'>
            <div class='card' style='width: 18rem;'>
              <img src='./admin/product_images/$img1' class='card-img-top' alt='$Product_name' style='width:100%;height:200px;object-fit: contain;'>
              <div class='card-body'>
                <h5 class='card-title text-truncate'>$Product_name</h5>
                <p class='card-text text-truncate'>$Product_description</p>
              </div>
              <ul class='list-group list-group-flush'>
                <li class='list-group-item'>RS. $price_after_discount</li>";
      }else{
          echo "<div class='col-md-3 mb-4'>
          <div class='card' style='width: 18rem;'>
              <img src='./admin/product_images/$img1' class='card-img-top' alt='$Product_name' style='width:100%;height:200px;object-fit: contain;'>
              <div class='card-body'>
              <h5 class='card-title text-truncate'>$Product_name</h5>
              <p class='card-text text-truncate'>$Product_description</p>
              </div>
              <ul class='list-group list-group-flush'>
              <li class='list-group-item'>RS. $price_after_discount <s style='color:grey'>RS. $MRP</s></li>";
              }
          if($Ratings!=""){
          echo "<li class='list-group-item'>$Ratings/5</li>";
          }
          echo"</ul>
          <div class='card-body'>
            <a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:#eea990; border-color:#aa6f73'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>More Info</a>
          </div>
          </div>
          </div>";
      }
    }
  }
}


function displayProduct(){
  global $con;
  if(isset($_GET['product_id'])){
  if(!isset($_GET['category']) && !isset($_GET['manufacturer'])){
    $product_id=$_GET['product_id'];
    $select_query="SELECT * FROM inventory where inv_id=$product_id";
    $result_query=mysqli_query($con,$select_query);
    $row=mysqli_fetch_assoc($result_query);
    $Product_name=$row['Product_name'];
    $Product_description=$row['Product_description'];
    $MRP=$row['MRP'];
    $price_after_discount=$row['price_after_discount'];
    $img1=$row['img1'];
    $img2=$row['img2'];
    $img3=$row['img3'];
    $Ratings=$row['Ratings'];
    $category_id=$row['category_id'];
    $manufacturer_id=$row['manufacturer_id'];
    $manufacturer_query="SELECT * FROM manufacturer where man_id=$manufacturer_id";
    $result_man_query=mysqli_query($con,$manufacturer_query);
    $man_row=mysqli_fetch_assoc($result_man_query);
    $man_name=$man_row['name'];

    echo "<div class='col-4'>
    <div id='carouselExampleDark' class='carousel carousel-dark slide' data-bs-ride='carousel'>
    <div class='carousel-indicators'>
        <button type='button' data-bs-target='#carouselExampleDark' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
        <button type='button' data-bs-target='#carouselExampleDark' data-bs-slide-to='1' aria-label='Slide 2'></button>
        <button type='button' data-bs-target='#carouselExampleDark' data-bs-slide-to='2' aria-label='Slide 3'></button>
    </div>
    <div class='carousel-inner'>
        <div class='carousel-item active'>
        <img src='./admin/product_images/$img1' class='d-block w-100' style='height:60vh;' alt=''>
        </div>";

        if($img2!=""){
        echo" <div class='carousel-item'>
        <img src='./admin/product_images/$img2' class='d-block w-100' style='height:60vh;' alt=''>
        </div>";
        }
        if($img3!=""){
        echo "<div class='carousel-item'>
        <img src='./admin/product_images/$img3' style='height:60vh;' class='d-block w-100' alt=''>
        </div>";
        }
    echo "</div>
    <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleDark' data-bs-slide='prev'>
        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
        <span class='visually-hidden'>Previous</span>
    </button>
    <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleDark' data-bs-slide='next'>
        <span class='carousel-control-next-icon' aria-hidden='true'></span>
        <span class='visually-hidden'>Next</span>
    </button>
    </div> 
    </div>
    <div class='col-6 px-30 m-auto'>
    <div class='row'><h1>$Product_name</h1></div>
    <div class='row'><h4>by $man_name</h4><br><br></div>
    <div class='row'><p>$Product_description</p></div>";

    if($Ratings!=""){
      echo "<div class='row'><p>Ratings: $Ratings/5</p></div>";
    }
    if($MRP!=0){
      echo"<div class='row'><p>RS. $price_after_discount <s style='color:grey'>MRP RS. $MRP</s></p><br><br></div>";
    }else{
      echo"<div class='row'><p>RS. $price_after_discount</p><br><br></div>";
    }
    echo"<div class='row pl-50'><div class='col-6'><a href='index.php?add_to_cart=$product_id' class='btn' style='background-color:#eea990; border-color:#aa6f73;font-size=150%'>Add to cart</a></div></div>
        </div>";
    }
    }
  }


function getIPAddress() {    
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


function cart(){
if(isset($_GET['add_to_cart'])){
  global $con;
  $get_ip=getIPAddress();
  $get_product_id=$_GET['add_to_cart'];
  $select_query="SELECT * FROM shopping_cart WHERE ip_address='$get_ip' AND product_id=$get_product_id";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows>0){
    echo "<script> alert('This is item already present inside cart ')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
  else{
  $insert_query="INSERT INTO shopping_cart(product_id,ip_address,quantity) VALUES ('$get_product_id','$get_ip',1)";
  $result_query=mysqli_query($con,$insert_query);
  echo "<script>alert('Item successfully added to cart')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}
}
}


function cart_item(){
if(isset($_GET['add_to_cart'])){
  global $con;
  $get_ip=getIPAddress();
  $select_query="SELECT * FROM shopping_cart WHERE ip_address='$get_ip'";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
}else{
  global $con;
  $get_ip=getIPAddress();
  $select_query="SELECT * FROM shopping_cart WHERE ip_address='$get_ip'";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
}
echo $num_of_rows;
}

function total_cart_price(){
  global $con;
  $get_ip_add=getIPAddress();
  $total=0;
  $cart_query="SELECT * FROM shopping_cart WHERE ip_address='$get_ip_add'";
  $result=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_products="SELECT * FROM inventory WHERE inv_id='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
      $product_price=array($row_product_price['price_after_discount']);
      $product_values=array_sum($product_price);
      $total+=$product_values;
    }
  }
  echo $total;
}


function get_order_details(){
  global $con;
  $username=$_SESSION['username'];
  $get_details="SELECT * FROM user_ WHERE username='$username'";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array($result_query)){
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['all_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_orders="SELECT * FROM past_orders WHERE user_id=$user_id AND order_status=1";
          $result_orders_query=mysqli_query($con,$get_orders);
          $row_count=mysqli_num_rows($result_orders_query);
          if($row_count>1){
            echo "<h3 class='text-center mt-4'> You have <span class='text-danger'>";echo $row_count; echo "</span> pending orders</h3>
            <p class='text-center mt-4'><a href='profile.php?all_orders'>View all order details</a></p>";
          }else if($row_count>0){
            echo "<h3 class='text-center mt-4'> You have <span class='text-danger'>";echo $row_count; echo "</span> pending order</h3>
            <p class='text-center mt-4'><a href='profile.php?my_orders'>View all order details</a></p>";
          }else{
            echo "<h3 class='text-center mt-4'> You have no pending orders</h3>
            <p class='text-center mt-4'><a href='../index.php'>Explore Products</a></p>";
          }
        }
      }
    }
  }
}
?>