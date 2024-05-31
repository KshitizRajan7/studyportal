<?php 
include('../database/database.php');
session_start();
if(!isset($_SESSION['user_name']  )){
    echo "<script>window.open('../user_login.php','_self')</script>";
}
$student_name=$_SESSION['user_name'];
$select_student="select * from `students` where student_name='$student_name'";
$run_select=mysqli_query($con,$select_student);
$fetch=mysqli_fetch_assoc($run_select);
$faculty_name=$fetch['faculty_name'];
$level_name=$fetch['level_name'];
$program_name=$fetch['program_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student Dashboard</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- bootstarp JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .table_image{
            width:100px;
            height:100px;
            object-fit:contain;
        }
    </style>
</head>
<body>
<!-- nav link -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">LOGO</a>
<ul class="navbar-nav ms-auto">
      <li class="nav-item">
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo "Welcome (".$_SESSION['user_name'].")"; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href='index.php?student_profile' name='student_profile'>My account</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
          </ul>
        </li>
</ul>
</nav>
      </form>
    </div>
  </div>
</nav>

<h1 class='text-center'>Student Dashboard</h1>
<!-- body -->
<div class="row m-auto">
        <div class="col-md-2 bg-dark min-vh-100 pt-5"> 
          <ul class="navbar-nav p-5">
          <li class="navbar-nav bg-gray">
                <a href="index.php?note" class="nav-link text-light"><h5>Notes</h5></a>
            </li>
          <li class="navbar-nav bg-gray">
                <a href="index.php?question" class="nav-link text-light"><h5>Questions</h5></a>
            </li>
        </ul>
    </div>
    <div class="col-md-10 p-0 table-responsive">
        <?php
       if(isset($_GET['note'])){
            include('note.php');
        }elseif(isset($_GET['question'])){
            include('question.php');
        }elseif(isset($_GET['update_student'])){
            include('update_student.php');
        }elseif(isset($_GET['student_profile'])){
            include('student_profile.php');
        }elseif(isset($_GET['delete_student'])){
            include('delete_student.php');
        }else{
            echo"<div class='container-fluid mt-5 h-50 d-flex align-items-center justify-content-center'>
            <h1>Welcome ".$_SESSION['user_name']." ('$level_name' student)</h1>
            <div><h1> Faculty : '$faculty_name' </h1></div>
            <h1> Program : '$program_name' </h1>
            </div> ";

        }
        ?>
    </div>
    </div>



</body>
</html>