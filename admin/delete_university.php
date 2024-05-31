<?php 
if(isset($_GET['delete_university'])){
    $university_id=$_GET['delete_university'];
    $delete_query="delete from `universities` where university_id=$university_id";
    $run=mysqli_query($con,$delete_query);
    if($run){
        echo "<script>alert('University Detail is Deleted !!') </script>";
        echo "<script>window.open('index.php?universities','_self') </script>";
    }
}