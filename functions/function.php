<?php 
function search_data_button(){
    global $con;
    if(isset($_GET['search_data'])){
        $search_item=$_GET['search_data'];
        $search_query="select * from `subjects` where subject_name like '%$search_item%'";
        $run_search=mysqli_query($con,$search_query);
        $num=mysqli_num_rows($run_search);
        if($num == 0){
            echo
            "<h1 class='text-center mt-5'>No Items Available</h1>";
        }
        while($fetch=mysqli_fetch_array($run_search)){
            $subject_id=$fetch['subject_id'];
            $university_name=$fetch['university_name'];
            $faculty_name=$fetch['faculty_name'];
            $level_name=$fetch['level_name'];
            $program_name=$fetch['program_name'];
            $subject_name=$fetch['subject_name'];
            echo"
            <div class='col-md-3 mb-2'>
    <div class='card bg_card'>
    <img src='' class='card-img-top card_img' alt='...'>
  <div class='card-body text-center'>
    <h5 class='card-title text-info'>$university_name</h5>
    <h5 class='card-title text-info'>$subject_name</h5>
    <a href='index.php?subject=$subject_id' class='btn btn-light'>Select</a>
  </div></div>
</div>
            ";
        }
    }
}

function get_universities(){
    global $con;
    if(isset($_GET['universities'])){
        if(!isset($_GET['faculty'])){
        if(!isset($_GET['search_data'])){
            if(!isset($_GET['level'])){
            if(!isset($_GET['program'])){
            if(!isset($_GET['semester'])){
            if(!isset($_GET['subject'])){
            if(!isset($_GET['note'])){
            if(!isset($_GET['question'])){
                echo"<div class='nav mx-5 mb-5'><h1 class=' mt-3 text-light'>Universities</h1></div>";
    
$select_universities="select * from `universities`";
$run_select=mysqli_query($con,$select_universities);
$count=mysqli_num_rows($run_select);
if($count == 0){
    echo "<h1 class='text-center mt-5'>No Universities Available. </h1> ";
}
while($fetch=mysqli_fetch_array($run_select)){
    $university_name=$fetch['university_name'];
    $university_id=$fetch['university_id'];
    $university_logo=$fetch['university_image'];
    echo"
    <div class='col-md-3 mb-2'>
    <div class='card bg_card text-info' >
    <img src='./admin/university_logos/$university_logo' class='card-img-top card_img ' alt='...'>
  <div class='card-body text-center'>
    <h5 class='card-title'>$university_name</h5>
    <a href='index.php?university=$university_id' class='btn btn-light text-dark'>Select</a>
  </div></div>
</div>
    ";
}
}
    }
}
}
}
    }
}}}}

function select_faculty(){
    
    global $con;
    if(isset($_GET['university'])){
        $university_id=$_GET['university'];
        $select_university="select * from  `universities` where university_id = $university_id";
        $run_select=mysqli_query($con,$select_university);
        $fetch_university=mysqli_fetch_assoc($run_select);
        $university_name=$fetch_university['university_name'];
        echo"<div class='nav  d-flex justify-content-center mb-5'><h2 class='text-center text-secondary my-2'>Faculites available in $university_name</h2></div>";
        $university_id=$_GET['university'];
        $select_university="select * from `universities` where university_id=$university_id";
        $run_university=mysqli_query($con,$select_university);
        $fetch_university=mysqli_fetch_assoc($run_university);
        $university_name=$fetch_university['university_name'];
        $select_faculty="select * from `faculties` where university_name='$university_name'";
        $run=mysqli_query($con,$select_faculty);
        $count=mysqli_num_rows($run);
        if($count == 0){
            echo"<h1 class='text-center mt-5'>No Faculty Available for now </h1>";
        }
        while ($fetch_faculty=mysqli_fetch_array($run)){
            $faculty_name=$fetch_faculty['faculty_name'];
            $faculty_id=$fetch_faculty['faculty_id'];
            // $faculty_logo=$fetch_faculty['faculty_image'];
            echo"
            <div class='col-md-3 mb-2'>
            <div class='card bg_card'>
            <img src='./admin/university_logos/pp.png' class='card-img-top' alt='...'>
          <div class='card-body text-info text-center'>
            <h5 class='card-title'>$faculty_name</h5>
            <a href='index.php?faculty=$faculty_id' class='btn btn-light'>Select</a>
          </div></div>
        </div>
            ";
        }
    }
}

function select_level(){
    global $con;
    if(isset($_GET['faculty'])){
        $faculty_id=$_GET['faculty'];
        $select_faculty="select * from  `faculties` where faculty_id = $faculty_id";
        $run_select=mysqli_query($con,$select_faculty);
        $fetch_faculty=mysqli_fetch_assoc($run_select);
        $university_name=$fetch_faculty['university_name'];
        $faculty_name=$fetch_faculty['faculty_name'];
        echo"<div class='nav  d-flex justify-content-center mb-5'><h2 class='text-center text-secondary my-2'>Levels available in faculty of $faculty_name in $university_name </h2></div>";
    
        $faculty_id=$_GET['faculty'];
        $select_level="select * from `level` where university_name='$university_name'";
        $run_level=mysqli_query($con,$select_level);
        $count_level=mysqli_num_rows($run_level);
        if($count_level== 0){
            echo"<h1 class='text-center mt-5'>No Level Available for now </h1>";
        }
        while ($fetch_level=mysqli_fetch_array($run_level)){
            $level_name=$fetch_level['level_name'];
            $level_id=$fetch_level['level_id'];
            // $faculty_logo=$fetch_faculty['faculty_image'];
            echo"
            <div class='col-md-3 mb-2'>
            <div class='card bg_card'>
            <img src='../admin/university_logos/pp.png' class='card-img-top' alt='...'>
          <div class='card-body text-center'>
            <h5 class='card-title text-info'>$level_name</h5>
            <a href='index.php?level=$level_id' class='btn btn-light'>Select</a>
          </div></div>
        </div>
            ";
        }
    }
}

function select_program(){
    global $con;
    if(isset($_GET['level'])){
        $level_id=$_GET['level'];
        $select_level="select * from  `level` where level_id = $level_id";
        $run_select=mysqli_query($con,$select_level);
        $fetch_level=mysqli_fetch_assoc($run_select);
        $university_name=$fetch_level['university_name'];
        $level_name=$fetch_level['level_name'];
        // $faculty_name=$fetch_level['faculty_name'];
        echo"<div class='nav d-flex justify-content-center mb-5'><h2 class='text-center text-secondary my-2'>Programs available in level of $level_name in $university_name </h2></div>";
        $level_id=$_GET['level'];
        $select_program="select * from `programs` where level_name='$level_name'";
        $run_program=mysqli_query($con,$select_program);
        $count_program=mysqli_num_rows($run_program);
        if($count_program== 0){
            echo"<h1 class='text-center mt-5'>No Program Available for now </h1>";
        }
        while ($fetch_program=mysqli_fetch_array($run_program)){
            $program_name=$fetch_program['program_name'];
            $program_id=$fetch_program['program_id'];
            // $faculty_logo=$fetch_faculty['faculty_image'];
            echo"
            <div class='col-md-3 mb-2'>
            <div class='card bg_card'>
            <img src='../admin/university_logos/pp.png' class='card-img-top' alt='...'>
          <div class='card-body text-center'>
            <h5 class='card-title text-info'>$program_name</h5>
            <a href='index.php?program=$program_id' class='btn btn-light'>Select</a>
          </div></div>
        </div>
            ";
        }
    }
}

function select_semester(){
    global $con;
    if(isset($_GET['program'])){
        $program_id=$_GET['program'];
        $select_program="select * from  `programs` where program_id = $program_id";
        $run_select=mysqli_query($con,$select_program);
        $fetch_program=mysqli_fetch_assoc($run_select);
        $university_name=$fetch_program['university_name'];
        $program_name=$fetch_program['program_name'];
        $level_name=$fetch_program['level_name'];
        echo"<div class='nav d-flex justify-content-center mb-5'><h3 class='text-center text-secondary my-2'>Semesters available in program of $program_name, level of $level_name in $university_name </h3></div>";
    
        $select_semester="select * from `semesters` where university_name='$university_name'";
        $run_semester=mysqli_query($con,$select_semester);
        $count_semester=mysqli_num_rows($run_semester);
        if($count_semester== 0){
            echo"<h1 class='text-center mt-5'>No Semester Available for now </h1>";
        }
        while ($fetch_semester=mysqli_fetch_array($run_semester)){
            $semester_name=$fetch_semester['semester_name'];
            $semester_id=$fetch_semester['semester_id'];
            // $faculty_logo=$fetch_faculty['faculty_image'];
            echo"
            <div class='col-md-3 mb-2'>
            <div class='card bg_card'>
            <img src='./admin/university_logos/pp.png' class='card-img-top' alt='...'>
          <div class='card-body text-center'>
            <h5 class='card-title text-info'>$semester_name</h5>
            <a href='index.php?semester=$semester_id' class='btn btn-light'>Select</a>
          </div></div>
        </div>
            ";
        }
    }
}

function select_subject(){
    global $con;
    if(isset($_GET['semester'])){
        $semester_id=$_GET['semester'];
        $select_semester="select * from  `semesters` where semester_id = $semester_id";
        $run_select=mysqli_query($con,$select_semester);
        $fetch_semester=mysqli_fetch_assoc($run_select);
        $university_name=$fetch_semester['university_name'];
        $program_name=$fetch_semester['program_name'];
        $level_name=$fetch_semester['level_name'];
        $semester_name=$fetch_semester['semester_name'];
        echo"<div class='nav d-flex justify-content-center mb-5'><h2 class='text-center text-secondary my-2'>Subjects available in $semester_name program of $program_name, level of $level_name in $university_name </h2></div>";
    
        $select_subject="select * from `subjects` where university_name='$university_name'";
        $run_subject=mysqli_query($con,$select_subject);
        $count_subject=mysqli_num_rows($run_subject);
        if($count_subject== 0){
            echo"<h1 class='text-center mt-5'>No Subject Available for now </h1>";
        }
        while ($fetch_subject=mysqli_fetch_array($run_subject)){
            $subject_name=$fetch_subject['subject_name'];
            $subject_id=$fetch_subject['subject_id'];
            // $faculty_logo=$fetch_faculty['faculty_image'];
            echo"
            <div class='col-md-3 mb-2'>
            <div class='card bg_card'>
            <img src='../admin/university_logos/pp.png' class='card-img-top' alt='...'>
          <div class='card-body text-center'>
            <h5 class='card-title text-info'>$subject_name</h5>
            <a href='index.php?subject=$subject_id' class='btn btn-light'>Select</a>
          </div></div>
        </div>
            ";
        }
    }
}

function select_note_question(){
    global $con;
    if(isset($_GET['subject'])){
        
        echo"<div class='nav d-flex justify-content-center mb-5'><h2 class='text-center text-secondary my-2'>What do you want to view?  Question or Notes</h2></div>";
    
        $subject_id=$_GET['subject'];
       $select_subject="select * from `subjects`";
        $run_subject=mysqli_query($con,$select_subject);
        $count_subject=mysqli_num_rows($run_subject);
        if($count_subject== 0){
            echo"<h1 class='text-center mt-5'>No Note Available for now </h1>";
        }
        $fetch_subject=mysqli_fetch_array($run_subject);
            $subject_name=$fetch_subject['subject_name'];
    //         $note_id=$fetch_note['note_id'];
    //         // $faculty_logo=$fetch_faculty['faculty_image'];
         
    echo"
    <div class='container-fluid'>
    <div class='mt-5 text-center'>
    <a href='index.php?chapters=$subject_name' class='btn btn-info'>Notes</a>
    <a href='index.php?questions=$subject_name' class='btn btn-info'>Questions</a>
    </div>
    </div>                       
            ";
        }
    }

function select_chapter(){
    global $con;
    if(isset($_GET['chapters'])){
        $subject_name=$_GET['chapters'];
        $select_subject="select * from  `notes` where note_name = '$subject_name'";
        $run_select=mysqli_query($con,$select_subject);
        $fetch_subject=mysqli_fetch_assoc($run_select);
        $university_name=$fetch_subject['university_name'];
        $program_name=$fetch_subject['program_name'];
        $level_name=$fetch_subject['level_name'];
        $semester_name=$fetch_subject['semester_name'];
        // $subject_name=$fetch_subject['subject_name'];
        echo"<div class='nav d-flex justify-content-center mb-5'><h2 class='text-center text-secondary my-2'>Chapters in Subject '$subject_name' </h2></div>";
    
        $select_chapter="select * from `chapters` where subject_name='$subject_name'";
        $run_chapter=mysqli_query($con,$select_chapter);
        $count_chapter=mysqli_num_rows($run_chapter);
        if($count_chapter== 0){
            echo"<h1 class='text-center mt-5'>No Chapter Available for now </h1>";
            
        }
        while ($fetch_chapter=mysqli_fetch_array($run_chapter)){
            $chapter_name=$fetch_chapter['chapter_name'];
            $chapter_id=$fetch_chapter['chapter_id'];
            // $faculty_logo=$fetch_faculty['faculty_image'];
            echo"
            <div class='col-md-3 mb-2'>
            <div class='card bg_card'>
            <img src='../admin/university_logos/pp.png' class='card-img-top' alt='...'>
          <div class='card-body text-center'>
            <h5 class='card-title text-info'>$chapter_name</h5>
            <a href='index.php?notes=$chapter_name' class='btn btn-light'>Select</a>
          </div></div>
        </div>
            ";
        }

        }
}

    function select_note(){
        global $con;
        if(isset($_GET['notes'])){
            $subject_name=$_GET['notes'];
            $select_note="select * from  `notes` where chapter_name ='$subject_name'";
            $run_select=mysqli_query($con,$select_note);
            $fetch_note=mysqli_fetch_assoc($run_select);
            $university_name=$fetch_note['university_name'];
            $program_name=$fetch_note['program_name'];
            $level_name=$fetch_note['level_name'];
            $semester_name=$fetch_note['semester_name'];
            $chapter_name=$fetch_note['chapter_name'];
            
            echo"<div class='nav d-flex justify-content-center mb-5'><h2 class='text-center text-secondary my-2'>Notes in Subject'$subject_name' </h2></div>";    
        
            $select_note="select * from `notes` where chapter_name='$subject_name' and university_name='$university_name'";
            $run_note=mysqli_query($con,$select_note);
            $count_note=mysqli_num_rows($run_note);
            if($count_note== 0){
                echo"<h1 class='text-center mt-5'>No Note Available for now </h1>";
                
            }
            while ($fetch_note=mysqli_fetch_array($run_note)){
                $note_name=$fetch_note['note_name'];
                $note_id=$fetch_note['note_id'];
                $chapter_name=$fetch_note['chapter_name'];
                $university_name=$fetch_note['university_name'];
                $note_image=$fetch_note['note_image'];
                // $faculty_logo=$fetch_faculty['faculty_image'];
                echo"
                <div class='col-md-3 mb-2'>
                <div class='card bg_card'>
                <img src='../admin/university_logos/pp.png' class='card-img-top' alt='...'>
              <div class='card-body text-center'>
                <h5 class='card-title text-info'>$note_name</h5>
                <h5 class='card-title text-info' >$chapter_name</h5>
                <h5 class='card-title text-info' >$university_name</h5>
                <a href='./admin/notes/$note_image' class='btn btn-light'>Select</a>
              </div></div>
            </div>
                ";
            }
            }
        }
    


function select_question(){
    global $con;
    if(isset($_GET['questions'])){
        $subject_name=$_GET['questions'];
        $select_subject="select * from  `questions` where question_name = '$subject_name'";
        $run_select=mysqli_query($con,$select_subject);
        $fetch_subject=mysqli_fetch_assoc($run_select);
        $university_name=$fetch_subject['university_name'];
        $program_name=$fetch_subject['program_name'];
        $level_name=$fetch_subject['level_name'];
        $semester_name=$fetch_subject['semester_name'];
        
        echo"<div class='nav d-flex justify-content-center mb-5'><h2 class='text-center text-secondary my-2'>Questions in Subject'$subject_name'</h1></div>";    
    
        $select_question="select * from `questions` where question_name='$subject_name' and university_name='$university_name'";
        $run_question=mysqli_query($con,$select_question);
        $count_question=mysqli_num_rows($run_question);
        if($count_question== 0){
            echo"<h1 class='text-center mt-5'>No Question Available for now </h1>";
            
        }
        while ($fetch_question=mysqli_fetch_array($run_question)){
            $question_name=$fetch_question['question_name'];
            $question_id=$fetch_question['question_id'];
            $question_year=$fetch_question['question_year'];
            $question_image=$fetch_question['question_image'];
            $university_name=$fetch_question['university_name'];
            // $faculty_logo=$fetch_faculty['faculty_image'];
            echo"
            <div class='col-md-3 mb-2'>
            <div class='card bg_card'>
            <img src='../admin/university_logos/pp.png' class='card-img-top' alt='...'>
          <div class='card-body text-center'>
            <h5 class='card-title text-info'>$question_name</h5>
            <h5 class='card-title text-info'>$question_year</h5>
            <h5 class='card-title text-info'>$university_name</h5>
            <a href='./admin/questions/$question_image' class='btn btn-light'>Select</a>
          </div></div>
        </div>
            ";
        }
        ?>
        </select>
        </div>
        <?php
        }
    }

function get_certain_note(){
    if(isset($_GET['certainnote'])){
        echo"<div class='nav d-flex justify-content-center mb-5'><h2 class='text-center text-secondary my-2'>Please fill up the form with respect to the note required.</h1></div>
        <div class='container-fluid my-2'>
        <form class='m-auto w-50' method='post'>
            
            
            <div class='form-outline mb-4'>
            <label for='university_name' class='form-label text-info'> University Name</label>
            <select class='form-select' id='university' name='university_name' required='required'>
            <option value='university_id'>Select University</option>
            ";
            ?>
            <?php
            global $con;
            $select_universities="select * from `universities`";
            $run_universities=mysqli_query($con,$select_universities);
            while($fetch_universities=mysqli_fetch_array($run_universities)){
                $universities=$fetch_universities['university_name'];
                $university_id=$fetch_universities['university_id'];
            echo"
            <option value='$universities'>$universities</option>
            ";
            }
            ?>
            <script>
                var select = document.getElementById("university")
                    array =[];
            </script>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline mb-4'>
            <label for='faculty_name' class='form-label  text-info'> Faculty Name</label>
            <select class='form-select' name='faculty_name' required='required'>
            <option>Select Faculty</option>
            ";
            ?>
            <?php
            global $con;
            $select_faculites="select * from `faculties`";
            $run_faculites=mysqli_query($con,$select_faculites);
            while($fetch_faculties=mysqli_fetch_array($run_faculites)){
                $faculties=$fetch_faculties['faculty_name'];
                $faculty_id=$fetch_faculties['faculty_id'];
            echo"
            <option value='$faculties'>$faculties</option>
            ";
            }
            ?>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline mb-4'>
            <label for='level_name' class='form-label  text-info'> Level Name</label>
            <select class='form-select' name='level_name' required='required'>
            <option>Select Level</option>
            ";
            ?>
            <?php
            global $con;
            $select_level="select * from `level`";
            $run_level=mysqli_query($con,$select_level);
            while($fetch_level=mysqli_fetch_array($run_level)){
                $level=$fetch_level['level_name'];
                $level_id=$fetch_level['level_id'];
            echo"
            <option value='$level'>$level</option>
            ";
            }
            ?>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline mb-4'>
            <label for='program_name' class='form-label  text-info'> Program Name</label>
            <select class='form-select' name='program_name' required='required'>
            <option>Select Program</option>
            ";
            ?>
            <?php
            global $con;
            $select_program="select * from `programs`";
            $run_program=mysqli_query($con,$select_program);
            while($fetch_program=mysqli_fetch_array($run_program)){
                $program=$fetch_program['program_name'];
            echo"
            <option value='$program'>$program</option>
            ";
            }
            ?>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline mb-4'>
            <label for='subject_name' class='form-label  text-info'> Subject Name</label>
            <select class='form-select' name='subject_name' required='required'>
            <option value=''>Select Subject</option>
            ";
            ?>
            <?php
            global $con;
            $select_subject="select * from `subjects`";
            $run_subject=mysqli_query($con,$select_subject);
            while($fetch_subject=mysqli_fetch_array($run_subject)){
                $subject=$fetch_subject['subject_name'];
                $subject_id=$fetch_subject['subject_id'];
            echo"
            <option value='$subject'>$subject</option>
            ";
            }
            ?>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline mb-4'>
            <label for='chapter_name' class='form-label  text-info'> Chapter Name</label>
            <select class='form-select' name='chapter_name' required='required'>
            <option>Select Chapter</option>
            ";
            ?>
            <?php
            global $con;
            $select_note="select * from `notes`";
            $run_note=mysqli_query($con,$select_note);
            while($fetch_note=mysqli_fetch_array($run_note)){
                $chapter_name=$fetch_note['chapter_name'];
                // $question_id=$fetch_question['question_id'];
            echo"
            <option value='$chapter_name'>$chapter_name</option>
            ";
            }
            ?>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline  text-center'>
            <input type='submit' class='btn btn-light my-2' name='view_note' value='View Notes'>
            </div>
        </form>'
        </div>";
        if(isset($_POST['view_note'])){
            global $con;
            $university_name=$_POST['university_name'];
            $faculty_name=$_POST['faculty_name'];
            $level_name=$_POST['level_name'];
            $program_name=$_POST['program_name'];
            $note_name=$_POST['subject_name'];
            $chapter_name=$_POST['chapter_name'];
            $select_query="select * from `notes` where 
            university_name='$university_name' and
            faculty_name='$faculty_name' and
            level_name='$level_name' and
            program_name='$program_name' and
            note_name='$note_name' and
            chapter_name='$chapter_name'";
            $run_select=mysqli_query($con,$select_query);
            $count_select=mysqli_num_rows($run_select);
            if($count_select == 0)
            {
                echo"<script>alert('No data Available')</script>";
                echo"<script>window.open('index.php?certainnote','_self')</script>";
            }else{
            $fetch_select=mysqli_fetch_assoc($run_select);
            $note_image=$fetch_select['note_image'];

            echo"<script>alert('Data Available')</script>";
            echo"<script>window.open('admin/notes/$note_image','_self')</script>";
}
        }

}}


function get_certain_question(){
    if(isset($_GET['certainquestion'])){
        echo"<div class='nav  d-flex justify-content-center mb-5'><h2 class='text-center text-secondary my-2'>Please fill up the form with respect to the question required.</h1></div>
        <div class='container-fluid my-2'>
        <form class='m-auto w-50' method='post'>
            
            
            <div class='form-outline mb-4'>
            <label for='university_name' class='form-label text-info'> University Name</label>
            <select class='form-select' name='university_name' required='required'>
            <option value='university_id'>Select University</option>
            ";
            ?>
            <?php
            global $con;
            $select_universities="select * from `universities`";
            $run_universities=mysqli_query($con,$select_universities);
            while($fetch_universities=mysqli_fetch_array($run_universities)){
                $universities=$fetch_universities['university_name'];
                $university_id=$fetch_universities['university_id'];
            echo"
            <option value='$universities'>$universities</option>
            ";
            }
            ?>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline mb-4'>
            <label for='faculty_name' class='form-label text-info'> Faculty Name</label>
            <select class='form-select' name='faculty_name' required='required'>
            <option>Select Faculty</option>
            ";
            ?>
            <?php
            global $con;
            $select_faculites="select * from `faculties`";
            $run_faculites=mysqli_query($con,$select_faculites);
            while($fetch_faculties=mysqli_fetch_array($run_faculites)){
                $faculties=$fetch_faculties['faculty_name'];
                $faculty_id=$fetch_faculties['faculty_id'];
            echo"
            <option value='$faculties'>$faculties</option>
            ";
            }
            ?>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline mb-4'>
            <label for='level_name' class='form-label text-info'> Level Name</label>
            <select class='form-select' name='level_name' required='required'>
            <option>Select Level</option>
            ";
            ?>
            <?php
            global $con;
            $select_level="select * from `level`";
            $run_level=mysqli_query($con,$select_level);
            while($fetch_level=mysqli_fetch_array($run_level)){
                $level=$fetch_level['level_name'];
                $level_id=$fetch_level['level_id'];
            echo"
            <option value='$level'>$level</option>
            ";
            }
            ?>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline mb-4'>
            <label for='program_name' class='form-label text-info'> Program Name</label>
            <select class='form-select' name='program_name' required='required'>
            <option>Select Program</option>
            ";
            ?>
            <?php
            global $con;
            $select_program="select * from `programs`";
            $run_program=mysqli_query($con,$select_program);
            while($fetch_program=mysqli_fetch_array($run_program)){
                $program=$fetch_program['program_name'];
            echo"
            <option value='$program'>$program</option>
            ";
            }
            ?>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline mb-4'>
            <label for='subject_name' class='form-label text-info'> Semester Name</label>
            <select class='form-select' name='semester_name' required='required'>
            <option>Select Semester</option>
            ";
            ?>
            <?php
            global $con;
            $select_semester="select * from `semesters`";
            $run_semester=mysqli_query($con,$select_semester);
            while($fetch_semester=mysqli_fetch_array($run_semester)){
                $semester=$fetch_semester['semester_name'];
                $semester_id=$fetch_semester['semester_id'];
            echo"
            <option value='$semester'>$semester</option>
            ";
            }
            ?>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline mb-4'>
            <label for='subject_name' class='form-label text-info'> Subject Name</label>
            <select class='form-select' name='subject_name' required='required'>
            <option value=''>Select Subject</option>
            ";
            ?>
            <?php
            global $con;
            $select_subject="select * from `subjects`";
            $run_subject=mysqli_query($con,$select_subject);
            while($fetch_subject=mysqli_fetch_array($run_subject)){
                $subject=$fetch_subject['subject_name'];
                $subject_id=$fetch_subject['subject_id'];
            echo"
            <option value='$subject'>$subject</option>
            ";
            }
            ?>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline mb-4'>
            <label for='subject_name' class='form-label text-info'> Question Year</label>
            <select class='form-select' name='question_year' required='required'>
            <option>Select Question Year</option>
            ";
            ?>
            <?php
            global $con;
            $select_question="select * from `questions`";
            $run_question=mysqli_query($con,$select_question);
            while($fetch_question=mysqli_fetch_array($run_question)){
                $question_year=$fetch_question['question_year'];
                $question_id=$fetch_question['question_id'];
            echo"
            <option value='$question_year'>$question_year</option>
            ";
            }
            ?>
            <?php 
            echo"
            </select>
            </div>
            <div class='form-outline  text-center'>
            <input type='submit' class='btn btn-light my-2' name='view_question' value='View Question'>
            </div>
        </form>'
        </div>";
        if(isset($_POST['view_question'])){
            global $con;
            $university_name=$_POST['university_name'];
            $faculty_name=$_POST['faculty_name'];
            $level_name=$_POST['level_name'];
            $program_name=$_POST['program_name'];
            $semester_name=$_POST['semester_name'];
            $question_name=$_POST['subject_name'];
            $question_year=$_POST['question_year'];
            $select_query="select * from `questions` where 
            university_name='$university_name' and
            faculty_name='$faculty_name' and
            level_name='$level_name' and
            program_name='$program_name' and
            semester_name='$semester_name' and
            question_name='$question_name' and
            question_year=$question_year";
            $run_select=mysqli_query($con,$select_query);
            $count_select=mysqli_num_rows($run_select);
            if($count_select == 0)
            {
                echo"<script>alert('No data Available')</script>";
                echo"<script>window.open('index.php?certainquestion','_self')</script>";
            }else{
            $fetch_select=mysqli_fetch_assoc($run_select);
            $question_image=$fetch_select['question_image'];

            echo"<script>alert('Data Available')</script>";
            echo"<script>window.open('admin/questions/$question_image','_self')</script>";
}
}}}

function show_pdf(){
    global $con;
    if(isset($_GET['note'])){
        $note_id=$_GET['note'];
        $select_note_pdf="select * from `notes` where note_id = $note_id";
        $run_note_pdf=mysqli_query($con,$select_note_pdf);
        $fetch_note_pdf=mysqli_fetch_assoc($run_note_pdf);
        $note_pdf=$fetch_note_pdf['note_image'];
        echo"
        <div class='d-flex justify-content-center'>
        <img src='./admin/notes/$note_pdf'style='width: 50%;'></img>
        </div>";
        // $file="./admin/notes/$note_pdf";
    //     $filename="$note_pdf";
    // header('Content-type:application/pdf');
    // header('Content-Disposition: inline; filename="'.$filename.'"');
    // header('Content-Transfer-Encoding: binary');
    // header('Accept-Ranges: bytes');
    // header('Content-Length: ' . filesize($file));
    //     @readfile($file);
    }
    if(isset($_GET['question'])){
        $question_id=$_GET['question'];
        $select_question_pdf="select * from `questions` where question_id = $question_id";
        $run_question_pdf=mysqli_query($con,$select_question_pdf);
        $fetch_question_pdf=mysqli_fetch_assoc($run_question_pdf);
        $question_pdf=$fetch_question_pdf['question_image'];
        echo"
        <div class='d-flex justify-content-center'>
        <img src='./admin/questions/$question_pdf'style='width: 50%;'></img>
        </div>";
    }
}

function view_subject_chapters(){
    if(isset($_GET['chapters'])){

    }
}

?>