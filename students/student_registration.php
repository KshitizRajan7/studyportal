<?php
include('../database/database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student Registration</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- bootstarp JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<h1 class='text-center bg-dark text-light'>Insert Student</h1>
<div class="container-fluid m-auto w-50">
    <form action="" method='post' enctype='multipart/form-data'>
        <div class="form-outline mt-2">
            <label for="student_name" class='form-label'>Student Name</label>
            <input type="text" name='student_name' class='form-control' placeholder='Enter Student Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="faculty_name" class='form-label'>Faculty Name</label>
            <input type="text" name='faculty_name' class='form-control' placeholder='Enter Faculty Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="level_name" class='form-label'>Level Name</label>
            <input type="text" name='level_name' class='form-control' placeholder='Enter Level Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="program_name" class='form-label'>Program Name</label>
            <input type="text" name='program_name' class='form-control' placeholder='Enter Program Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="student_email" class='form-label'>Student Email</label>
            <input type="email" name='student_email' class='form-control' placeholder='Enter Student Email'/>
        </div>
        <div class="form-outline mb-3">
            <label for="student_password" class=''form-label>Student Password</label>
            <input type="password" class='form-control' name='student_password' placeholder='Enter Student Password'>
        </div>
        <div class="form-outline mb-3">
            <label for="confirm_password" class=''form-label>Confirm Password</label>
            <input type="password" class='form-control' name='confirm_password' placeholder='Confirm Password'>
        </div>
        <div class="form-outline mt-2">
            <label for="student_image" class='form-label'>Student Image</label>
            <input type="file" name='student_image' class='form-control'/>
        </div>
        <div class="form-outline mt-2">
            <label for="student_address" class='form-label'>Student Address</label>
            <input type="text" name='student_address' class='form-control' placeholder='Enter Student Address'/>
        </div>
        <div class="form-outline mt-2">
            <label for="student_phone" class='form-label'>Student Phone</label>
            <input type="text" name='student_phone' class='form-control' placeholder='Enter Student Phone'/>
        </div>
        <div class="form-outline mt-2">
            <input type="submit" name='student_submit' class='form-control btn btn-success' value='Insert Student'>
        </div>
        <p class="small fw-bold mt-2 mb-5">Already Have an Account? <a href='student_signin.php' class='text-decoration-none'>Sign In </a></p>

    </form>
</div>
</body>
</html>


<?php 
if(isset($_POST['student_submit'])){
    $student_name=$_POST['student_name'];
    $faculty_name=$_POST['faculty_name'];
    $level_name=$_POST['level_name'];
    $program_name=$_POST['program_name'];
    $student_email=$_POST['student_email'];
    $student_password=$_POST['student_password'];
    $hash_password=password_hash($student_password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    $student_address=$_POST['student_address'];
    $student_phone=$_POST['student_phone'];

    $student_image=$_FILES['student_image']['name'];
    $student_tmp_image=$_FILES['student_image']['tmp_name'];
    
    $select_query="select * from `students` where student_name='$student_name' and student_email='$student_email' and student_mobile='$student_phone'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This student detail is already registered !!')</script>";
    }elseif($student_password !== $confirm_password){
        echo "<script>alert('Password and confirm password did not matched!!')</script>";
    }else{
    move_uploaded_file($student_tmp_image,"../admin/students_photo/$student_image");
    $insert_query="insert into `students` (student_name,faculty_name,level_name,program_name,student_email,student_password,student_image,student_address,student_mobile) values ('$student_name','$faculty_name','$level_name','$program_name','$student_email','$hash_password','$student_image','$student_address','$student_phone')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Student Inserted !!')</script>";
        echo "<script>window.open('index.php?student','_self')'</script>";
    }}
}
?>