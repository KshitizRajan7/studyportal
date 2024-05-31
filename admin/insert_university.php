<h1 class='text-center bg-dark text-light'>Insert University</h1>
<div class="container-fluid m-auto w-50">
    <form action="" method='post' enctype='multipart/form-data'>
        <div class="form-outline mt-2">
            <label for="university_name" class='form-label'>University Name</label>
            <input type="text" name='university_name' class='form-control' placeholder='Enter University Name' required='required'/>
        </div>
        <div class="form-outline mt-2">
            <label for="university_email" class='form-label'>University Email</label>
            <input type="email" name='university_email' class='form-control' placeholder='Enter University Email'  required='required'/>
        </div>
        <div class="form-outline mt-2">
            <label for="university_image" class='form-label'>University Image</label>
            <input type="file" name='university_image' class='form-control' placeholder='Enter University Name'  required='required'/>
        </div>
        <div class="form-outline mt-2">
            <label for="university_address" class='form-label'>University Address</label>
            <input type="text" name='university_address' class='form-control' placeholder='Enter University Name'  required='required'/>
        </div>
        <div class="form-outline mt-2">
            <label for="university_phone" class='form-label'>University Phone</label>
            <input type="text" name='university_phone' class='form-control' placeholder='Enter University Name'  required='required'/>
        </div>
        <div class="form-outline mt-2">
            <input type="submit" name='university_submit' class='form-control btn btn-success' value='Insert University'>
        </div>
    </form>
</div>

<?php 
if(isset($_POST['university_submit'])){
    $university_name=$_POST['university_name'];
    $university_email=$_POST['university_email'];
    $university_address=$_POST['university_address'];
    $university_phone=$_POST['university_phone'];

    $university_image=$_FILES['university_image']['name'];
    $university_tmp_image=$_FILES['university_image']['tmp_name'];
    
    $select_query="select * from `universities` where university_name='$university_name' or university_email='$university_email' or university_phone='$university_phone'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This university detail is already registered !!')</script>";
    }else{
    move_uploaded_file($university_tmp_image,"university_logos/$university_image");
    $insert_query="insert into `universities` (university_name,university_email,university_image,university_address,university_phone) values ('$university_name','$university_email','$university_image','$university_address','$university_phone')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('University Inserted !!')</script>";
        echo "<script>window.open('index.php?university','_self')'</script>";
    }}
}
?>