<?php 
if(isset($_GET['delete_faculty'])){
    $faculty_id=$_GET['delete_faculty'];
    $delete_query="delete from `faculties` where faculty_id=$faculty_id";
    $run=mysqli_query($con,$delete_query);
    if($run){
        echo "<script>alert('Faculty Detail is Deleted !!') </script>";
        echo "<script>window.open('index.php?faculty','_self') </script>";
    }
}