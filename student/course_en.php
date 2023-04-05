<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../signin.php'); // redirect to the login page if the student is not logged in
exit();
}
?>
<!DOCTYPE html>
<html>
 
<?php 
include('./header.php');
?>
     
  <div>
  <?php 
  include ('../dbcon.php');
  $query="SELECT course_id,course_name,course_description,course_duration,course_price,course_intsructor FROM course";
  $query_run=mysqli_query($con,$query);
  $course=mysqli_num_rows($query_run);
  ?>
  <div class="row">
   <?php
  if($course>0)
  {
    while ($row=mysqli_fetch_array($query_run)) {
      ?>
  <div class="card" style="width: 25rem; margin: 2rem 0rem 1rem 10rem; ">
  <div class="card-body">
  <h4 class="card-text">Instrcutor:<?php echo $row['course_intsructor']?></h4>
    <p class="card-title"><b>Name:</b><?php echo $row['course_name']?></p>
    <p class="card-title"><b>ID:</b><?php echo $row['course_id']?></p>
    <p class="card-title"><b>Duration:</b><?php echo $row['course_duration']?></p>
    <p class="card-text"><b>Price:</b><?php echo $row['course_price']?> PKR</p>
    <p class="card-text"><b>Description:</b><?php echo $row['course_description']?></p>
    
    <form action="course_en.php" method="post">
      <input type="hidden" name="course_id" value="<?php echo $row['course_id']?>">
    <button input="submit"  class="btn btn-primary">Enroll</button>
    </form>
  </div>
</div> 
     
      <?php
    }
  }
  ?>
</div>
  


</div>