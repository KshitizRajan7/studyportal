
<?php
if(isset($_GET['update_program'])){
$program_id=$_GET['update_program'];
$select_query="select * from `programs` where program_id=$program_id";
$result=mysqli_query($con,$select_query);
$row=mysqli_fetch_assoc($result);
$program_name=$row['program_name'];
}
?>

<h1 class='text-center'>Update Program</h1>
<form action="" method='post' enctype='multipart/form-data' class='mt-5'>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="program_name" class='form-label'>Program Name</label>
        <input type="text" class='form-control' name='program_name' value='<?php echo $program_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <input type="submit" class='form-control btn btn-info my-5' name='update_program' value='Update program'>
    </div>
</form>
<?php 
if(isset($_POST['update_program'])){
    $new_program_name=$_POST['program_name'];
  
    $select="select * from `programs` where program_name='$new_program_name'";
    $run_select=mysqli_query($con,$select);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('The program detail is already registered !! ')</script>";
    }
    $update="update `programs` set 
     program_name='$new_program_name'
     where program_id=$program_id
      ";
      $run_update=mysqli_query($con,$update);
      if($run_update){
        echo "<script>alert('program information Updated!!')</script>";
        echo "<script>window.open('index.php?program','_self')</script>";
      }
}
?> 