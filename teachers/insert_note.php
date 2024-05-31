<h1 class='text-center bg-dark text-light'>Insert Note</h1>
<div class="container-fluid m-auto w-50">
    <form action="" method='post' enctype='multipart/form-data'>
        <div class="form-outline mt-2">
            <label for="note_name" class='form-label'>Note Name</label>
            <input type="text" name='note_name' class='form-control' placeholder='Enter Note Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="subject_code" class='form-label'>Subject Code</label>
            <input type="text" name='subject_code' class='form-control' placeholder='Enter Subject Code'/>
        </div>
        <div class="form-outline mt-2">
            <label for="note_image" class='form-label'>Note Image</label>
            <input type="file" name='note_image' class='form-control'/>
        </div>
        <div class="form-outline mt-2">
            <input type="submit" name='note_submit' class='form-control btn btn-success' value='Insert Note'>
        </div>
    </form>
</div>


<?php 
if(isset($_POST['note_submit'])){
    $note_name=$_POST['note_name'];
    $subject_code=$_POST['subject_code'];

    $note_image=$_FILES['note_image']['name'];
    $note_tmp_image=$_FILES['note_image']['tmp_name'];
    
    $select_query="select * from `notes` where note_name='$note_name' and subject_code='$subject_code'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This note detail is already registered !!')</script>";
    }else{
    move_uploaded_file($note_tmp_image,"Notes/$note_image");
    $insert_query="insert into `notes` (note_name,subject_code,note_image) values ('$note_name','$subject_code','$note_image')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Note Inserted !!')</script>";
        echo "<script>window.open('index.php?note','_self')'</script>";
    }}
}
?>