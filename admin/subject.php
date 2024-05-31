
<style>
        .table_image{
         width: 100px;
         height: 100px;
         object-fit:contain;
        }
    </style>
<h1 class='text-center mx-auto'>Subjects</h1>
    <a href='index.php?insert_subject' class='btn btn-success mx-5 my-2'>Insert Subject</a>

    
            <?php 
            $select_table="select * from `subjects`";
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
                <th>subject ID</th>
                <th>Subject Code</th>
                <th>subject Name</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>";
    
            while($row_data=mysqli_fetch_array($run_select)){
                $subject_id=$row_data['subject_id'];
                $subject_code=$row_data['subject_code'];
                $subject_name=$row_data['subject_name'];
                $number++;
            echo"
            <tr>
            <td>$number</td>
            <td>$subject_id</td>
            <td>$subject_code</td>
            <td>$subject_name</td>
            <td>
            <a href='index.php?update_subject=$subject_id'><i class='fa-solid fa-pen-to-square'></i></a>
            <a href='index.php?delete_subject=$subject_id' class='ms-3 text-danger'><i class='fa-solid fa-trash'></i></a>
            </td>
            </tr>
            ";
            }
            }
            ?>
            </tbody>
            </table>
            
   