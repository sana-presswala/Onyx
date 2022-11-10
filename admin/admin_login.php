<?php
include('../includes/connect.php');
@session_start();
if(isset($_POST['admin_login'])){
    $admin_username_email=$_POST['admin_username_email']; 
    $admin_password=$_POST['admin_password']; 
    $select_query="SELECT * FROM admin_table WHERE admin_username='$admin_username_email' or admin_email='$admin_username_email'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $admin_username=$row_data['admin_username'];
    if($row_count==0){
        echo "<script> alert('Invalid Credentials')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    }else{
        if(password_verify($admin_password,$row_data['admin_password'])){
            if($row_count==1){
                $_SESSION['admin_username']=$admin_username;
                echo "<script> alert('Login Successful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }else{
            echo "<script> alert('Invalid Credentials')</script>";  
        }
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONYX-Admin Registration</title>
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
    <div class="container-fluid m-3">
    <div class="container-fluid p-0 mt-3">
        <p class="text-center" style="font-size:180%;font-weight:500">Sign In</p>
        <div class="row d-flex align-center justify-content-center px-3">
            <div class="col-lg-12 col-xl-6 mt-3">
                <form action="" method="post">
                    <div class="form-outline mb-3">
                        <label for="admin_username_email" class="form-label">Username/Email-ID:</label>
                        <input type="text" id="admin_username_email" class="form-control" placeholder="Enter your username" autocomplete="off" required name="admin_username_email"/>
                    </div>
                    <div class="form-outline mb-3">
                        <label for="admin_password" class="form-label">Password:</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter password" autocomplete="off" required name="admin_password"/>
                    </div>
                    <div class="form-outline mb-5">
                        <a href="">Forgot Password</a>
                    </div>
                    <div class="mb-5">
                        <input type="submit" style='background-color:#eea990; border-color:#aa6f73' class="py-2 px-4" value="Login" name="admin_login" >
                        <p class="small fw-bold my-3">Don't have an account? <a href="admin_registration.php" class="text-danger">Register</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
    
    


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>