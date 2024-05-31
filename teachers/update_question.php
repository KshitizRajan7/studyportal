
<?php
if(isset($_GET['update_question'])){
$question_id=$_GET['update_question'];
$select_query="select * from `questions` where question_id=$question_id";
$result=mysqli_query($con,$select_query);
$row=mysqli_fetch_assoc($result);
$question_name=$row['question_name'];
$subject_code=$row['subject_code'];
$question_image=$row['question_image'];
$question_year=$row['question_year'];
}
?>

<h1 class='text-center'>Update question</h1>
<form action="" method='post' enctype='multipart/form-data' class='mt-5'>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="question_name" class='form-label'>question Name</label>
        <input type="text" class='form-control' name='question_name' value='<?php echo $question_name?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="subject_code" class='form-label'>Subject Code</label>
        <input type="text" class='form-control' name='subject_code' value='<?php echo $subject_code?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="question_year" class='form-label'>Question Year</label>
        <input type="text" class='form-control' name='question_year' value='<?php echo $question_year?>'>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="question_image" class='form-label'>question Image</label>
        <div class='d-flex'>
        <input type="file" class='form-control w-90 m-auto' name='question_image'>
        <img src="questions/<?php echo $question_image ?>" class='table_image'>
</div>
    </div>
    <div class="form-outline w-50 mx-auto mb-3">
        <input type="submit" class='form-control btn btn-info my-5' name='update_question' value='Update question'>
    </div>
</form>
<?php 
if(isset($_POST['update_question'])){
    $new_question_name=$_POST['question_name'];
    $new_subject_code=$_POST['subject_code'];
    $new_question_year=$_POST['question_year'];
    $new_question_image=$_FILES['question_image']['name'];
    $tmp_question_image=$_FILES['question_image']['tmp_name'];
    
    $select="select * from `questions` where question_name='$new_question_name' and question_year='$new_question_year' and subject_code='$new_subject_code'";
    $run_select=mysqli_query($con,$select);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('The question detail is already registered !! ')</script>";
    }
    move_uploaded_file($tmp_question_image,"questions/$new_question_image");
    $update="update `questions` set 
     question_name='$new_question_name',
     subject_code='$new_subject_code',
     question_image='$new_question_image',
     question_year='$new_question_year'
     where question_id=$question_id
      ";
      $run_update=mysqli_query($con,$update);
      if($run_update){
        echo "<script>alert('Question information Updated!!')</script>";
        echo "<script>window.open('index.php?question','_self')</script>";
      }
}
?> 