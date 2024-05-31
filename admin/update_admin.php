<?php 
if(isset($_GET['update_admin'])){
    $admin_name=$_SESSION['admin_name'];
    $select_admin="select * from `admin` where admin_name='$admin_name'";
    $run_select=mysqli_query($con,$select_admin);
    $fetch=mysqli_fetch_assoc($run_select);
    $admin_image=$fetch['admin_image'];
    $admin_email=$fetch['admin_email'];
}
?>

<h1 class="text-center">Update Admin</h1>
<form action="" method='post' enctype='multipart/form-data'>
    <div class="form-outline mb-3 w-50 m-auto">
        <label for="admin_name" class="form-label">Admin Name</label>
        <input type="text" class="form-control" name='admin_name' value=<?php echo $admin_name ?>>
    </div>
    <div class="form-outline mb-3 w-50 m-auto">
        <label for="admin_email" class="form-label">Admin Email</label>
        <input type="text" class="form-control" name='admin_email' placeholder='<?php echo $admin_email ?>'>
    </div>
    <div class="form-outline mb-3 d-flex w-50 m-auto">
        <!-- <label for="admin_image" class="form-label">AdminImage</label> -->
        <input type="file" class="form-control m-auto" name='admin_image'>
        <img src="admin_photo/<?php echo $admin_image ?>" alt="" class='table_image'>
    </div>
    <div class="form-outline mb-3 w-50 m-auto text-center">
        <input type="submit" class="btn btn-info" name='update_admin' value='Update'>
    </div>
</form>

<?php 
if(isset($_POST['update_admin'])){
    $new_admin_name=$_POST['admin_name'];
    $new_admin_email=$_POST['admin_email'];
    $new_admin_image=$_FILES['admin_image']['name'];
    $tmp_admin_image=$_FILES['admin_image']['tmp_name'];

    $select_admin="select * from `admin` where admin_name='$new_admin_name' and admin_email='$new_admin_email'";
    $run_select=mysqli_query($con,$select_admin);
    $number=mysqli_num_rows($run_select);
    if($number>0){
        echo "<script>alert('This admin detail is already registered !! ')</script>";
    }else{
        move_uploaded_file($tmp_admin_image,"admin_photo/$new_admin_image");
        $update_query="update `admin` set admin_name='$new_admin_name',admin_email='$new_admin_email',admin_image='$new_admin_image'";
        $run_update=mysqli_query($con,$update_query);
        if($run_update){
            echo "<script>alert('Updated !! ')</script>";
            echo "<script>window.open('admin_signin.php','_self')</script>";
        }
    }
    
}
?>