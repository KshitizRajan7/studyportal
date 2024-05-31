<?php 
if(isset($_GET['delete_program'])){
    $program_id=$_GET['delete_program'];
    $delete_query="delete from `programs` where program_id=$program_id";
    $run=mysqli_query($con,$delete_query);
    if($run){
        echo "<script>alert('Program Detail is Deleted !!') </script>";
        echo "<script>window.open('index.php?program','_self') </script>";
    }
}