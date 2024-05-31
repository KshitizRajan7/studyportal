<?php 
include('../database/database.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student Sign in</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- bootstarp JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <h1 class='text-center mt-5'>Student Sign in</h1>
    <form action="" method='post' class='w-50 m-auto'>
        <div class="form-outline mb-3">
            <label for="student_name" class=''form-label>Student Name</label>
            <input type="text" class='form-control' name='student_name' placeholder='Enter student Name'>
        </div>
        <div class="form-outline mb-3">
            <label for="student_password" class=''form-label>Student Password</label>
            <input type="password" class='form-control' name='student_password' placeholder='Enter student Password'>
        </div>
        <div class="form-outline mb-3 text-center">
            <input type="submit" class='btn btn-success form-control w-50' name='signin_btn' value='Sign In' >
        </div>
        <p class='small fw-bold mt-2 pt-1 mb-0'>Don't have an account? <a href='student_registration.php' class='text-decoration-none'>Register</a></p>
    </form>
</body>
</html>

<?php 
if(isset($_POST['signin_btn'])){
    $student_name=$_POST['student_name'];
    $student_password=$_POST['student_password'];
    $select="select * from `students` where student_name='$student_name'";
    $run=mysqli_query($con,$select);
    $row=mysqli_fetch_assoc($run);
    if($row>0){
        $_SESSION['student_name']=$student_name;
        if(password_verify($student_password,$row['student_password'])){
        echo "<script>alert('Signed in successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        echo "<script>alert('Invalid credientials.')</script>";
    }
}}
?>