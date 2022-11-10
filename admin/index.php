<?php
include('../includes/connect.php');
session_start();
if(!isset($_SESSION['admin_username'])){
   echo "<script>window.open('admin_login.php','_self')</script>";
}else{
   $user_name=$_SESSION['admin_username'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONYX-Admin: <?php echo $user_name;?></title>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> 
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="..\style.css">
</head>
<body style="background-color:#f6e0b5">
    <!-- navbar -->
    <div class="d-flex">
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg" style="background-color:#eea990;">
            <div class="container-fluid">
                <img src="..\images\final_logo.png" alt="Jewellry Store" class="logo mx-3">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome <?php echo $user_name;?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <div class="row p-4">
            <div class="col-md-12 p-1 d-flex align-center">
                <div class="button text-center">
                    <button class="mb-2" style="background-color: #eea990;border-color:	#aa6f73"><a href="index.php?Insert_products" class="nav-link text-dark my-2" >Insert Products</a></button>
                    <button class="mb-2" style="background-color: #eea990;border-color:	#aa6f73"><a href="index.php?view_products" class="nav-link text-dark my-2">View Products</a></button>
                    <button class="mb-2" style="background-color: #eea990;border-color:	#aa6f73"><a href="index.php?Insert_categories" class="nav-link text-dark my-2">Insert Categories</a></button>
                    <button class="mb-2" style="background-color: #eea990;border-color:	#aa6f73"><a href="index.php?view_categories" class="nav-link text-dark my-2">View Categories</a></button>
                    <button class="mb-2" style="background-color: #eea990;border-color:	#aa6f73"><a href="index.php?Insert_manufacturers" class="nav-link text-dark my-2">Insert Manufacturers</a></button>
                    <button class="mb-2" style="background-color: #eea990;border-color:	#aa6f73"><a href="index.php?view_man" class="nav-link text-dark my-2">View Manufacturer</a></button>
                    <button class="mb-2" style="background-color: #eea990;border-color:	#aa6f73"><a href="index.php?complaints" class="nav-link text-dark my-2">View Complaints</a></button>
                    <button class="mb-2" style="background-color: #eea990;border-color:	#aa6f73"><a href="index.php?all_order" class="nav-link text-dark my-2">All Orders</a></button>
                    <button class="mb-2" style="background-color: #eea990;border-color:	#aa6f73"><a href="index.php?pending_order" class="nav-link text-dark my-2">Pending Orders</a></button>
                    <button class="mb-2" style="background-color: #eea990;border-color:	#aa6f73"><a href="index.php?all_payments" class="nav-link text-dark my-2">All payments</a></button>
                    <button class="mb-2" style="background-color: #eea990;border-color:	#aa6f73"><a href="index.php?all_users" class="nav-link text-dark my-2">List of users</a></button>
                    <button class="mb-2" style="background-color: #eea990;border-color:	#aa6f73"><a href="index.php?admin_logout" class="nav-link text-dark my-2">Logout</a></button>
                </div>
            </div>
        </div>
        <div class="container my-3">
            <?php
             if(isset($_GET['Insert_products'])){
                include("insert_products.php");
             }
             if(isset($_GET['view_products'])){
                include("view_products.php");
             }
             if(isset($_GET['Insert_categories'])){
                include("Insert_categories.php");
             }
             if(isset($_GET['Insert_manufacturers'])){
                include("Insert_manufacturers.php");
             }
             if(isset($_GET['edit_products'])){
                include("edit_products.php");
             }
             if(isset($_GET['delete_products'])){
                include("delete_products.php");
             }
             if(isset($_GET['view_categories'])){
                include("view_categories.php");
             }
             if(isset($_GET['edit_categories'])){
                include("edit_categories.php");
             }
             if(isset($_GET['delete_categories'])){
                include("delete_categories.php");
             }
             if(isset($_GET['view_man'])){
                include("view_man.php");
             }
             if(isset($_GET['edit_man'])){
                include("edit_man.php");
             }
             if(isset($_GET['edit_complaint'])){
                include("edit_complaint.php");
             }
             if(isset($_GET['delete_man'])){
                include("delete_man.php");
             }
             if(isset($_GET['delete_order'])){
                include("delete_order.php");
             }
             if(isset($_GET['all_order'])){
                include("all_order.php");
             }
             if(isset($_GET['pending_order'])){
                include("pending_order.php");
             }
             if(isset($_GET['all_payments'])){
                include("all_payments.php");
             }
             if(isset($_GET['all_users'])){
                include("all_users.php");
             }
             if(isset($_GET['delete_user'])){
                include("delete_user.php");
             }
             if(isset($_GET['complaints'])){
                include("complaints.php");
             }
             if(isset($_GET['admin_logout'])){
                include("admin_logout.php");
             }
            ?> 
        </div>
        
        <!-- footer -->
        <!-- <div class="footer p-3 text-center" style="background-color:#ca5cdd">
            <p>all rights reserved</p>
        </div> -->
    </div>
    </div>
    


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>