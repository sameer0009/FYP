<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../signin.php'); // redirect to the login page if the student is not logged in
exit();
}
?>
<?php
include('../dbcon.php');

if (isset($_POST['submit'])) {
    $profile_picture=$_FILES['picture'];
   
   $picture=$_FILES['picture']['name'];
   $picture_temp=$_FILES['picture']['tmp_name'];
   
   $target="../uploads/" .$picture;


$address=mysqli_real_escape_string($con,$_POST['address']);
$area=mysqli_real_escape_string($con,$_POST['area']);
$postal_code=mysqli_real_escape_string($con,$_POST['postcode']);
$coutry=mysqli_real_escape_string($con,$_POST['country']);
$state=mysqli_real_escape_string($con,$_POST['state']);
$id=mysqli_real_escape_string($con,$_POST['id']);
$query="INSERT INTO `tutify`.`profile_s`(`address`, `postal_code`, `area`, `country`, `state`, `picture`, `id`) VALUES ('$address','$postal_code','$area','$coutry','$state','$picture','$id')";

if (move_uploaded_file($picture_temp,$target)) {
    mysqli_query($con,$query);
}else {
    echo"files not uploaded";
}


}
?>
<html>
   <?php 
   
   include ('./header.php');
   
   ?>
<!-- Profile Management -->
  <div id="profile-management" class="container">
    <div class="container">
        
            <div class="col-md-12">
                <div class="p-3 py-6">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="student_profile.php" method="post" enctype="multipart/form-data">
                    <div>
                    <div class="d-flex justify-content-center">
                        <div class="btn btn-primary btn-rounded">
                            <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                            <input type="file" name="picture" />
                        </div>
                    </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="enter address line 2" name="address"></div>
                        <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" name="postcode"></div>
                        <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2"  name="area"></div>
                        <div class="col-md-12"><input type="hidden" class="form-control" value="<?php echo $_SESSION['id'];?>"  name="id"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" name="country"></div>
                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" name="state" placeholder="state"></div>
                        
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="submit"  type="submit" value="submit">Save Profile</button></div>
                </div>
                </form>
            </div>
    </div>
    </div>
    </div>