<?php 
if(isset($_POST['delete_student'])){
$delete_id=$_POST['delete_student'];
}
if(isset($_POST['delete_account'])){
    
$delete_query="delete * from  `students` where student_id=$delete_id";
$run_delete=mysqli_query($con,$delete_query);
if($run_delete){
    echo "<script>alert('Deleted !!')</script>";
    echo "<script>window.open('student_login.php','_self')</script>";
}
}
if(isset($_POST['no_delete'])){
        echo "<script>window.open('index.php','_self')</script>";
    }

?>

<h3 class="text-center text-danger">Delete Account</h3>    
<form action="" method='post' class='text-center mt-5'>
    <div class="form-outline">
        <input type="submit" class='btn btn-danger border-0 w-50 m-auto my-3' name='delete' value='Delete account.'>
    </div>
    <div class="form-outline">
        <input type="submit" class='btn btn-secondary border-0 w-50 m-auto' name='no_delete' value='Do not delete account.'>
    </div>
</form>