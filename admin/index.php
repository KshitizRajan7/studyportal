<?php 
include('../database/database.php');
session_start();
if(!isset($_SESSION['admin_name'])){
    echo "<script>window.open('admin_signin.php','_self')</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
    <a class="navbar-brand" href="#">Navbar scroll</a>
<ul class="navbar-nav ms-auto">
      <li class="nav-item">
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo "Welcome Admin (".$_SESSION['admin_name'].")"; ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href='index.php?admin_profile=<?php $admin_id ?>' name='admin_profile'>My account</a></li>
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

<h1 class='text-center'>Admin Dashboard</h1>
<!-- body -->
<div class="row m-auto">
        <div class="col-md-2 bg-dark min-vh-100 pt-5"> 
          <ul class="navbar-nav p-5">
          <li class="navbar-nav bg-gray">
                <a href="index.php?universities" class="nav-link text-light"><h5>Universities</h5></a>
            </li>
          <li class="navbar-nav bg-gray">
                <a href="index.php?faculty" class="nav-link text-light"><h5>Faculties</h5></a>
            </li>
          <li class="navbar-nav bg-gray">
                <a href="index.php?level" class="nav-link text-light"><h5>Levels</h5></a>
            </li>
          <li class="navbar-nav bg-gray">
                <a href="index.php?program" class="nav-link text-light"><h5>Programs</h5></a>
            </li>
          <li class="navbar-nav bg-gray">
                <a href="index.php?semester" class="nav-link text-light"><h5>Semesters</h5></a>
            </li>
          <li class="navbar-nav bg-gray">
                <a href="index.php?subject" class="nav-link text-light"><h5>Subjects</h5></a>
            </li>
          <li class="navbar-nav bg-gray">
                <a href="index.php?chapter" class="nav-link text-light"><h5>Chapters</h5></a>
            </li>
          <li class="navbar-nav bg-gray">
                <a href="index.php?note" class="nav-link text-light"><h5>Notes</h5></a>
            </li>
          <li class="navbar-nav bg-gray">
                <a href="index.php?question" class="nav-link text-light"><h5>Questions</h5></a>
            </li>
          <li class="navbar-nav bg-gray">
                <a href="index.php?teacher" class="nav-link text-light"><h5>Teachers</h5></a>
            </li>
          <li class="navbar-nav bg-gray">
                <a href="index.php?student" class="nav-link text-light"><h5>Students</h5></a>
            </li>
        </ul>
    </div>
    <div class="col-md-10 p-0 table-responsive">
        <?php
        if(isset($_GET['universities'])){
            include('universities.php');
        }elseif(isset($_GET['faculty'])){
            include('faculty.php');
        }elseif(isset($_GET['level'])){
            include('level.php');
        }elseif(isset($_GET['program'])){
            include('program.php');
        }elseif(isset($_GET['semester'])){
            include('semester.php');
        }elseif(isset($_GET['subject'])){
            include('subject.php');
        }elseif(isset($_GET['chapter'])){
            include('chapter.php');
        }elseif(isset($_GET['note'])){
            include('note.php');
        }elseif(isset($_GET['question'])){
            include('question.php');
        }elseif(isset($_GET['teacher'])){
            include('teacher.php');
        }elseif(isset($_GET['student'])){
            include('student.php');
        }elseif(isset($_GET['insert_university'])){
            include('insert_university.php');
        }elseif(isset($_GET['insert_faculty'])){
            include('insert_faculty.php');
        }elseif(isset($_GET['insert_level'])){
            include('insert_level.php');
        }elseif(isset($_GET['insert_program'])){
            include('insert_program.php');
        }elseif(isset($_GET['insert_semester'])){
            include('insert_semester.php');
        }elseif(isset($_GET['insert_subject'])){
            include('insert_subject.php');
        }elseif(isset($_GET['insert_chapter'])){
            include('insert_chapter.php');
        }elseif(isset($_GET['insert_note'])){
            include('insert_note.php');
        }elseif(isset($_GET['insert_question'])){
            include('insert_question.php');
        }elseif(isset($_GET['insert_teacher'])){
            include('insert_teacher.php');
        }elseif(isset($_GET['insert_student'])){
            include('insert_student.php');
        }elseif(isset($_GET['update_teacher'])){
            include('update_teacher.php');
        }elseif(isset($_GET['update_question'])){
            include('update_question.php');
        }elseif(isset($_GET['update_note'])){
            include('update_note.php');
        }elseif(isset($_GET['update_subject'])){
            include('update_subject.php');
        }elseif(isset($_GET['update_chapter'])){
            include('update_chapter.php');
        }elseif(isset($_GET['update_semester'])){
            include('update_semester.php');
        }elseif(isset($_GET['update_program'])){
            include('update_program.php');
        }elseif(isset($_GET['update_level'])){
            include('update_level.php');
        }elseif(isset($_GET['update_faculty'])){
            include('update_faculty.php');
        }elseif(isset($_GET['update_university'])){
            include('update_university.php');
        }elseif(isset($_GET['delete_student'])){
            include('delete_student.php');
        }elseif(isset($_GET['delete_teacher'])){
            include('delete_teacher.php');
        }elseif(isset($_GET['delete_question'])){
            include('delete_question.php');
        }elseif(isset($_GET['delete_note'])){
            include('delete_note.php');
        }elseif(isset($_GET['delete_subject'])){
            include('delete_subject.php');
        }elseif(isset($_GET['delete_chapter'])){
            include('delete_chapter.php');
        }elseif(isset($_GET['delete_semester'])){
            include('delete_semester.php');
        }elseif(isset($_GET['delete_program'])){
            include('delete_program.php');
        }elseif(isset($_GET['delete_level'])){
            include('delete_level.php');
        }elseif(isset($_GET['delete_faculty'])){
            include('delete_faculty.php');
        }elseif(isset($_GET['delete_university'])){
            include('delete_university.php');
        }elseif(isset($_GET['admin_profile'])){
            include('admin_profile.php');
        }elseif(isset($_GET['update_admin'])){
            include('update_admin.php');
        }elseif(isset($_GET['delete_admin'])){
            include('delete_admin.php');
        }else{
            echo"<div class='container-fluid mt-5 h-50 d-flex align-items-center justify-content-center'>
            <h1>Welcome Admin (".$_SESSION['admin_name'].") </h1></div> ";

        }
        ?>
    </div>
    </div>



</body>
</html>