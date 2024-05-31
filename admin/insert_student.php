<h1 class='text-center bg-dark text-light'>Insert Student</h1>
<div class="container-fluid m-auto w-50">
    <form action="" method='post' enctype='multipart/form-data'>
        <div class="form-outline mt-2">
            <label for="student_name" class='form-label'>Student Name</label>
            <input type="text" name='student_name' class='form-control' placeholder='Enter Student Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="faculty_name" class='form-label'>Faculty Name</label>
            <input type="text" name='faculty_name' class='form-control' placeholder='Enter Faculty Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="level_name" class='form-label'>Level Name</label>
            <input type="text" name='level_name' class='form-control' placeholder='Enter Level Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="program_name" class='form-label'>Program Name</label>
            <input type="text" name='program_name' class='form-control' placeholder='Enter Program Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="student_email" class='form-label'>Student Email</label>
            <input type="email" name='student_email' class='form-control' placeholder='Enter Student Email'/>
        </div>
        <div class="form-outline mt-2">
            <label for="student_image" class='form-label'>Student Image</label>
            <input type="file" name='student_image' class='form-control'/>
        </div>
        <div class="form-outline mt-2">
            <label for="student_address" class='form-label'>Student Address</label>
            <input type="text" name='student_address' class='form-control' placeholder='Enter Student Address'/>
        </div>
        <div class="form-outline mt-2">
            <label for="student_phone" class='form-label'>Student Phone</label>
            <input type="text" name='student_phone' class='form-control' placeholder='Enter Student Phone'/>
        </div>
        <div class="form-outline mt-2">
            <input type="submit" name='student_submit' class='form-control btn btn-success' value='Insert Student'>
        </div>
    </form>
</div>


<?php 
if(isset($_POST['student_submit'])){
    $student_name=$_POST['student_name'];
    $faculty_name=$_POST['faculty_name'];
    $level_name=$_POST['level_name'];
    $program_name=$_POST['program_name'];
    $student_email=$_POST['student_email'];
    $student_password=$_POST['student_password'];
    $hash_password=password_hash($student_password,PASSWORD_DEFAULT);
    $confirm_password=$_POST['confirm_password'];
    $student_address=$_POST['student_address'];
    $student_phone=$_POST['student_phone'];

    $student_image=$_FILES['student_image']['name'];
    $student_tmp_image=$_FILES['student_image']['tmp_name'];
    
    $select_query="select * from `students` where student_name='$student_name' and student_email='$student_email' and student_mobile='$student_phone'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This student detail is already registered !!')</script>";
    }elseif($student_password !== $confirm_password){
        echo "<script>alert('Password and confirm password did not matched!!')</script>";
    }else{
    move_uploaded_file($student_tmp_image,"students_photo/$student_image");
    $insert_query="insert into `students` (student_name,faculty_name,level_name,program_name,student_email,student_password,student_image,student_address,student_mobile) values ('$student_name','$faculty_name','$level_name','$program_name','$student_email','$hash_password','$student_image','$student_address','$student_phone')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Student Inserted !!')</script>";
        echo "<script>window.open('index.php?student','_self')'</script>";
    }}
}
?>