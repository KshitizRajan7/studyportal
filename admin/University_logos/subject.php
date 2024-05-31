<h1 class='text-center bg-dark text-light'>subject</h1>
    <a href='index.php?insert_subject' class='btn btn-success mx-5 my-2'>Insert subject</a>

    <table class='table table-bordered mt-5 text-center'>
        <thead>
            <tr>
                <th>S.N</th>
                <th>subject ID</th>
                <th>subject Name</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $select_table="select * from `subjects`";
            $run_select=mysqli_query($con,$select_table);
            $number=0;
            while($row_data=mysqli_fetch_array($run_select)){
                $subject_id=$row_data['subject_id'];
                $subject_name=$row_data['subject_name'];
                $number++;
            echo"
            <tr>
            <td>$number</td>
            <td>$subject_id</td>
            <td>$subject_name</td>
            </tr>
            ";
            }
            ?>
        </tbody>
    </table>