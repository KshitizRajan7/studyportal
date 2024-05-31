<?php 
if(isset($_GET['delete_chapter'])){
    $chapter_id=$_GET['delete_chapter'];
    $delete_query="delete from `chapters` where chapter_id=$chapter_id";
    $run=mysqli_query($con,$delete_query);
    if($run){
        echo "<script>alert('chapter Detail is Deleted !!') </script>";
        echo "<script>window.open('index.php?chapter','_self') </script>";
    }
}