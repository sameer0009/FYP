<?php
session_start();
$_SESSION['user_name'];
$_SESSION['id'];


?>
<?php
include('../dbcon.php');

if (isset($_POST['submit'])) {
    $profile_picture=$_FILES['picture'];
    $user_degree=$_FILES['degree'];
   $picture=$_FILES['picture']['name'];
   $picture_temp=$_FILES['picture']['tmp_name'];
   
   $target="../uploads/" .$picture;
$degree=$_FILES['degree']['name'];
$degree_temp=$_FILES['degree']['tmp_name'];

$target_degree="../degree/" .$degree;
if (move_uploaded_file($picture_temp,$target) and move_uploaded_file($degree_temp,$target_degree)) {
   // echo"files uploaded";
}else {
   // echo"files not uploaded";
}
$address=mysqli_real_escape_string($con,$_POST['address']);
$area=mysqli_real_escape_string($con,$_POST['area']);
$postal_code=mysqli_real_escape_string($con,$_POST['postcode']);
$coutry=mysqli_real_escape_string($con,$_POST['country']);
$state=mysqli_real_escape_string($con,$_POST['state']);
$ehistory=mysqli_real_escape_string($con,$_POST['detail']);
$experience=mysqli_real_escape_string($con,$_POST['experience']);
$hourly_rate = mysqli_real_escape_string($con, $_POST['hourly_rate']); // Added Hourly Rate


$id=mysqli_real_escape_string($con,$_POST['id']);

$query="INSERT INTO `tutify`.`profile_t`(`address`, `postal_code`, `area`, `country`, `state`, `ehistory`, `experience`, `degree`, `picture`,`hourly_rate`, `id`) VALUES ('$address','$postal_code','$area','$coutry','$state','$ehistory','$experience','$degree','$picture','$hourly_rate','$id')";

if(mysqli_query($con,$query))
{
  //  echo"new record created";
}else {
   // echo"no new recorder. failed";
}



}
?>
<html>
<?php
include('./t_head.php');
?>
    <body>
    
    <?php
    include('./t_header.php');
    ?>
    <!-- End of Navigation Bar -->

<!-- Profile Management -->
<div id="profile-management" class="container">
  <div class="container">
    <div class="col-md-12">
      <div class="p-3 py-6">
        <div class="d-flex justify-content-center align-items-center mb-3">
          <h4 class="text-right">Profile Settings</h4>
        </div>
        <form action="tutor_profile.php" method="post" enctype="multipart/form-data">
          <div>
            <div class="d-flex justify-content-center">
              <div class="btn btn-primary btn-rounded">
                <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                <input type="file" name="picture" id="picture" />
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12"><label class="labels">Address</label><input type="text" class="form-control" placeholder="Enter address line 2" name="address"></div>
            <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="Enter postcode" name="postcode"></div>
            <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="Enter area"  name="area"></div>
            <div class="col-md-12"><input type="hidden" class="form-control" value="<?php echo $_SESSION['id'];?>"  name="id"></div>
            <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="Enter education"  name="education"></div>
            <div class="col-md-12"><label class="labels">Experience</label><input type="text" class="form-control" placeholder="Enter experience" name="experience"></div>
            <div class="col-md-12"><label class="labels">Hourly Rate</label><input type="number" class="form-control" placeholder="Enter per hour rate" name="hourly_rate"></div> <!-- Added Hourly Rate field -->
            <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="Enter additional details" name="detail"></div>
          </div>
          <label class="labels">Degree</label>
          <div class="d-flex justify-content-center">
            <div class="btn btn-primary btn-rounded">
              <label class="form-label text-white m-1" for="customFile1">Choose file</label>
              <input type="file" name="degree" id="degree" />
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="Enter country" name="country"></div>
            <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" name="state" placeholder="Enter state/region"></div>
          </div>
          <div class="mt-5 text-center">
  <button class="btn btn-primary profile-button" name="submit" type="submit" value="submit">Save Profile</button>
</div>
</form>
</div>
</div>
</div>
</div>