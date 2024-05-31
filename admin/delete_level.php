<?php 
if(isset($_GET['delete_level'])){
    $level_id=$_GET['delete_level'];
    $delete_query="delete from `level` where level_id=$level_id";
    $run=mysqli_query($con,$delete_query);
    if($run){
        echo "<script>alert('Level Detail is Deleted !!') </script>";
        echo "<script>window.open('index.php?level','_self') </script>";
    }
}