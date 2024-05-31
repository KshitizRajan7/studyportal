
<style>
        .table_image{
         width: 100px;
         height: 100px;
         object-fit:contain;
        }
    </style>
<h1 class='text-center mx-auto'>Chapters</h1>
    <a href='index.php?insert_chapter' class='btn btn-success mx-5 my-2'>Insert chapter</a>

    
            <?php 
            $select_table="select * from `chapters`";
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
                <th>Chapter ID</th>
                <th>Chapter Name</th>
                <th>Subject Name</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>";
    
            while($row_data=mysqli_fetch_array($run_select)){
                $chapter_id=$row_data['chapter_id'];
                $chapter_name=$row_data['chapter_name'];
                $subject_name=$row_data['subject_name'];
                $number++;
            echo"
            <tr>
            <td>$number</td>
            <td>$chapter_id</td>
            <td>$chapter_name</td>
            <td>$subject_name</td>
            <td>
            <a href='index.php?update_chapter=$chapter_id'><i class='fa-solid fa-pen-to-square'></i></a>
            <a href='index.php?delete_chapter=$chapter_id' class='ms-3 text-danger'><i class='fa-solid fa-trash'></i></a>
            </td>
            </tr>
            ";
            }
            }
            ?>
            </tbody>
            </table>
            
   