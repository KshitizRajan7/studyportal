
<style>
        .student_logo{
         width: 100px;
         height: 100px;
         object-fit:contain;
        }
    </style>
<h1 class='text-center mx-auto'>Students</h1>
    <!-- <a href='index.php?insert_student' class='btn btn-success mx-5 my-2'>Insert student</a> -->

    
            <?php 
            $select_table="select * from `students`";
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
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Faculty Name</th>
                <th>Level Name</th>
                <th>Program Name</th>
                <th>student Email</th>
                <th>student Image</th>
                <th>student Address</th>
                <th>student Phone</th>
            </tr>
        </thead>
        <tbody>";
    
            while($row_data=mysqli_fetch_array($run_select)){
                $student_id=$row_data['student_id'];
                $student_name=$row_data['student_name'];
                $faculty_name=$row_data['faculty_name'];
                $level_name=$row_data['level_name'];
                $program_name=$row_data['program_name'];
                $student_email=$row_data['student_email'];
                $student_image=$row_data['student_image'];
                $student_address=$row_data['student_address'];
                $student_phone=$row_data['student_mobile'];
                $number++;
            echo"
            <tr>
            <td>$number</td>
            <td>$student_id</td>
            <td>$student_name</td>
            <td>$faculty_name</td>
            <td>$level_name</td>
            <td>$program_name</td>
            <td>$student_email</td>
            <td><img src='students_photo/$student_image' class='student_logo'/></td>
            <td>$student_address</td>
            <td>$student_phone</td>
            </tr>
            </tbody>
            </table>
            ";
            }
            }
            ?>
   