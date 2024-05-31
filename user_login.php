<?php 
include('database/database.php');
include('functions/function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login </title>
     <!-- bootstrap css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- bootstarp JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
<h1 class='text-center'>User Login </h1>

<form action="" method='post' class='w-50 m-auto'>

<div class="form-outline mb-3 m-auto">
<label for="user_position" class='form-label'>Select Your Position : </label>
<input type="radio" id='teacher_position' name='user_position' value='Teacher'>
<label for="student_postion" class='form-label'>Teacher</label>
<input type="radio" id='student_position'  name='user_position' value='Student'>
<label for="student_postion" class='form-label'>Student</label>
</div>
<div class="form-outline mb-3 m-auto">
<label for="user_name" class='form-label'>Username</label>
<input type="text" class='form-control' name='user_name' placeholder='Enter your Username' required='required'>
</div>
<div class="form-outline mb-3 m-auto">
<label for="user_password" class='form-label'>Password</label>
<input type="password" class='form-control' name='user_password' placeholder='Enter your Password' required='required'>
</div>
<div class="form-outline mb-3 text-center">
<input type="submit" class='btn btn-success' name='btn_login' value='Log in'>
</div>
<p class='small fw-bold mt-2 pt-1 mb-0'>Don't have an account? <a href='user_registration.php' class='text-decoration-none'>Register</a></p>
    
</form>
</body>
</html>

<?php 
if(isset($_POST['btn_login'])){
        global $con;
        $user_position=$_POST['user_position'];
        $user_name=$_POST['user_name'];
        $user_password=$_POST['user_password'];
        if($user_position == 'Teacher'){
        $select="select * from `teachers` where teacher_name='$user_name'";
        $run=mysqli_query($con,$select);
        $row=mysqli_fetch_assoc($run);
        if($row>0){
            $_SESSION['user_name']=$user_name;
            if(password_verify($user_password,$row['teacher_password'])){
            echo "<script>alert('Signed in successfully')</script>";
            echo "<script>window.open('teachers/index.php','_self')</script>";
        }else{
            echo "<script>alert('Invalid credientials.')</script>";
        }
    }
}elseif($user_position == 'Student')
    {
        $select_student="select * from `students` where student_name='$user_name'";
        $run_student=mysqli_query($con,$select_student);
        $row_student=mysqli_fetch_assoc($run_student);
        if($row_student>0){
            $_SESSION['user_name']=$user_name;
            if(password_verify($user_password,$row_student['student_password'])){
            echo "<script>alert('Signed in successfully')</script>";
            echo "<script>window.open('students/index.php','_self')</script>";
    }else{
        echo "<script>alert('Invalid credientials.')</script>";
    }
}
}else{
        echo "<script>alert('Invalid credientials.')</script>";
    }
}
?>