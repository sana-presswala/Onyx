<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONYX</title>
    <link rel="icon" href="images/icon.png" type="image/x-icon">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <!-- <link rel="stylesheet" href="style.css">
    <style>
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
              <img src="images\final_logo.png" alt="Jewellry Store" class="logo" style="height:7%; width:7%;">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="display_all.php">Products</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Categories
                    </a>
                    <ul class="dropdown-menu" style="background-color:#fabda7">
                    <?php
                    getCategories();
                    ?>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Manufacturers
                    </a>
                    <ul class="dropdown-menu" style="background-color:#fabda7">
                    <?php
                    getManufacturers();
                    ?>
                    </ul>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="users\checkout.php">Checkout</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact/feedback</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Sub Total: Rs.<?php total_cart_price(); ?></a>
                  </li>
                </ul>
                <form class="d-flex" action="search_result.php" method="get" role="search" style="background-color:#eea990">
                  <input class="form-control me-2 mt-3" type="search" placeholder="Search" aria-label="Search" name="search_data" autocomplete="off">
                  <input type="submit" value="Search" class="btn mt-3" style="background-color:#eea990; border-color:#aa6f73" name="search_data_product">
                </form>
                <ul class="navbar-nav me-4 ">
                <?php
                if(!isset($_SESSION['username'])){
                  echo "
                    <li class='nav-item'>
                      <a class='nav-link' href='./users/user_registration.php'>Register</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='./users/user_login.php'>Login</a>
                    </li>";
                  }else{
                    echo" <li class='nav-item'>
                    <a class='nav-link' href='./users/profile.php'>Profile</a>
                  </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='./users/user_logout.php'>Logout</a>
                    </li>";
                  }
                  ?>
                </ul>
              </div>
            </div>
          </nav>
        <?php
        Cart();
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
          <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link mx-3" href="#"><p style="font-size:200%;font-weight:600">ONYX</h1></a>  
          </li>
          </ul>
        </nav>
        
        <div class="row px-5">
        <div class="col-md-20">
        <!-- products display -->
        <div class="row ">
          <?php
          searchProduct();
          getUniqueCtgry();
          getUniqueManufacturer();
          ?>
          </div>
          </div>

        </div>
    </div>
    


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>