
<style>
        .table_image{
         width: 100px;
         height: 100px;
         object-fit:contain;
        }
    </style>
<h1 class='text-center mx-auto'>Faculties</h1>
    <a href='index.php?insert_faculty' class='btn btn-success mx-5 my-2'>Insert Faculty</a>

    
            <?php 
            $select_table="select * from `faculties`";
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
                <th>Faculty ID</th>
                <th>Faculty Name</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>";
    
            while($row_data=mysqli_fetch_array($run_select)){
                $faculty_id=$row_data['faculty_id'];
                $faculty_name=$row_data['faculty_name'];
                $number++;
            echo"
            <tr>
            <td>$number</td>
            <td>$faculty_id</td>
            <td>$faculty_name</td>
            <td>
            <a href='index.php?update_faculty=$faculty_id'><i class='fa-solid fa-pen-to-square'></i></a>
            <a href='index.php?delete_faculty=$faculty_id' class='ms-3 text-danger'><i class='fa-solid fa-trash'></i></a>
            </td>
            </tr>
            ";
            }
            }
            ?>
            </tbody>
            </table>
            
   