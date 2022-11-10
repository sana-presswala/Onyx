<h2 class="text-center mb-4">All Products</h2>
<table class="table table-bordered border-dark table-striped border-color-dark mt-5">
    <thead>
    <tr>
        <th>S.no</th>
        <th>Product Title</th>
        <th>Product description</th>
        <th>Cost Price</th>
        <th>Selling price</th>
        <th>MRP</th>
        <th>Points</th>
        <th>Product Image 1</th>
        <th>Stock</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include('../includes/connect.php');
    $get_products="SELECT * FROM inventory";
    $result=mysqli_query($con,$get_products);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $number++;
        $product_id=$row['inv_id'];
        $product_title=$row['Product_name'];
        $product_discription=$row['Product_description'];
        $Cost_price=$row['Cost_price'];
        $price_after_discount=$row['price_after_discount'];
        $MRP=$row['MRP'];
        $points=$row['points'];
        $product_image1=$row['img1'];
        $product_image2=$row['img2'];
        $product_image3=$row['img3'];
        $past_sale=$row['past_sale'];
        $stock=$row['items_in_stock'];
        // $get_count="SELECT * FROM past_orders WHERE order_status=1 AND product_id=$product_id";
        // $result_count=mysqli_query($con,$get_count);
        // $row_count=mysqli_num_rows($result_count);
        // $get_count2="SELECT * FROM past_orders WHERE order_status=2 AND product_id=$product_id";
        // $result_count2=mysqli_query($con,$get_count2);
        // $row_count2=mysqli_num_rows($result_count2);
        // $stock=$stock-$row_count-$row_count2;
        echo "
        <tr>
        <td>$number</td>
        <td>$product_title</td>
        <td>$product_discription</td>
        <td>$Cost_price</td>
        <td>$price_after_discount</td>
        <td>$MRP</td>
        <td>$points</td>
        <td><img src='./product_images/$product_image1' style='width:100px'></td>
        <td>$stock</td>
        <td><a href='index.php?edit_products=$product_id' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_products=$product_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
    }
    ?>
    </tbody>
</table>
