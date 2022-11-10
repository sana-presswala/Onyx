<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="../images/icon.png" type="image/x-icon">
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
</head>


<body style="background-color:#f6e0b5">
    <!-- navigation bar -->
    <div class="container-fluid p-0 mt-3">
        <p class="text-center" style="font-size:180%;font-weight:500">Register</p>
        <div class="row d-flex align-center justify-content-center px-3">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-3">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required name="user_username"/>
                    </div>
                    <div class="form-outline mb-3">
                        <label for="user_email" class="form-label">Email-ID:</label>
                        <input type="text" id="user_email" class="form-control" placeholder="Enter your email address" autocomplete="off" required name="user_email"/>
                    </div>
                    <div class="form-outline mb-3">
                        <label for="user_password" class="form-label">Password:</label>
                        <input type="password" id="user_password" class="form-control" placeholder="Enter password" autocomplete="off" required name="user_password"/>
                    </div>
                    <div class="form-outline mb-3">
                        <label for="user_password_repeat" class="form-label">Confirm Password:</label>
                        <input type="password" id="user_password_repeat" class="form-control" placeholder="Confirm password" autocomplete="off" required name="user_password_repeat"/>
                    </div>
                    <div class="form-outline mb-3">
                        <label for="user_phone_number" class="form-label">Contact Number:</label>
                        <input type="text" id="user_phone_number" class="form-control" placeholder="Enter your contact number" autocomplete="off" required name="user_phone_number"/>
                    </div>
                    <div class="form-outline mb-3">
                        <label for="user_address" class="form-label">Address:</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required name="user_address"/>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                        <div class="col-6">
                            <label for="user_city" class="form-label">City:</label>
                            <input type="text" id="user_city" class="form-control" placeholder="Enter your city" autocomplete="off" required name="user_city"/>

                        </div>
                        <div class="col-6">
                            <label for="user_pincode" class="form-label">Pin code:</label>
                            <input type="text" id="user_pincode" class="form-control" placeholder="Enter your pincode" autocomplete="off" required name="user_pincode"/>

                        </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <input type="submit" style='background-color:#eea990; border-color:#aa6f73' class="py-2 px-4" value="Register" name="Register">
                        <p class="small fw-bold my-3">Already have an account? <a href="user_login.php" class="text-danger">Login </a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>


<?php
if(isset($_POST['Register'])){
    global $con;
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT); 
    $user_password_repeat=$_POST['user_password_repeat'];
    $user_phone_number=$_POST['user_phone_number'];
    $user_address=$_POST['user_address'];
    $user_city=$_POST['user_city'];
    $user_pincode=$_POST['user_pincode'];
    $user_ip=getIPAddress();


    $select_query_username="SELECT * FROM user_ WHERE username='$user_username'";
    $result_query_username=mysqli_query($con,$select_query_username);
    $number1=mysqli_num_rows($result_query_username);
    $select_query_useremail="SELECT * FROM user_ WHERE email_add='$user_email'";
    $result_query_useremail=mysqli_query($con,$select_query_useremail);
    $number2=mysqli_num_rows($result_query_useremail);
    $select_query_usercontact="SELECT * FROM user_ WHERE phone_number='$user_phone_number'";
    $result_query_usercontact=mysqli_query($con,$select_query_usercontact);
    $number3=mysqli_num_rows($result_query_usercontact);
    if($number1!=0){
        echo "<script> alert('Username already exists')</script>";
    }
    else if($number2!=0){
        echo "<script> alert('Email already exists, click on log-in')</script>";
    }
    else if($number3!=0){
        echo "<script> alert('Contact Number already exists')</script>";
    }else if($user_password!=$user_password_repeat){
        echo "<script> alert('Passwords do not match')</script>";
    }else{  
    $insert_query="INSERT INTO user_(username,points,email_add,password,ip_address,phone_number,address,pincode,city) 
    VALUES ('$user_username',0,'$user_email','$hash_password','$user_ip','$user_phone_number','$user_address',$user_pincode,'$user_city')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script> alert('User Registration successful ')</script>";
        $select_cart_items="SELECT * FROM shopping_cart WHERE ip_address='$user_ip'";
        $result_cart=mysqli_query($con,$select_cart_items);
        $rows_number=mysqli_num_rows($result_cart);
        if($rows_number>0){
            $_SESSION['username']=$user_username; 
            echo "<script> alert('You have items in your cart')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
             echo "<script>window.open('../index.php','_self')</script>";
        }
          
    }else{
        die(msqli_error($con));
    }
    }

}

?>