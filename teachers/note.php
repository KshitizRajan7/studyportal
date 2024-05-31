<?php 
$teacher_name=$_SESSION['teacher_name'];
$select_teacher="select * from `teachers` where teacher_name='$teacher_name'";
$run_select=mysqli_query($con,$select_teacher);
$fetch=mysqli_fetch_assoc($run_select);
$subject_name=$fetch['subject_name'];
?>
<style>
        .table_image{
         width: 100px;
         height: 100px;
         object-fit:contain;
        }
    </style>
<h1 class='text-center mx-auto'>Notes</h1>
    <a href='index.php?insert_note' class='btn btn-success mx-5 my-2'>Insert Note</a>

    
            <?php 
            $select_table="select * from `notes` where note_name='$subject_name'";
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
            <a href='index.php?update_note=$note_id'><i class='fa-solid fa-pen-to-square'></i></a>
            <a href='index.php?delete_note=$note_id' class='ms-3 text-danger'><i class='fa-solid fa-trash'></i></a>
            </td>
            </tr>
            ";
            }
            }
            ?>
            </tbody>
            </table>
            
   