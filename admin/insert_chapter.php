<h1 class='text-center bg-dark text-light'>Insert chapter</h1>
<div class="container-fluid m-auto w-50">
    <form action="" method='post' enctype='multipart/form-data'>
        <div class="form-outline mt-2">
            <label for="chapter_name" class='form-label'>Chapter Name</label>
            <input type="text" name='chapter_name' class='form-control' placeholder='Enter Chapter Name'/>
        </div>
        <div class="form-outline mt-2">
            <label for="subject_name" class='form-label'>Subject Name</label>
            <select class='form-select' name='subject_name'>
                <option value=''>Select Subject</option> 
            <?php 
            $select_subject="select * from `subjects`";
            $run_subject=mysqli_query($con,$select_subject);
            while($fetch_subject=mysqli_fetch_array($run_subject)){
                $subject_name=$fetch_subject['subject_name'];
                echo"
                 <option value='$subject_name'>$subject_name</option>";
            }
            ?>    
            </select>
        </div>
        <div class="form-outline mt-2">
            <label for="university_name" class='form-label'>University Name</label>
            <select class='form-select' name="university_name">
                <option value=''>Select University</option> 
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
        <!-- js code for popolating the next select tag dynamically  -->
        <div class="form-outline mt-2">
            <label for="level_name" class='form-label'>Level Name</label>
            <select class='form-select'c name='level_name'>
                <option value="">Select Level</option> 
            <?php 
            $select_level="select * from `level`";
            $run_level=mysqli_query($con,$select_level);
            while($fetch_level=mysqli_fetch_array($run_level)){
                $level_name=$fetch_level['level_name'];
                echo"
                 <option value='$level_name'>$level_name</option>";
            }
            ?>    
            </select>
        </div>
        <div class="form-outline mt-2">
            <label for="program_name" class='form-label'>Program Name</label>
            <select class='form-select' name='program_name'>
                <option>Select Program</option> 
            <?php
            $select_program="select * from `programs`";
            $run_program=mysqli_query($con,$select_program);
            while($fetch=mysqli_fetch_array($run_program)){
                $program_name=$fetch['program_name'];
                echo"
                <option value='$program_name'>$program_name</option>        
                ";
            }
            ?>
            </select>
        </div>
        <div class="form-outline mt-2">
            <label for="semester_name" class='form-label'>Semester Name</label>
            <select class='form-select' name='semester_name'>
                <option>Select Semester</option> 
            <?php
            $select_semester="select * from `semesters`";
            $run_semester=mysqli_query($con,$select_semester);
            while($fetch=mysqli_fetch_array($run_semester)){
                $semester_name=$fetch['semester_name'];
                echo"
                <option value='$semester_name'>$semester_name</option>        
                ";
            }
            ?>
            </select>
        </div>
        <div class="form-outline mt-2">
            <input type="submit" name='chapter_submit' class='form-control btn btn-success' value='Insert chapter'>
        </div>
    </form>
</div>

<?php 
if(isset($_POST['chapter_submit'])){
    $subject_name=$_POST['subject_name'];
    $chapter_name=$_POST['chapter_name'];
    $university_name=$_POST['university_name'];
    $faculty_name=$_POST['faculty_name'];
    $level_name=$_POST['level_name'];
    $program_name=$_POST['program_name'];
    $semester_name=$_POST['semester_name'];
    $select_query="select * from `chapters` where subject_name='$subject_name' and chapter_name='$chapter_name' and university_name='$university_name'and faculty_name='$faculty_name'and level_name='$level_name'and program_name='$program_name'and semester_name='$semester_name'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This chapter detail is already registered !!')</script>";
    }else{
    $insert_query="insert into `chapters` (chapter_name,subject_name,university_name,faculty_name,level_name,program_name,semester_name) values ('$chapter_name','$subject_name','$university_name','$faculty_name','$level_name','$program_name','$semester_name')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Chapter Inserted !!')</script>";
        echo "<script>window.open('index.php?chapter','_self')'</script>";
    }}
}
?>