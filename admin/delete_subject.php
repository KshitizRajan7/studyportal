<?php 
if(isset($_GET['delete_subject'])){
    $subject_id=$_GET['delete_subject'];
    $delete_query="delete from `subjects` where subject_id=$subject_id";
    $run=mysqli_query($con,$delete_query);
    if($run){
        echo "<script>alert('Subject Detail is Deleted !!') </script>";
        echo "<script>window.open('index.php?subject','_self') </script>";
    }
}