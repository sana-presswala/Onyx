<?php
if(isset($_GET['edit_account'])){
    $select_query="SELECT * FROM user_ WHERE username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $user_username=$row_fetch['username'];
    $user_email=$row_fetch['email_add'];
    $user_contact=$row_fetch['phone_number'];
    $user_address=$row_fetch['address'];
    $user_city=$row_fetch['city'];
    $user_pincode=$row_fetch['pincode'];

    if(isset($_POST['Update'])){
        $udate_id=$user_id;
        $username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_contact=$_POST['user_phone_number'];
        $user_address=$_POST['user_address'];
        $user_city=$_POST['user_city'];
        $user_pincode=$_POST['user_pincode'];

        $update_data="UPDATE user_ set username='$username', email_add='$user_email', phone_number='$user_contact', address='$user_address', city='$user_city', pincode=$user_pincode WHERE user_id=$user_id";
        $result_query_update=mysqli_query($con,$update_data);
        if($result_query_update){
            echo "<script>alert('Data updated successfully, kindly log-in again')</script>";
            echo "<script>window.open('user_logout.php','_self' )</script>";
        }
    }
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="text-center mb-4">Edit Account</h3>
    <form action="" method="post" class="text-center">
    <div class="row d-flex align-center justify-content-center px-3 ">
            <div class="col-lg-12 col-xl-8">
                    <div class="form-outline mb-3">
                        <input type="text" class="form-control" placeholder="Enter your username" autocomplete="off" value="<?php echo $user_username ?>" name="user_username"/>
                    </div>
                    <div class="form-outline mb-3">
                        <input type="email" class="form-control" placeholder="Enter your email address" autocomplete="off" value="<?php echo $user_email ?>" name="user_email"/>
                    </div>
                    <div class="form-outline mb-3">
                        <input type="text" class="form-control" placeholder="Enter your contact number" autocomplete="off" value="<?php echo $user_contact ?>" name="user_phone_number"/>
                    </div>
                    <div class="form-outline mb-3">
                        <input type="text" class="form-control" placeholder="Enter your address" autocomplete="off" value="<?php echo $user_address ?>" name="user_address"/>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="Enter your city" autocomplete="off" value="<?php echo $user_city ?>" name="user_city"/>

                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" placeholder="Enter your pincode" autocomplete="off" value="<?php echo $user_pincode ?>" name="user_pincode"/>
                        </div>
                        </div>
                    </div>
                    <div class="mb-5 m-auto">
                        <input type="submit" style='background-color:#eea990; border-color:#aa6f73' class="py-2 px-4" value="Update" name="Update">
                        <!-- <p class="small fw-bold my-3">Already have an account? <a href="user_login.php" class="text-danger">Login </a></p> -->
                    </div>
            </div>
        </div>
    </form>

</body>
</html>