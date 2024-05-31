
<?php
if(isset($_GET['update_semester'])){
$semester_id=$_GET['update_semester'];
$select_query="select * from `semesters` where semester_id=$semester_id";
$result=mysqli_query($con,$select_query);
$row=mysqli_fetch_assoc($result);
$semester_name=$row['semester_name'];
}
?>

<h1 class='text-center'>Update Semester</h1>
<form action="" method='post' enctype='multipart/form-data' class='mt-5'>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="semester_name" class='form-label'>semester Name</label>
        <input type="text" class='form-control' name='semester_name' value='<?php echo $semester_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <input type="submit" class='form-control btn btn-info my-5' name='update_semester' value='Update semester'>
    </div>
</form>
<?php 
if(isset($_POST['update_semester'])){
    $new_semester_name=$_POST['semester_name'];
  
    $select="select * from `semesters` where semester_name='$new_semester_name'";
    $run_select=mysqli_query($con,$select);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('The semester detail is already registered !! ')</script>";
    }
    $update="update `semesters` set 
     semester_name='$new_semester_name'
     where semester_id=$semester_id
      ";
      $run_update=mysqli_query($con,$update);
      if($run_update){
        echo "<script>alert('semester information Updated!!')</script>";
        echo "<script>window.open('index.php?semester','_self')</script>";
      }
}
?> 