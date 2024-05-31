
<style>
        .table_image{
         width: 100px;
         height: 100px;
         object-fit:contain;
        }
    </style>
<h1 class='text-center mx-auto'>Programs</h1>
    <a href='index.php?insert_program' class='btn btn-success mx-5 my-2'>Insert program</a>

    
            <?php 
            $select_table="select * from `programs`";
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
                <th>Program ID</th>
                <th>Program Name</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>";
    
            while($row_data=mysqli_fetch_array($run_select)){
                $program_id=$row_data['program_id'];
                $program_name=$row_data['program_name'];
                $number++;
            echo"
            <tr>
            <td>$number</td>
            <td>$program_id</td>
            <td>$program_name</td>
            <td>
            <a href='index.php?update_program=$program_id'><i class='fa-solid fa-pen-to-square'></i></a>
            <a href='index.php?delete_program=$program_id' class='ms-3 text-danger'><i class='fa-solid fa-trash'></i></a>
            </td>
            </tr>
            ";
            }
            }
            ?>
            </tbody>
            </table>
            
   