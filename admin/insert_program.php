<h1 class='text-center bg-dark text-light'>Insert Program</h1>
<div class="container-fluid m-auto w-50">
    <form action="" method='post' enctype='multipart/form-data'>
        <div class="form-outline mt-2">
            <label for="program_name" class='form-label'>Program Name</label>
            <input type="text" name='program_name' class='form-control' placeholder='Enter Program Name'/>
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
            <label for="level_name" class='form-label'>Level Name</label>
            <select class='form-select' name='level_name'>
                <option>Select Level</option> 
            <?php
            $select_level="select * from `level`";
            $run_level=mysqli_query($con,$select_level);
            while($fetch=mysqli_fetch_array($run_level)){
                $level_name=$fetch['level_name'];
                echo"
                <option value='$level_name'>$level_name</option>        
                ";
            }
            ?>
            </select>
        </div>
        <div class="form-outline mt-2">
            <input type="submit" name='program_submit' class='form-control btn btn-success' value='Insert Program'>
        </div>
    </form>
</div>

<?php 
if(isset($_POST['program_submit'])){
    $program_name=$_POST['program_name'];
    $select_query="select * from `programs` where program_name='$program_name'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This program detail is already registered !!')</script>";
    }else{
    $insert_query="insert into `programs` (program_name) values ('$program_name')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Program Inserted !!')</script>";
        echo "<script>window.open('index.php?program','_self')'</script>";
    }}
}
?>