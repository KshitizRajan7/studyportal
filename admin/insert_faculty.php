<h1 class='text-center bg-dark text-light'>Insert Faculty</h1>
<div class="container-fluid m-auto w-50">
    <form action="" method='post' enctype='multipart/form-data'>
        <div class="form-outline mt-2">
            <label for="faculty_name" class='form-label'>Faculty Name</label>
            <input type="text" name='faculty_name' class='form-control' placeholder='Enter Faculty Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="university_name" class='form-label'>University Name</label>
            <select class='form-select' name="university_name">
                <option value='$university_name'>Select University</option> 
            <?php 
            $select_university="select * from `universities`";
            $run_university=mysqli_query($con,$select_university);
            while($fetch_university=mysqli_fetch_array($run_university)){
                $university_name=$fetch_university['university_name'];
                echo"
                 <option value='$university_name'>$university_name</option>";
            }
            ?>    
            </select>
        </div>
        <div class="form-outline mt-2">
            <input type="submit" name='faculty_submit' class='form-control btn btn-success' value='Insert Facutly'>
        </div>
    </form>
</div>


<?php 
if(isset($_POST['faculty_submit'])){
    $faculty_name=$_POST['faculty_name'];
    $select_query="select * from `faculties` where faculty_name='$faculty_name'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This faculty detail is already registered !!')</script>";
    }else{
    $insert_query="insert into `faculties` (faculty_name) values ('$faculty_name')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('faculty Inserted !!')</script>";
        echo "<script>window.open('index.php?faculty','_self')'</script>";
    }}
}
?>