<h2 class="text-center mb-4">All Manufacturers</h2>
<table class="table table-bordered border-dark table-striped border-color-dark mt-5">
    <thead>
    <tr>
        <th>S.no</th>
        <th>Manufacturer Name</th>
        <th>No of Products</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include('../includes/connect.php');
    $get_man="SELECT * FROM manufacturer";
    $result=mysqli_query($con,$get_man);
    $number=0;
    while($row=mysqli_fetch_assoc($result)){
        $number++;
        $man_id=$row['man_id'];
        $man_title=$row['name'];
        $select_products="SELECT * FROM inventory WHERE manufacturer_id=$man_id";
        $result_products=mysqli_query($con,$select_products);
        $number_of_products=mysqli_num_rows($result_products);
        echo "
        <tr>
        <td>$number</td>
        <td>$man_title</td>
        <td>$number_of_products</td>
        <td><a href='index.php?edit_man=$man_id' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='index.php?delete_man=$man_id' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
    }
    ?>
    </tbody>
</table>