
<style>
        .teacher_image{
         width: 100px;
         height: 100px;
         object-fit:contain;
        }
    </style>

<h1 class='text-center mb-0 vw-100'>Teachers</h1>
    <a href='index.php?insert_teacher' class='btn btn-success mx-5 my-2'>Insert Teacher</a>

    <?php 
            $select_table="select * from `teachers`";
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
                <th>Teacher ID</th>
                <th>Teacher Name</th>
                <th>Subject Name</th>
                <th>Teacher Email</th>
                <th>Teacher Password</th>
                <th>Teacher Image</th>
                <th>Teacher Address</th>
                <th>Teacher Phone</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>";
    
            while($row_data=mysqli_fetch_array($run_select)){
                $teacher_id=$row_data['teacher_id'];
                $teacher_name=$row_data['teacher_name'];
                $subject_name=$row_data['subject_name'];
                $teacher_email=$row_data['teacher_email'];
                $teacher_password=$row_data['teacher_password'];
                $teacher_image=$row_data['teacher_image'];
                $teacher_address=$row_data['teacher_address'];
                $teacher_phone=$row_data['teacher_mobile'];
                $number++;
            echo"
            <tr>
            <td>$number</td>
            <td>$teacher_id</td>
            <td>$teacher_name</td>
            <td>$subject_name</td>
            <td>$teacher_email</td>
            <td>$teacher_password</td>
            <td><img src='teachers_photo/$teacher_image' class='table_image'/></td>
            <td>$teacher_address</td>
            <td>$teacher_phone</td>
            <td>
            <a href='index.php?update_teacher=$teacher_id'><i class='fa-solid fa-pen-to-square'></i></a>
            <a href='index.php?delete_teacher=$teacher_id' class='ms-3 text-danger'><i class='fa-solid fa-trash'></i></a>
            </td>
            </tr>
            ";
            }
            }
            ?>
            </tbody>
            </table>