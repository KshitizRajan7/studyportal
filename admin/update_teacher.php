
<?php
if(isset($_GET['update_teacher'])){
$teacher_id=$_GET['update_teacher'];
$select_query="select * from `teachers` where teacher_id=$teacher_id";
$result=mysqli_query($con,$select_query);
$row=mysqli_fetch_assoc($result);
$teacher_name=$row['teacher_name'];
$subject_name=$row['subject_name'];
$teacher_email=$row['teacher_email'];
$teacher_password=$row['teacher_password'];
$teacher_image=$row['teacher_image'];
$teacher_address=$row['teacher_address'];
$teacher_mobile=$row['teacher_mobile'];
}
?>

<h1 class='text-center'>Update teacher</h1>
<form action="" method='post' enctype='multipart/form-data' class='mt-5'>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="teacher_name" class='form-label'>Teacher Name</label>
        <input type="text" class='form-control' name='teacher_name' value='<?php echo $teacher_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="subject_name" class='form-label'>Subject Name</label>
        <input type="text" class='form-control' name='subject_name' value='<?php echo $subject_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="teacher_email" class='form-label'>Teacher Email</label>
        <input type="email" class='form-control' name='teacher_email' value='<?php echo $teacher_email?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="teacher_password" class='form-label'>Teacher Password</label>
        <input type="text" class='form-control' name='teacher_password' value='<?php echo $teacher_password?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="teacher_image" class='form-label'>Teacher Image</label>
        <div class='d-flex'>
        <input type="file" class='form-control w-90 m-auto' name='teacher_image'>
        <img src="teachers_photo/<?php echo $teacher_image ?>" class='table_image'>
</div>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="teacher_address" class='form-label'>Teacher Address</label>
        <input type="text" class='form-control' name='teacher_address' value='<?php echo $teacher_address?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="teacher_mobile" class='form-label'>Teacher Mobile</label>
        <input type="text" class='form-control' name='teacher_mobile' value='<?php echo $teacher_mobile?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <input type="submit" class='form-control btn btn-info my-5' name='update_teacher' value='Update teacher'>
    </div>
</form>
<?php 
if(isset($_POST['update_teacher'])){
    $new_teacher_name=$_POST['teacher_name'];
    $new_subject_name=$_POST['subject_name'];
    $new_teacher_email=$_POST['teacher_email'];
    $new_teacher_password=$_POST['teacher_password'];
    $new_teacher_address=$_POST['teacher_address'];
    $new_teacher_mobile=$_POST['teacher_mobile'];
    $new_teacher_image=$_FILES['teacher_image']['name'];
    $tmp_teacher_image=$_FILES['teacher_image']['tmp_name'];
    
    $select="select * from `teachers` where teacher_name='$new_teacher_name' and teacher_email='$new_teacher_email' and teacher_mobile='$new_teacher_mobile'";
    $run_select=mysqli_query($con,$select);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('The teacher detail is already registered !! ')</script>";
    }
    move_uploaded_file($tmp_teacher_image,"teachers_photo/$new_teacher_image");
    $update="update `teachers` set 
     teacher_name='$new_teacher_name',
     subject_name='$new_subject_name',
     teacher_email='$new_teacher_email',
     teacher_password='$new_teacher_password',
     teacher_image='$new_teacher_image',
     teacher_address='$new_teacher_address',
     teacher_mobile='$new_teacher_mobile'
     where teacher_id=$teacher_id
      ";
      $run_update=mysqli_query($con,$update);
      if($run_update){
        echo "<script>alert('teacher information Updated!!')</script>";
        echo "<script>window.open('index.php?teacher','_self')</script>";
      }
}
?> 