<?php
include('../includes/connect.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete account</title>
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
    <h3 class="text-center mb-6">Delete Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="form-outline mb-4 text-center m-auto">
                    <input type="submit" style='background-color:#eea990; border-color:#aa6f73' class="py-2 px-4" value="Delete Account" name="Delete">
                </div></div>
            <div class="col-md-6">
                <div class="form-outline mb-4 text-center m-auto">
                    <input type="submit" style='background-color:#eea990; border-color:#aa6f73' class="py-2 px-4" value="Cancel" name="noDelete">
                </div>
                </div>
        </div>
    </form>

<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

<?php
$username=$_SESSION['username'];
$select_username="select * from user_ where username='$username'";
$result_query_username=mysqli_query($con,$select_username);
$row_count=mysqli_num_rows($result_query_username);
if(isset($_POST['Delete'])){
    if($row_count>0){
        echo "<script> alert('You have pending orders, kindly confirm them first')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
    }else{
    $order_find="SELECT * FROM past_orders WHERE user_id=$user";
    $delete_query="DELETE from user_ WHERE username='$username'";
    $result_query=mysqli_query($con,$delete_query);
    if($result_query){
        echo "<script> alert('Account deleted successfully')</script>";
        echo "<script>window.open('user_logout.php','_self')</script>";
    }
}}else if(isset($_POST['noDelete'])){
    echo "<script>window.open('profile.php','_self')</script>";
}
?>