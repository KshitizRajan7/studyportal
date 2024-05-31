<?php
include('../database/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- bootstarp JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1 class="text-center mt-5">Admin Registration</h1>
    <form action="" method='post' enctype='multipart/form-data' class='w-50 m-auto'>
        <div class="form-outline mb-2">
            <label for="admin_name" class='form-label'>Admin Name</label>
            <input type="text" class="form-control" name='admin_name' placeholder='Enter Admin Name' required='required'>
        </div>
        <div class="form-outline mb-2">
            <label for="admin_email" class='form-label'>Admin Email</label>
            <input type="email" class="form-control" name='admin_email' placeholder='Enter Admin Email' required='required'>
        </div>
        <div class="form-outline mb-2">
            <label for="admin_password" class='form-label'>Admin Password</label>
            <input type="password" class="form-control" name='admin_password' placeholder='Enter Admin Password' required='required'>
        </div>
        <div class="form-outline mb-2">
            <label for="confirm_password" class='form-label'>Confrim Password</label>
            <input type="password" class="form-control" name='confirm_password' placeholder='Confirm Your Password' required='required'>
        </div>
        <div class="form-outline mb-5">
            <label for="admin_image" class='form-label'>Admin Image</label>
            <input type="file" class="form-control" name='admin_image' required='required'>
        </div>
        <div class="form-outline mb-5 text-center">
            <input type="submit" class="btn btn-success w-50" name='admin_register' value='Register'>
        </div>
        <p class="small fw-bold mt-2 mb-5">Already Have an Account? <a href='admin_signin.php' class='text-decoration-none'>Sign In </a></p>

    
    </form>
</body>
</html>


<?php 
if(isset($_POST['admin_register'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    $admin_image=$_FILES['admin_image']['name'];
    $admin_tmp_image=$_FILES['admin_image']['tmp_name'];

    $select="select * from `admin` where admin_name='$admin_name' and admin_email='$admin_email'";
    $run_select=mysqli_query($con,$select);
    $rows=mysqli_num_rows($run_select);
    if($rows>0){
        echo "<script>alert('This admin detail is already registered !! ')</script>";
    }elseif($admin_password != $confirm_password ){
        echo "<script>alert('Confirm Password did not match !!')</script>";  
    }else{
        move_uploaded_file($admin_tmp_image,"admin_photo/$admin_image");
        $insert_query="insert into `admin` (admin_name,admin_email,admin_password,admin_image) values('$admin_name','$admin_email','$hash_password','$admin_image')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Admin Registered !!')</script>";
            echo "<script>window.open('admin_signin.php','_self')</script>";
        }
    }
}

?>