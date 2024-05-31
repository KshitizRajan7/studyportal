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
<h1 class="text-center">Teacher Profile</h1>
<?php 
$teacher_name=$_SESSION['teacher_name'];
$select_teacher="select * from `teachers` where teacher_name='$teacher_name'";
$run_select=mysqli_query($con,$select_teacher);
$fetch=mysqli_fetch_assoc($run_select);
$teacher_image=$fetch['teacher_image'];
$subject_name=$fetch['subject_name'];
echo"
<img src='../admin/teachers_photo/$teacher_image' alt='' style='border-radius:50%' class='profile_image mt-5'/>
<h3 class='text-center'>".$_SESSION['teacher_name']."</h3>
<h3 class='text-center'>'".$subject_name."' Teacher</h3>
<div class='text-center'>
<a href='index.php?update_teacher' class='btn btn-info w-50 my-2'>Update teacher</a>
<a href='index.php?delete_teacher' class='btn btn-danger w-50 '>Delete teacher</a> </div>";

?>