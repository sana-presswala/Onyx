<h2 class="text-center mb-4">All Categories</h2>
<table class="table table-bordered border-dark table-striped border-color-dark mt-5">
    <thead>
    <tr>
        <th>S.no</th>
        <th>Category Title</th>
        <th>No of Products</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include('../includes/connect.php');
    $get_category="SELECT * FROM category";
    $result=mysqli_query($con,$get_category);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $number++;
        $category_id=$row['ctgry_id'];
        $category_title=$row['ctgry_name'];
        $select_products="SELECT * FROM inventory WHERE category_id=$category_id";
        $result_products=mysqli_query($con,$select_products);
        $number_of_products=mysqli_num_rows($result_products);
        echo "
        <tr>
        <td>$number</td>
        <td>$category_title</td>
        <td>$number_of_products</td>
        <td><a href='index.php?edit_categories=$category_id' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_categories=$category_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
    }
    ?>
    </tbody>
</table>