<h1 class='text-center bg-dark text-light'>Insert Level</h1>
<div class="container-fluid m-auto w-50">
    <form action="" method='post' enctype='multipart/form-data'>
        <div class="form-outline mt-2">
            <label for="level_name" class='form-label'>Level Name</label>
            <input type="text" name='level_name' class='form-control' placeholder='Enter Level Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="university_name" class='form-label'>University Name</label>
            <select class='form-select' name='university_name'>
                <option>Select University</option> 
            <?php
            $select_universities="select * from `universities`";
            $run_select=mysqli_query($con,$select_universities);
            while($fetch=mysqli_fetch_array($run_select)){
                $university_name=$fetch['university_name'];
                echo"
                <option value='$university_name'>$university_name</option>        
                ";
            }
            ?>
            </select>
        </div>
        <div class="form-outline mt-2">
            <label for="faculty_name" class='form-label'>Faculty Name</label>
            <select class='form-select' name='faculty_name'>
                <option>Select Faculty</option> 
            <?php
            $select_faculties="select * from `faculties`";
            $run_faculties=mysqli_query($con,$select_faculties);
            while($fetch=mysqli_fetch_array($run_faculties)){
                $faculty_name=$fetch['faculty_name'];
                echo"
                <option value='$faculty_name'>$faculty_name</option>        
                ";
            }
            ?>
            </select>
        </div>
        <div class="form-outline mt-2">
            <input type="submit" name='level_submit' class='form-control btn btn-success' value='Insert Level'>
        </div>
    </form>
</div>

<?php 
if(isset($_POST['level_submit'])){
    $level_name=$_POST['level_name'];
    $university_name=$_POST['university_name'];
    $select_query="select * from `level` where level_name='$level_name' and university_name='$university_name'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This level detail is already registered !!')</script>";
    }else{
    $insert_query="insert into `level` (level_name,university_name) values ('$level_name','$university_name')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('level Inserted !!')</script>";
        echo "<script>window.open('index.php?level','_self')'</script>";
    }}
}
?>