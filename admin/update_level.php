
<?php
if(isset($_GET['update_level'])){
$level_id=$_GET['update_level'];
$select_query="select * from `level` where level_id=$level_id";
$result=mysqli_query($con,$select_query);
$row=mysqli_fetch_assoc($result);
$level_name=$row['level_name'];
}
?>

<h1 class='text-center'>Update Level</h1>
<form action="" method='post' enctype='multipart/form-data' class='mt-5'>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="level_name" class='form-label'>level Name</label>
        <input type="text" class='form-control' name='level_name' value='<?php echo $level_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <input type="submit" class='form-control btn btn-info my-5' name='update_level' value='Update level'>
    </div>
</form>
<?php 
if(isset($_POST['update_level'])){
    $new_level_name=$_POST['level_name'];
  
    $select="select * from `level` where level_name='$new_level_name'";
    $run_select=mysqli_query($con,$select);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('The Level detail is already registered !! ')</script>";
    }
    $update="update `level` set 
     level_name='$new_level_name'
     where level_id=$level_id
      ";
      $run_update=mysqli_query($con,$update);
      if($run_update){
        echo "<script>alert('Level information Updated!!')</script>";
        echo "<script>window.open('index.php?level','_self')</script>";
      }
}
?> 