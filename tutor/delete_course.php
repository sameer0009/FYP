<?php
 include ('../dbcon.php');

  if(isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    $sql = "DELETE FROM course WHERE course_id='$course_id'";
    if(mysqli_query($con, $sql)) {
      header("Location: addcourse.php");
      exit();
    } 
}
?>