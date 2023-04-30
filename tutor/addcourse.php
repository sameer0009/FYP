<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Course</title>
  <link rel="stylesheet" href="../css/addcourse.css"> <!-- Link to your custom CSS file -->
</head>
<body>
  <?php
  session_start();
  if (!isset($_SESSION['user_name'])) {
    header('Location: ../signin.php'); // redirect to the login page if the student is not logged in
    exit();
  }
  ?>

  <?php include('./t_head.php'); ?>

  <!-- Navigation Bar -->
  <?php include('./t_header.php'); ?>
  <!-- End of Navigation Bar -->

  <!-- Form -->
  <div class="container">
    <h2 >Add New Course</h2>
    <form action="addcourse.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <div class="d-flex justify-content-center">
          <div class="btn btn-primary btn-rounded">
            <label class="form-label text-white m-1" for="customFile1">Choose file</label>
            <input type="file" name="file" />
          </div>
        </div>
      </div>

      <div class="form-group">
        <label for="coursename">Enter Course Name</label>
        <input type="text" class="form-control" id="coursename" placeholder="Enter Course Name" name="coursename">
      </div>

      <div class="form-group">
        <label for="courseinstructor">Enter Instructor Name</label>
        <input type="text" class="form-control" id="courseinstructor" placeholder="Enter Instructor Name" name="courseinstructor">
      </div>

      <div class="form-group">
        <label for="courseprice">Enter Course Price</label>
        <input type="text" class="form-control" id="courseprice" placeholder="Enter Course Price" name="courseprice">
      </div>

      <div class="form-group">
        <label for="courseduration">Enter Course Duration</label>
        <input type="text" class="form-control" id="courseduration" placeholder="Enter Course Duration" name="courseduration">
      </div>

      <div class="form-group">
        <label for="coursedescription">Course Description</label>
        <textarea class="form-control" id="coursedescription" rows="5" name="coursedescription"></textarea>
      </div>

      <button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>
    </form>
  </div>

  <!-- Course Cards -->
  <div class="container">
    <h2> Courses List </h2>
    <?php 
    include('../dbcon.php');
    $query = "SELECT course_id, course_name, course_description, course_duration, course_price FROM course";
    $query_run = mysqli_query($con, $query);
    $course = mysqli_num_rows($query_run);
    
    if ($course > 0) {
      while ($row = mysqli_fetch_array($query_run)) {
    ?>
        
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Name: <?php echo $row['course_name']; ?></h4>
            <p class="card-title"><b>ID:</b> <?php echo $row['course_id']; ?></p>
            <p class="card-title"><b>Duration:</b> <?php echo $row['course_duration']; ?></p>
        <p class="card-text"><b>Price:</b> <?php echo $row['course_price']; ?> PKR</p>
        <p class="card-text"><b>Description:</b> <?php echo $row['course_description']; ?></p>
        
        <form action="delete_course.php" method="post">
          <input type="hidden" name="course_id" value="<?php echo $row['course_id']; ?>">
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
   
    <?php
      }
    }
    ?>
  </div>

  
</body>
</html>
