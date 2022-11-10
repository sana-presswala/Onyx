<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
$user_session_name=$_SESSION['username'];
$select="SELECT * FROM user_ where username='$user_session_name'";
$res=mysqli_query($con,$select);
$row_here=mysqli_fetch_assoc($res);
$points=$row_here['points'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username']?></title>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <style>
     .body{
    overflow-x:hidden;
    /* overflow-y:hidden;  */
    }</style> -->
</head>


<body style="background-color:#f6e0b5">
    <!-- navigation bar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg" style="background:#eea990">
        <div class="container-fluid mx-3">
              <img src="..\images\final_logo.png" alt="Jewellry Store" class="logo" style="height:7%; width:7%;">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../display_all.php">Products</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="checkout.php">Checkout</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../contact.php">Contact/feedback</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" style="font-size=90%" aria-current="page" href="../index.php">Sub-Total: Rs.<?php total_cart_price(); ?></a>
                  </li>
                </ul>
                <form class="d-flex" action="../search_result.php" method="get" role="search" style="background-color:#eea990">
                  <input class="form-control me-2 mt-3" type="search" placeholder="Search" aria-label="Search" name="search_data" autocomplete="off">
                  <input type="submit" value="Search" class="btn mt-3" style="background-color:#eea990; border-color:#aa6f73" name="search_data_product">
                </form>
                <ul class="navbar-nav me-4 ">
                <?php
                if(!isset($_SESSION['username'])){
                echo "
                  <li class='nav-item'>
                    <a class='nav-link' href='user_registration.php'>Register</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='user_login.php'>Login</a>
                  </li>";
                }else{
                  echo" <li class='nav-item'>
                  <a class='nav-link' href='profile.php'>Profile</a>
                </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='user_logout.php'>Logout</a>
                  </li>";
                }
                  ?>
                </ul>
              </div>
            </div>
          </nav>

        
        <?php
        cart();
        ?>

          <!-- second header -->
          <nav class="navbar navbar-expand-lg">
          <ul class="navbar-nav me-auto contain">
          <?php
                if(!isset($_SESSION['username'])){
                echo "
                <li class='nav-item'>
                <a class='nav-link mx-3' href='#'><p style='font-size:160%;font-weight:600'>Welcome Guest!</p></a>  
                </li>";
                }else{
                  echo" <li class='nav-item'>
                  <a class='nav-link mx-3' href='#'><p style='font-size:160%;font-weight:600'>Welcome ".$_SESSION['username']."!</p></a>  
                  </li>";
                }
                  ?>
          </ul>
          <?php
           if($points!=0){echo "<ul class='navbar-nav me-auto'>
          <li class='nav-item'>
            <a class='nav-link mx-3' href='#'><p style='font-size:200%;font-weight:600'>You have $points points!</h1></a>  
          </li>
          </ul>";} ?>
          <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link mx-3" href="#"><p style="font-size:200%;font-weight:600">ONYX</h1></a>  
          </li>
          </ul>
        </nav>
        
        <div class="row">
          <div class="col-md-2 mx-1">
            <ul class="navbar-nav text-left mx-4">
              <li class="nav-item ">
                <a href="profile.php" class="nav-link" aria-current="page"><h5>Your profile</h5></a>
              </li>
              <li class="nav-item ">
                <a href="profile.php?edit_account" class="nav-link" aria-current="page"><h5>Edit account</h5></a>
              </li>
              <li class="nav-item ">
                <a href="profile.php" class="nav-link" aria-current="page"><h5>Pending orders</h5></a>
              </li>
              <li class="nav-item ">
                <a href="profile.php?all_orders" class="nav-link" aria-current="page"><h5>All orders</h5></a>
              </li>
              <li class="nav-item ">
                <a href="profile.php?delete_account" class="nav-link" aria-current="page"><h5>Delete account</h5></a>
              </li>
              <li class="nav-item ">
                <a href="user_logout.php" class="nav-link" aria-current="page"><h5>Logout</h5></a>
              </li>
            </ul>
          </div>
          <div class="col-md-1">
            <div class="d-flex" style="height:400px">
              <div class="vr"></div>
            </div>
          </div>
          <div class="col-md-7">
            <?php
            if(isset($_GET['edit_account'])){
              include('edit_account.php');
            }else if(isset($_GET['all_orders'])){
              include('user_orders.php');
            }else if(isset($_GET['delete_account'])){
              include('delete_account.php');
            }else{
              get_order_details();
              $username=$_SESSION['username'];
            $get_user="SELECT * FROM user_ WHERE username='$username'";
            $result=mysqli_query($con,$get_user);
            $row_fetch=mysqli_fetch_assoc($result);
            $user_id=$row_fetch['user_id'];
            $get_order_details="SELECT * FROM past_orders WHERE user_id=$user_id and order_status=1";
            $result_orders=mysqli_query($con,$get_order_details);
            $num_of_rows=mysqli_num_rows($result_orders);
            if($num_of_rows>0){ echo" <table class='table table-bordered border-dark table-striped border-color-dark mt-5'>
    <thead>
    <tr>
        <th>S.no</th>
        <th>Amount_Due</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Confirm Order</th>
    </tr>
    </thead>
    <tbody>";
            $number=0;
            while($row_data=mysqli_fetch_assoc($result_orders)){
                $number++;
                $order_id=$row_data['order_id'];
                $amount_due=$row_data['amount_due'];
                $total_products=$row_data['total_products'];
                $invoice_number=$row_data['invoice_number'];
                $order_status=$row_data['order_status'];


                $order_date=$row_data['order_date'];
                $order_id=$row_data['order_id'];

                $select_query_status="SELECT * FROM order_status where status_id=$order_status";
                $result_status=mysqli_query($con,$select_query_status);
                $row_status=mysqli_fetch_assoc($result_status);
                $order_status_words=$row_status['status'];
                echo "<tr>
                    <td>$number</td>
                    <td>$order_id</td>
                    <td>$total_products</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>
                    <td><a href='confirm_payment.php?order_id=$order_id' style='color:black'>confirm</a></td>
                </tr>";
            }
            echo "</tbody>
            </table>";
          }
            }
            ?>
          </div>
          <div class="col-md-1">
          </div>
        </div>
      </div>
    


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>