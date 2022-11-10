<?php
include('../includes/connect.php');
if(isset($_POST['Register'])){
    $admin_username=$_POST['admin_username'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password_repeat'];
    $admin_password_repeat=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT); 

    $select_query_username="SELECT * FROM admin_table WHERE admin_username='$admin_username'";
    $result_query_username=mysqli_query($con,$select_query_username);
    $number1=mysqli_num_rows($result_query_username);
    $select_query_adminemail="SELECT * FROM admin_table WHERE admin_email='$admin_email'";
    $result_query_adminemail=mysqli_query($con,$select_query_adminemail);
    $number2=mysqli_num_rows($result_query_adminemail);
    if($number1!=0){
        echo "<script> alert('Username already exists')</script>";
    }
    else if($number2!=0){
        echo "<script> alert('Email already exists, click on log-in')</script>";
    }
    else if($admin_password!=$admin_password_repeat){
        echo "<script> alert('Passwords do not match')</script>";
    }else{  
    $insert_query="INSERT INTO admin_table(admin_username,admin_email,admin_password) 
    VALUES ('$admin_username','$admin_email','$hash_password')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script> alert('Admin Registration successful ')</script>";
    }else{
        die(msqli_error($con));
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
        <p class="text-center" style="font-size:180%;font-weight:500">Register</p>
        <div class="row d-flex align-center justify-content-center px-3">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post">
                    <div class="form-outline mb-3">
                        <label for="admin_username" class="form-label">Username</label>
                        <input type="text" id="admin_username" class="form-control" placeholder="Enter your username" autocomplete="off" required name="admin_username"/>
                    </div>
                    <div class="form-outline mb-3">
                        <label for="admin_email" class="form-label">Email-ID:</label>
                        <input type="text" id="admin_email" class="form-control" placeholder="Enter your email address" autocomplete="off" required name="admin_email"/>
                    </div>
                    <div class="form-outline mb-3">
                        <label for="admin_password" class="form-label">Password:</label>
                        <input type="password" id="admin_password" class="form-control" placeholder="Enter password" autocomplete="off" required name="admin_password"/>
                    </div>
                    <div class="form-outline mb-3">
                        <label for="admin_password_repeat" class="form-label">Confirm Password:</label>
                        <input type="password" id="admin_password_repeat" class="form-control" placeholder="Confirm password" autocomplete="off" required name="admin_password_repeat"/>
                    </div>
                    <div class="mb-5">
                        <input type="submit" style='background-color:#eea990; border-color:#aa6f73' class="py-2 px-4" value="Register" name="Register">
                        <p class="small fw-bold my-3">Already have an account? <a href="admin_login.php" class="text-danger">Login </a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>