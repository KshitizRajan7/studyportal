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
    <title>Study Portal</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- bootstarp JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      *{
        /* overflow-x:hidden; */
            }
      .card_img{
        width:250px;
        height:250px;
        object-fit:contain;
      }

      .title {
    position: relative;
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(0, 0, 0, 0.8));}
.nav_color {
    position: relative;
    background: linear-gradient(to bottom, rgba(255, 255, 255, 0), rgba(255, 255, 255,1));
}
      .bg_card{
        background-color: rgba(34, 34, 34, 0.8); /* Dark gray with 80% opacity */
        border: none;

      }
        body{
        background-color: rgb(34,34,34);
      }
      .kshitiz {
    font-family: 'YourBoldFont', sans-serif;
    font-size: 4em;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin: 0; /* Remove margin */
    padding: 0; /* Remove padding */
    position: absolute; 
     top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); 
    line-height:1;
}
      
    </style>
</head>
<body>
<!-- nav link -->
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand text-secondary" href="index.php">LOGO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="index.php?universities">Universities</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-light" href='index.php?certainnote'>Notes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href='index.php?certainquestion'>Questions</a>
        </li>
</ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" name='search_data' placeholder="Search for the Subject" aria-label="Search">
        <button name='search_data_btn' class="btn btn-outline-light" type="submit"><i class='fas fa-search'></i></button>
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <?php 
        if(isset($_SESSION['user_name'])){
          $user_name=$_SESSION['user_name'];
        echo"
        <li class='nav-item dropdown' style=''>
          <a class='nav-link dropdown-toggle text-light' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Welcome ".$user_name."
          </a>

          <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='students/index.php?student_profile'>My Account</a></li>
            <li><hr class='dropdown-divider'></li>
            <li><a class='dropdown-item' href='signout.php'>Sign Out</a></li>
          </ul>
        </li>
</ul>";
        }else{
          echo"
          <li class='nav-item dropdown'>
            <a class='nav-link dropdown-toggle text-white' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
              Welcome Guest
            </a>
            <ul class='dropdown-menu bg_card'>
              <li><a class='dropdown-item text-info' href='user_login.php'>Sign in</a></li>
              <li><hr class='dropdown-divider'></li>
              <li><a class='dropdown-item text-info' href='user_registration.php'>Sign up</a></li>
            </ul>
          </li>
  </ul>"   ; 
        }
?>
      </form>
    </div>
  </div>
</nav>

<!-- body  -->
<h1 class='text-center title text-light'>Study Portal</h1>


<div class='row'>
  <div class='col-md-12'>
    <div class='row m-auto'>
<?php 
  if(!isset($_GET['university'])){
  if(!isset($_GET['universities'])){
    if(!isset($_GET['faculty'])){
    if(!isset($_GET['search_data'])){
        if(!isset($_GET['level'])){
        if(!isset($_GET['program'])){
        if(!isset($_GET['semester'])){
        if(!isset($_GET['subject'])){
        if(!isset($_GET['notes'])){
        if(!isset($_GET['question'])){
        if(!isset($_GET['chapters'])){
        if(!isset($_GET['certainnote'])){
        if(!isset($_GET['certainquestion'])){
          echo"
          <div class=' d-flex justify-content-center align-item-center'>
          <h1 class='text-light kshitiz'> Kshitiz Rajan Dev</h1>
          </div>";
}}}}}}}}}}}}}
search_data_button();
 get_universities();
 select_faculty();
 select_level();
 select_program();
 select_semester();
 select_subject();
 select_note_question();
 select_chapter();
 select_note();
 select_question();
 get_certain_note();
 get_certain_question();
 show_pdf();
?>
</div>
</div>
</div>


</body>
</html>