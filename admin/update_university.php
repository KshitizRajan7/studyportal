
<?php
if(isset($_GET['update_university'])){
$university_id=$_GET['update_university'];
$select_query="select * from `universities` where university_id=$university_id";
$result=mysqli_query($con,$select_query);
$row=mysqli_fetch_assoc($result);
$university_name=$row['university_name'];
$university_email=$row['university_email'];
$university_image=$row['university_image'];
$university_address=$row['university_address'];
$university_phone=$row['university_phone'];
}
?>

<h1 class='text-center'>Update University</h1>
<form action="" method='post' enctype='multipart/form-data' class='mt-5'>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="university_name" class='form-label'>University Name</label>
        <input type="text" class='form-control' name='university_name' value='<?php echo $university_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="university_email" class='form-label'>University Email</label>
        <input type="email" class='form-control' name='university_email' value='<?php echo $university_email?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="university_image" class='form-label'>University Image</label>
        <div class='d-flex'>
        <input type="file" class='form-control w-90 m-auto' name='university_image'>
        <img src="university_logos/<?php echo $university_image ?>" class='table_image'>
</div>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="university_address" class='form-label'>University Address</label>
        <input type="text" class='form-control' name='university_address' value='<?php echo $university_address?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="university_mobile" class='form-label'>University Phone</label>
        <input type="text" class='form-control' name='university_phone' value='<?php echo $university_phone?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <input type="submit" class='form-control btn btn-info my-5' name='update_university' value='Update University'>
    </div>
</form>
<?php 
if(isset($_POST['update_university'])){
    $new_university_name=$_POST['university_name'];
    $new_university_email=$_POST['university_email'];
    $new_university_address=$_POST['university_address'];
    $new_university_phone=$_POST['university_phone'];
    $new_university_image=$_FILES['university_image']['name'];
    $tmp_university_image=$_FILES['university_image']['tmp_name'];
    
    $select="select * from `universities` where university_name='$new_university_name' and university_email='$new_university_email' and university_phone='$new_university_phone'";
    $run_select=mysqli_query($con,$select);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('The University detail is already registered !! ')</script>";
    }
    move_uploaded_file($tmp_university_image,"university_logos/$new_university_image");
    $update="update `universities` set 
     university_name='$new_university_name',
     university_email='$new_university_email',
     university_image='$new_university_image',
     university_address='$new_university_address',
     university_phone='$new_university_phone'
     where university_id=$university_id
      ";
      $run_update=mysqli_query($con,$update);
      if($run_update){
        echo "<script>alert('University information Updated!!')</script>";
        echo "<script>window.open('index.php?universities','_self')</script>";
      }
}
?> 