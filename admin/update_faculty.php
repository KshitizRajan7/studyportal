
<?php
if(isset($_GET['update_faculty'])){
$faculty_id=$_GET['update_faculty'];
$select_query="select * from `faculties` where faculty_id=$faculty_id";
$result=mysqli_query($con,$select_query);
$row=mysqli_fetch_assoc($result);
$faculty_name=$row['faculty_name'];
}
?>

<h1 class='text-center'>Update Faculty</h1>
<form action="" method='post' enctype='multipart/form-data' class='mt-5'>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="faculty_name" class='form-label'>Faculty Name</label>
        <input type="text" class='form-control' name='faculty_name' value='<?php echo $faculty_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <input type="submit" class='form-control btn btn-info my-5' name='update_faculty' value='Update faculty'>
    </div>
</form>
<?php 
if(isset($_POST['update_faculty'])){
    $new_faculty_name=$_POST['faculty_name'];
  
    $select="select * from `faculties` where faculty_name='$new_faculty_name'";
    $run_select=mysqli_query($con,$select);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('The Faculty detail is already registered !! ')</script>";
    }
    $update="update `faculties` set 
     faculty_name='$new_faculty_name'
     where faculty_id=$faculty_id
      ";
      $run_update=mysqli_query($con,$update);
      if($run_update){
        echo "<script>alert('Faculty information Updated!!')</script>";
        echo "<script>window.open('index.php?faculty','_self')</script>";
      }
}
?> 