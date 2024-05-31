<style>
    .profile_image{
        width:250px;
        height:250px;
        border-radius:50%;
        object-fit:cover;
        margin:auto;
        display:block;
        overflow:hidden;
    }
</style>
<h1 class="text-center">Admin Profile</h1>
<?php 
$admin_name=$_SESSION['admin_name'];
$select_admin="select * from `admin` where admin_name='$admin_name'";
$run_select=mysqli_query($con,$select_admin);
$fetch=mysqli_fetch_assoc($run_select);
$admin_image=$fetch['admin_image'];
echo"
<img src='admin_photo/$admin_image' alt='' style='border-radius:50%' class='profile_image mt-5'/>
<h3 class='text-center'>".$_SESSION['admin_name']."</h3>
<div class='text-center'>
<a href='index.php?update_admin' class='btn btn-info w-50 my-2'>Update Admin</a>
<a href='index.php?delete_admin' class='btn btn-danger w-50 '>Delete Admin</a> </div>";

?>