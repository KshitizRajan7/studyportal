
<?php
if(isset($_GET['update_subject'])){
$subject_id=$_GET['update_subject'];
$select_query="select * from `subjects` where subject_id=$subject_id";
$result=mysqli_query($con,$select_query);
$row=mysqli_fetch_assoc($result);
$subject_name=$row['subject_name'];
$subject_code=$row['subject_code'];
$university_name=$row['university_name'];
$faculty_name=$row['faculty_name'];
$level_name=$row['level_name'];
$program_name=$row['program_name'];
$semester_name=$row['semester_name'];
}
?>

<h1 class='text-center'>Update chapter</h1>
<form action="" method='post' enctype='multipart/form-data' class='mt-5'>
    <div class="form-outline w-50 mx-auto mb-3">
        <label for="subject_name" class='form-label'>Subject Name</label>
        <input type="text" class='form-control' name='subject_name' value='<?php echo $subject_name?>'>
        <label for="subject_code" class='form-label'>Subject Code</label>
        <input type="text" class='form-control' name='subject_code' value='<?php echo $subject_code?>'>
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
    <div class="form-outline w-50 mx-auto mb-3">
        <input type="submit" class='form-control btn btn-info my-5' name='update_chapter' value='Update chapter'>
    </div>
</form>
<?php 
if(isset($_POST['update_chapter'])){
    $new_subject_name=$_POST['subject_name'];
    $new_subject_code=$_POST['subject_code'];
    $new_university_name=$_POST['university_name'];
    $new_faculty_name=$_POST['faculty_name'];
    $new_level_name=$_POST['level_name'];
    $new_program_name=$_POST['program_name'];
    $new_semester_name=$_POST['semester_name'];
  
    $select="select * from `subjects` where subject_name='$new_subject_name' and subject_code='$new_subject_code' and university_name='$new_university_name'and faculty_name='$new_faculty_name'and level_name='$new_level_name'and program_name='$new_program_name'and semester_name='$new_semester_name'";
    $run_select=mysqli_query($con,$select);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('The chapter detail is already registered !! ')</script>";
    }
    $update="update `subjects` set 
     subject_name='$new_subject_name',
     subject_code='$new_subject_code',
     university_name='$new_university_name',
     faculty_name='$new_faculty_name',
     level_name='$new_level_name',
     program_name='$new_program_name',
     semester_name='$new_semester_name'
     where subject_id=$subject_id
      ";
      $run_update=mysqli_query($con,$update);
      if($run_update){
        echo "<script>alert('Subject information Updated!!')</script>";
        echo "<script>window.open('index.php?subject','_self')</script>";
      }
}
?> 