<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
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
    <?php
    $user_ip=getIPAddress();
    $get_user="SELECT * FROM user_ WHERE ip_address='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id']
    ?>

    <div class="container">
        <h2 class="text-center mt-1 mb-5">Payment Options</h2>
        <div class="row mx-5 d-flex justify-content-center align-items-center">
            <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><img src="..\images\download.jpeg" alt="UPI" style="width:100%"></a>
            </div>
            <div class="col-md-6 ">
            <a href="order.php?user_id=<?php echo  $user_id ?>" target="_self"><h4 class="text-center">Cash On Delivery</h4></a>
            </div>
        </div>
    </div>


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>