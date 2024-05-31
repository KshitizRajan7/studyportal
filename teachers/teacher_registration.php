<?php
include('../database/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- bootstarp JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<h1 class='text-center bg-dark text-light'>Teacher Registration</h1>
<div class="container-fluid m-auto w-50">
    <form action="" method='post' enctype='multipart/form-data'>
        <div class="form-outline mt-2">
            <label for="teacher_name" class='form-label'>Teacher Name</label>
            <input type="text" name='teacher_name' class='form-control' placeholder='Enter Teacher Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="subject_name" class='form-label'>Subject Name</label>
            <input type="text" name='subject_name' class='form-control' placeholder='Enter Subject Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="teacher_email" class='form-label'>Teacher Email</label>
            <input type="email" name='teacher_email' class='form-control' placeholder='Enter Teacher Email'/>
        </div>
        <div class="form-outline mt-2">
            <label for="teacher_password" class='form-label'>Teacher Password</label>
            <input type="password" name='teacher_password' class='form-control' placeholder='Enter Teacher Password'/>
        </div>
        <div class="form-outline mt-2">
            <label for="confirm_password" class='form-label'>Confirm Password</label>
            <input type="password" name='confirm_password' class='form-control' placeholder='Confirm Password'/>
        </div>
        <div class="form-outline mt-2">
            <label for="teacher_image" class='form-label'>Teacher Image</label>
            <input type="file" name='teacher_image' class='form-control'/>
        </div>
        <div class="form-outline mt-2">
            <label for="teacher_address" class='form-label'>Teacher Address</label>
            <input type="text" name='teacher_address' class='form-control' placeholder='Enter Teacher Address'/>
        </div>
        <div class="form-outline mt-2">
            <label for="teacher_phone" class='form-label'>Teacher Phone</label>
            <input type="text" name='teacher_phone' class='form-control' placeholder='Enter Teacher Phone'/>
        </div>
        <div class="form-outline mt-2">
            <input type="submit" name='teacher_submit' class='form-control btn btn-success' value='Register Teacher'>
        </div>
        <p class="small fw-bold mt-2 mb-5">Already Have an Account? <a href='teacher_signin.php' class='text-decoration-none'>Sign In </a></p>
    </form>
</div>

<?php 
if(isset($_POST['teacher_submit'])){
    $teacher_name=$_POST['teacher_name'];
    $subject_name=$_POST['subject_name'];
    $teacher_email=$_POST['teacher_email'];
    $teacher_password=$_POST['teacher_password'];
    $hash_password=password_hash($teacher_password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    $teacher_address=$_POST['teacher_address'];
    $teacher_phone=$_POST['teacher_phone'];

    $teacher_image=$_FILES['teacher_image']['name'];
    $teacher_tmp_image=$_FILES['teacher_image']['tmp_name'];
    
    $select_query="select * from `teachers` where teacher_name='$teacher_name' or teacher_email='$teacher_email' or teacher_mobile='$teacher_phone'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This teacher detail is already registered !!')</script>";
    }elseif($teacher_password !== $confirm_password){
        echo "<script>alert('Password and confirm password did not matched!!')</script>";
    }else{
    move_uploaded_file($teacher_tmp_image,"teachers_photo/$teacher_image");
    $insert_query="insert into `teachers` (teacher_name,subject_name,teacher_email,teacher_password,teacher_image,teacher_address,teacher_mobile) values ('$teacher_name','$subject_name','$teacher_email','$hash_password','$teacher_image','$teacher_address','$teacher_phone')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Teacher Inserted !!')</script>";
        echo "<script>window.open('index.php?teacher','_self')'</script>";
    }}
}
?>