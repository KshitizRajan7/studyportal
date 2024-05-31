<?php 
if(isset($_GET['delete_question'])){
    $question_id=$_GET['delete_question'];
    $delete_query="delete from `questions` where question_id=$question_id";
    $run=mysqli_query($con,$delete_query);
    if($run){
        echo "<script>alert('Question Detail is Deleted !!') </script>";
        echo "<script>window.open('index.php?question','_self') </script>";
    }
}