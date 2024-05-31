<?php 
if(isset($_GET['delete_semester'])){
    $semester_id=$_GET['delete_semester'];
    $delete_query="delete from `semesters` where semester_id=$semester_id";
    $run=mysqli_query($con,$delete_query);
    if($run){
        echo "<script>alert('Semester Detail is Deleted !!') </script>";
        echo "<script>window.open('index.php?semester','_self') </script>";
    }
}