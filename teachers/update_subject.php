
<?php
if(isset($_GET['update_subject'])){
$subject_id=$_GET['update_subject'];
$select_query="select * from `subjects` where subject_id=$subject_id";
$result=mysqli_query($con,$select_query);
$row=mysqli_fetch_assoc($result);
$subject_name=$row['subject_name'];
$subject_code=$row['subject_code'];
}
?>

<h1 class='text-center'>Update subject</h1>
<form action="" method='post' enctype='multipart/form-data' class='mt-5'>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="subject_name" class='form-label'>Subject Name</label>
        <input type="text" class='form-control' name='subject_name' value='<?php echo $subject_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="subject_code" class='form-label'>Subject Code</label>
        <input type="text" class='form-control' name='subject_code' value='<?php echo $subject_code?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <input type="submit" class='form-control btn btn-info my-5' name='update_subject' value='Update Subject'>
    </div>
</form>
<?php 
if(isset($_POST['update_subject'])){
    $new_subject_name=$_POST['subject_name'];
    $new_subject_code=$_POST['subject_code'];
  
    $select="select * from `subjects` where subject_name='$new_subject_name' and subject_code='$new_subject_code'";
    $run_select=mysqli_query($con,$select);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('The subject detail is already registered !! ')</script>";
    }
    $update="update `subjects` set 
     subject_name='$new_subject_name',
     subject_code='$new_subject_code'
     where subject_id=$subject_id
      ";
      $run_update=mysqli_query($con,$update);
      if($run_update){
        echo "<script>alert('subject information Updated!!')</script>";
        echo "<script>window.open('index.php?subject','_self')</script>";
      }
}
?> 