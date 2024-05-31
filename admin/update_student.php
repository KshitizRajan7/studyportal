<?php
if(isset($_GET['update_student'])){
$student_id=$_GET['update_student'];
$select_query="select * from `students` where student_id=$student_id";
$result=mysqli_query($con,$select_query);
$row=mysqli_fetch_assoc($result);
$student_name=$row['student_name'];
$faculty_name=$row['faculty_name'];
$level_name=$row['level_name'];
$program_name=$row['program_name'];
$student_email=$row['student_email'];
$student_password=$row['student_password'];
$student_image=$row['student_image'];
$student_address=$row['student_address'];
$student_mobile=$row['student_mobile'];
}
?>

<h1 class='text-center'>Update Student</h1>
<form action="" method='post' enctype='multipart/form-data' class='mt-5'>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="student_name" class='form-label'>Student Name</label>
        <input type="text" class='form-control' name='student_name' value='<?php echo $student_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="faculty_name" class='form-label'>Faculty Name</label>
        <input type="text" class='form-control' name='faculty_name' value='<?php echo $faculty_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="level_name" class='form-label'>Level Name</label>
        <input type="text" class='form-control' name='level_name' value='<?php echo $level_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="program_name" class='form-label'>Program Name</label>
        <input type="text" class='form-control' name='program_name' value='<?php echo $program_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="student_email" class='form-label'>Student Email</label>
        <input type="email" class='form-control' name='student_email' value='<?php echo $student_email?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="student_password" class='form-label'>Student Password</label>
        <input type="text" class='form-control' name='student_password' value='<?php echo $student_password?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="student_image" class='form-label'>Student Image</label>
        <div class='d-flex'>
        <input type="file" class='form-control w-90 m-auto' name='student_image'>
        <img src="students_photo/<?php echo $student_image ?>" class='table_image'>
</div>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="student_address" class='form-label'>Student Address</label>
        <input type="text" class='form-control' name='student_address' value='<?php echo $student_address?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="student_mobile" class='form-label'>Student Mobile</label>
        <input type="text" class='form-control' name='student_mobile' value='<?php echo $student_mobile?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <input type="submit" class='form-control btn btn-info my-5' name='update_student' value='Update Student'>
    </div>

</form>
<?php 
if(isset($_POST['update_student'])){
    $new_student_name=$_POST['student_name'];
    $new_faculty_name=$_POST['faculty_name'];
    $new_level_name=$_POST['level_name'];
    $new_program_name=$_POST['program_name'];
    $new_student_email=$_POST['student_email'];
    $new_student_password=$_POST['student_password'];
    $new_student_address=$_POST['student_address'];
    $new_student_mobile=$_POST['student_mobile'];
    $new_student_image=$_FILES['student_image']['name'];
    $tmp_student_image=$_FILES['student_image']['tmp_name'];
    
    $select="select * from `students` where student_name='$new_student_name' and student_email='$new_student_email' and student_mobile='$new_student_mobile'";
    $run_select=mysqli_query($con,$select);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('The student detail is already registered !! ')</script>";
    }
    move_uploaded_file($tmp_student_image,"students_photo/$new_student_image");
    $update="update `students` set 
     student_name='$new_student_name',
     faculty_name='$new_faculty_name',
     level_name='$new_level_name',
     program_name='$new_program_name',
     student_email='$new_student_email',
     student_password='$new_student_password',
     student_image='$new_student_image',
     student_address='$new_student_address',
     student_mobile='$new_student_mobile'
     where student_id=$student_id
      ";
      $run_update=mysqli_query($con,$update);
      if($run_update){
        echo "<script>alert('Student information Updated!!')</script>";
        echo "<script>window.open('index.php?student','_self')</script>";
      }
}
?> 