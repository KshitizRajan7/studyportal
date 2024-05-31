<h1 class='text-center bg-dark text-light'>Insert Question</h1>
<div class="container-fluid m-auto w-50">
    <form action="" method='post' enctype='multipart/form-data'>
        <div class="form-outline mt-2">
            <label for="question_name" class='form-label'>Question Name</label>
            <input type="text" name='question_name' class='form-control' placeholder='Enter Question Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="subject_code" class='form-label'>Subject Code</label>
            <input type="text" name='subject_code' class='form-control' placeholder='Enter Subject Code'/>
        </div>
        <div class="form-outline mt-2">
            <label for="question_year" class='form-label'>Question Year</label>
            <input type="text" name='question_year' class='form-control' placeholder='Enter Question Year'/>
        </div>
        <div class="form-outline mt-2">
            <label for="question_image" class='form-label'>Question Image</label>
            <input type="file" name='question_image' class='form-control'/>
        </div>
        <div class="form-outline mt-2">
            <input type="submit" name='question_submit' class='form-control btn btn-success' value='Insert Question'>
        </div>
    </form>
</div>


<?php 
if(isset($_POST['question_submit'])){
    $question_name=$_POST['question_name'];
    $question_year=$_POST['question_year'];
    $subject_code=$_POST['subject_code'];

    $question_image=$_FILES['question_image']['name'];
    $question_tmp_image=$_FILES['question_image']['tmp_name'];
    
    $select_query="select * from `questions` where question_name='$question_name' and question_year='$question_year' and subject_code='$subject_code'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This question detail is already registered !!')</script>";
    }else{
    move_uploaded_file($question_tmp_image,"questions/$question_image");
    $insert_query="insert into `questions` (question_name,subject_code,question_image,question_year) values ('$question_name','$subject_code','$question_image','$question_year')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Question Inserted !!')</script>";
        echo "<script>window.open('index.php?question','_self')'</script>";
    }}
}
?>