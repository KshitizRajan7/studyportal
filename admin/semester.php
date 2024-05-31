
<style>
        .table_image{
         width: 100px;
         height: 100px;
         object-fit:contain;
        }
    </style>
<h1 class='text-center mx-auto'>Semesters</h1>
    <a href='index.php?insert_semester' class='btn btn-success mx-5 my-2'>Insert Semester</a>

    
            <?php 
            $select_table="select * from `semesters`";
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
                <th>Semester ID</th>
                <th>Semester Name</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>";
    
            while($row_data=mysqli_fetch_array($run_select)){
                $semester_id=$row_data['semester_id'];
                $semester_name=$row_data['semester_name'];
                $number++;
            echo"
            <tr>
            <td>$number</td>
            <td>$semester_id</td>
            <td>$semester_name</td>
            <td>
            <a href='index.php?update_semester=$semester_id'><i class='fa-solid fa-pen-to-square'></i></a>
            <a href='index.php?delete_semester=$semester_id' class='ms-3 text-danger'><i class='fa-solid fa-trash'></i></a>
            </td>
            </tr>
            ";
            }
            }
            ?>
            </tbody>
            </table>
            
   