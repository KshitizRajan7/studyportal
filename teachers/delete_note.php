<?php 
if(isset($_GET['delete_note'])){
    $note_id=$_GET['delete_note'];
    $delete_query="delete from `notes` where note_id=$note_id";
    $run=mysqli_query($con,$delete_query);
    if($run){
        echo "<script>alert('Note Detail is Deleted !!') </script>";
        echo "<script>window.open('index.php?note','_self') </script>";
    }
}