<style>
    .profile_image{
        width:250px;
        height:250px;
        border-radius:50%;
        object-fit:cover;
        margin:auto;
        display:block;
        overflow:hidden;
    }
</style>
<h1 class="text-center">student Profile</h1>
<?php 
$student_name=$_SESSION['user_name'];
$select_student="select * from `students` where student_name='$student_name'";
$run_select=mysqli_query($con,$select_student);
$fetch=mysqli_fetch_assoc($run_select);
$student_image=$fetch['student_image'];
$student_id=$fetch['student_id'];
$level_name=$fetch['level_name'];
$faculty_name=$fetch['faculty_name'];
$program_name=$fetch['program_name'];
echo"
<img src='../admin/students_photo/$student_image' alt='' style='border-radius:50%' class='profile_image mt-5'/>
<h3 class='text-center'>".$_SESSION['user_name']."</h3>
<h3 class='text-center'>'".$level_name."' student</h3>
<h3 class='text-center'>'".$faculty_name."' faculty</h3>
<h3 class='text-center'>'".$program_name."' program</h3>
<div class='text-center'>
<a href='index.php?update_student=$student_id' class='btn btn-info w-50 my-2'>Update student</a>
<a href='index.php?delete_student=$student_id' class='btn btn-danger w-50 '>Delete student</a> </div>";

?>