<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../signin.php'); // redirect to the login page if the student is not logged in
exit();
}
?>
<?php
include('../dbcon.php');
if(isset($_POST['submit'])){
   $file=$_FILES['file'];
   //print_r($file);

    $course_image=$_FILES['file']['name'];
    $course_image_temp=$_FILES['file']['tmp_name'];
    $course_image_error=$_FILES['file']['error'];
    $target="../uploads/" .$course_image;
    $course_name=mysqli_real_escape_string($con,$_POST['coursename']);
    $course_price=mysqli_real_escape_string($con,$_POST['courseprice']);
    $course_instructor=mysqli_real_escape_string($con,$_POST['courseinstructor']);
    $course_description=mysqli_real_escape_string($con,$_POST['coursedescription']);
    $course_duration=mysqli_real_escape_string($con,$_POST['courseduration']);

    $sql="INSERT INTO `tutify`.`course`(`course_name`,`course_intsructor`, `course_duration`, `course_price`, `course_description`,`course_image`) VALUES ('$course_name','$course_instructor','$course_duration','$course_price','$course_description','$course_image')";
   // echo $sql;
    

    if (move_uploaded_file($course_image_temp,$target)) {
      mysqli_query($con,$sql);
  } else {
      echo  "Failed to upload file, handle error";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
include('./t_head.php');
?>
<body>
    <!-- Navigation Bar -->
    <?php
    include('./t_header.php');
    ?>
    <!-- End of Navigation Bar -->

    <!-- image -->
    <div class="container d-flex justify-content-center">
   <form action="addcourse.php" method="POST" enctype="multipart/form-data">
<div>
    <div class="d-flex justify-content-center">
        <div class="btn btn-primary btn-rounded">
        
            <label class="form-label text-white m-1" for="customFile1">Choose file</label>
            <input type="file" name="file" />
        </div>
    </div>
</div>
<div class="row mt-3 align-items-center">

    <div class="col">
    <label for="course">Enter Course Name</label>
      <input type="text" class="form-control" placeholder="Enter Course Name" name="coursename">
    </div>
  </div>
  <div class="row mt-3 align-items-center">

 <div class="col">
    <label for="course">Enter Instructor Name</label>
      <input type="text" class="form-control" placeholder="Enter Instructor Name" name="courseinstructor">
    </div>
  </div>
  <div class="row mt-3 align-items-center">

    <div class="col">
    <label for="course">Enter Course Price</label>
      <input type="text" class="form-control" placeholder="Enter Course Price" name="courseprice">
    </div>
  </div>
  <div class="row mt-3 align-items-center">
  <div class="col">
    <label for="course">Enter Course Duration</label>
      <input type="text" class="form-control" placeholder="Enter Course Duration" name="courseduration">
    </div>
  </div>
  <div class="row mt-3 align-items-center">

   
  <label for="comment">Course Description</label>
<textarea class="form-control" rows="5" id="comment" name="coursedescription"></textarea>
<div class="m-1">
  <button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>
</div>
</form>

</div>

<div>
  <?php 
  $query="SELECT course_id,course_name,course_description,course_duration,course_price FROM course";
  $query_run=mysqli_query($con,$query);
  $course=mysqli_num_rows($query_run);
  
  if($course>0)
  {
    while ($row=mysqli_fetch_array($query_run)) {
      ?>
      <div class="card" style="width: 25rem; margin: 0rem 0rem 1rem 10rem; ">
  <div class="card-body">
    <h4 class="card-title">Name:<?php echo $row['course_name']?></h4>
    <p class="card-title"><b>ID:</b><?php echo $row['course_id']?></p>
    <p class="card-title"><b>Duration:</b><?php echo $row['course_duration']?></p>
    <p class="card-text"><b>Price:</b><?php echo $row['course_price']?> PKR</p>
    <p class="card-text"><b>Description:</b><?php echo $row['course_description']?></p>
    
    <form action="delete_course.php" method="post">
      <input type="hidden" name="course_id" value="<?php echo $row['course_id']?>">
    <button input="submit"  class="btn btn-danger">Delete</button>
    </form>
  </div>
</div>
     
      <?php
    }
  }
  ?>

  


</div>



 <!--Image-->
                            
</body>
</html>