<?php 
if(isset($_GET['update_teacher'])){
    $teacher_name=$_SESSION['teacher_name'];
    $select_teacher="select * from `teachers` where teacher_name='$teacher_name'";
    $run_select=mysqli_query($con,$select_teacher);
    $fetch=mysqli_fetch_assoc($run_select);
    $teacher_image=$fetch['teacher_image'];
    $teacher_email=$fetch['teacher_email'];
    $subject_name=$fetch['subject_name'];
}
?>

<h1 class="text-center">Update teacher</h1>
<form action="" method='post' enctype='multipart/form-data'>
    <div class="form-outline mb-3 w-50 m-auto">
        <label for="teacher_name" class="form-label">Teacher Name</label>
        <input type="text" class="form-control" name='teacher_name' value=<?php echo $teacher_name ?>>
    </div>
    <div class="form-outline mb-3 w-50 m-auto">
        <label for="subject_name" class="form-label">Subject Name</label>
        <input type="text" class="form-control" name='subject_name' value='<?php echo $subject_name ?> '>
    </div>
    <div class="form-outline mb-3 w-50 m-auto">
        <label for="teacher_email" class="form-label">Teacher Email</label>
        <input type="email" class="form-control" name='teacher_email' value=<?php echo $teacher_email ?>>
    </div>
    <div class="form-outline mb-3 d-flex w-50 m-auto">
        <!-- <label for="teacher_image" class="form-label">teacherImage</label> -->
        <input type="file" class="form-control m-auto" name='teacher_image'>
        <img src="../admin/teachers_photo/<?php echo $teacher_image ?>" alt="" class='table_image'>
    </div>
    <div class="form-outline mb-3 w-50 m-auto text-center">
        <input type="submit" class="btn btn-info" name='update_teacher' value='Update'>
    </div>
</form>

<?php 
if(isset($_POST['update_teacher'])){
    $new_teacher_name=$_POST['teacher_name'];
    $new_subject_name=$_POST['subject_name'];
    $new_teacher_email=$_POST['teacher_email'];
    $new_teacher_image=$_FILES['teacher_image']['name'];
    $tmp_teacher_image=$_FILES['teacher_image']['tmp_name'];

    $select_teacher="select * from `teachers` where teacher_name='$new_teacher_name' and teacher_email='$new_teacher_email'";
    $run_select=mysqli_query($con,$select_teacher);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('This teacher detail is already registered !! ')</script>";
    }else{
        move_uploaded_file($tmp_teacher_image,"../admin/teachers_photo/$new_teacher_image");
        $update_query="update `teachers` set teacher_name='$new_teacher_name',subject_name='$new_subject_name',teacher_email='$new_teacher_email',teacher_image='$new_teacher_image'";
        $run_update=mysqli_query($con,$update_query);
        if($run_update){
            echo "<script>alert('Updated !! ')</script>";
            echo "<script>window.open('teacher_signin.php','_self')</script>";
        }
    }
    
}
?>