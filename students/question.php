
<style>
        .table_image{
         width: 100px;
         height: 100px;
         object-fit:contain;
        }
    </style>
<h1 class='text-center mx-auto'>Questions</h1>
    
            <?php 
            $select_table="select * from `questions` where level_name='$level_name' and faculty_name='$faculty_name' and program_name='$program_name' ";
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
                <th>Question ID</th>
                <th>Subject Code</th>
                <th>Question Name</th>
                <th>Question Year</th>
                <th>question Image</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>";
    
            while($row_data=mysqli_fetch_array($run_select)){
                $question_id=$row_data['question_id'];
                $subject_code=$row_data['subject_code'];
                $question_name=$row_data['question_name'];
                $question_year=$row_data['question_year'];
                $question_image=$row_data['question_image'];
                $number++;
            echo"
            <tr>
            <td>$number</td>
            <td>$question_id</td>
            <td>$subject_code</td>
            <td>$question_name</td>
            <td>$question_year</td>
            <td><img src='../admin/questions/$question_image' class='table_image'/></td>
            <td>
            <a href='../admin/questions/$question_image''>View File</a>
            </td>
            </tr>
            ";
            }
            }
            ?>
            </tbody>
            </table>
            
   