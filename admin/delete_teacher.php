<?php 
if(isset($_GET['delete_student'])){
    $student_id=$_GET['delete_student'];
    $delete_query="delete from `students` where student_id=$student_id";
    $run=mysqli_query($con,$delete_query);
    if($run){
        echo "<script>alert('Student Detail is Deleted !!') </script>";
        echo "<script>window.open('index.php?student','_self') </script>";
    }
}