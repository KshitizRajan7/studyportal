
<style>
        .table_image{
         width: 100px;
         height: 100px;
         object-fit:contain;
        }
    </style>

<h1 class='text-center mb-0 vw-100'>Universities</h1>
    <a href='index.php?insert_university' class='btn btn-success mx-5 my-2'>Insert University</a>

    <?php 
            $select_table="select * from `universities`";
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
                <th>University ID</th>
                <th>University Name</th>
                <th>University Email</th>
                <th>University Logo</th>
                <th>University Address</th>
                <th>University Phone</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody>";
    
            while($row_data=mysqli_fetch_array($run_select)){
                $university_id=$row_data['university_id'];
                $university_name=$row_data['university_name'];
                $university_email=$row_data['university_email'];
                $university_image=$row_data['university_image'];
                $university_address=$row_data['university_address'];
                $university_phone=$row_data['university_phone'];
                $number++;
            echo"
            <tr>
            <td>$number</td>
            <td>$university_id</td>
            <td>$university_name</td>
            <td>$university_email</td>
            <td><img src='university_logos/$university_image' class='table_image'/></td>
            <td>$university_address</td>
            <td>$university_phone</td>
            <td>
            <a href='index.php?update_university=$university_id'><i class='fa-solid fa-pen-to-square'></i></a>
            <a href='index.php?delete_university=$university_id' class='ms-3 text-danger'><i class='fa-solid fa-trash'></i></a>
            </td>
            </tr>
            ";
            }
            }
            ?>
            </tbody>
            </table>