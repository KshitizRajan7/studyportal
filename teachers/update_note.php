
<?php
if(isset($_GET['update_note'])){
$note_id=$_GET['update_note'];
$select_query="select * from `notes` where note_id=$note_id";
$result=mysqli_query($con,$select_query);
$row=mysqli_fetch_assoc($result);
$note_name=$row['note_name'];
$subject_code=$row['subject_code'];
$note_image=$row['note_image'];
}
?>

<h1 class='text-center'>Update note</h1>
<form action="" method='post' enctype='multipart/form-data' class='mt-5'>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="note_name" class='form-label'>note Name</label>
        <input type="text" class='form-control' name='note_name' value='<?php echo $note_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="subject_code" class='form-label'>Subject Code</label>
        <input type="text" class='form-control' name='subject_code' value='<?php echo $subject_code?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="note_image" class='form-label'>Note Image</label>
        <div class='d-flex'>
        <input type="file" class='form-control w-90 m-auto' name='note_image'>
        <img src="notes/<?php echo $note_image ?>" class='table_image'>
</div>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <input type="submit" class='form-control btn btn-info my-5' name='update_note' value='Update note'>
    </div>
</form>
<?php 
if(isset($_POST['update_note'])){
    $new_note_name=$_POST['note_name'];
    $new_subject_code=$_POST['subject_code'];
    $new_note_image=$_FILES['note_image']['name'];
    $tmp_note_image=$_FILES['note_image']['tmp_name'];
    
    $select="select * from `notes` where note_name='$new_note_name' and subject_code='$new_subject_code'";
    $run_select=mysqli_query($con,$select);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('The note detail is already registered !! ')</script>";
    }
    move_uploaded_file($tmp_note_image,"notes/$new_note_image");
    $update="update `notes` set 
     note_name='$new_note_name',
     subject_code='$new_subject_code',
     note_image='$new_note_image'
     where note_id=$note_id
      ";
      $run_update=mysqli_query($con,$update);
      if($run_update){
        echo "<script>alert('Note information Updated!!')</script>";
        echo "<script>window.open('index.php?note','_self')</script>";
      }
}
?> 