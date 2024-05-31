<?php 
$student_name=$_SESSION['user_name'];
$select_student="select * from `students` where student_name='$student_name'";
$run_select=mysqli_query($con,$select_student);
$fetch=mysqli_fetch_assoc($run_select);
$faculty_name=$fetch['faculty_name'];
$level_name=$fetch['level_name'];
$program_name=$fetch['program_name'];
?>
<style>
        .table_image{
         width: 100px;
         height: 100px;
         object-fit:contain;
        }
    </style>
<h1 class='text-center mx-auto'>Notes</h1>

    
            <?php 
            $select_table="select * from `notes` where faculty_name='$faculty_name' and level_name='$level_name' and program_name='$program_name'";
            $run_select=mysqli_query($con,$select_table);
            $data_number=mysqli_num_rows($run_select);
            $number=0;
            if($data_number==0){
                echo "<h1 class='text-center'>No data Available</h1>";
            }else{
                echo"
                <table class='table table-bordered mt-5 text-center'>
        <thead>
            <tr>
                <th>S.N</th>
                <th>note ID</th>
                <th>Subject Code</th>
                <th>Note Name</th>
                <th>Note Image</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>";
    
            while($row_data=mysqli_fetch_array($run_select)){
                $note_id=$row_data['note_id'];
                $subject_code=$row_data['subject_code'];
                $note_name=$row_data['note_name'];
                $note_image=$row_data['note_image'];
                $number++;
            echo"
            <tr>
            <td>$number</td>
            <td>$note_id</td>
            <td>$subject_code</td>
            <td>$note_name</td>
            <td><img src='notes/$note_image' class='table_image'/></td>
            <td>
            <a href='../admin/notes/$note_image'>View File</a>
            </td>
            </tr>
            ";
            }
            }
            ?>
            </tbody>
            </table>
            
   