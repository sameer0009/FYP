<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../signin.php'); // Redirect to the login page if the tutor is not logged in
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Content</title>
  <link rel="stylesheet" href="../css/course_content.css"> <!-- Link to your custom CSS file -->
</head>
<body>
  <?php include('./t_head.php'); ?>

  <!-- Navigation Bar -->
  <?php include('./t_header.php'); ?>
  <!-- End of Navigation Bar -->

  <!-- Course Content Upload Form -->
  <div class="container">
    <h2>Manage Course Content</h2>
    <form action="upload_content.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="contenttitle">Content Title</label>
        <input type="text" class="form-control" id="contenttitle" placeholder="Enter Content Title" name="contenttitle" required>
      </div>

      <div class="form-group">
        <label for="contenttype">Content Type</label>
        <select class="form-control" id="contenttype" name="contenttype" required>
          <option value="slides">Slides</option>
          <option value="documents">Documents</option>
          <option value="video">Video Lecture</option>
        </select>
      </div>

      <div class="form-group">
        <label for="contentfile">Upload Content File</label>
        <input type="file" class="form-control-file" id="contentfile" name="contentfile" required>
      </div>

      <button class="btn btn-primary" type="submit" name="submit" value="submit">Upload</button>
    </form>
  </div>

  <!-- Manage Course Content -->
  <div class="container">
    <h2>Manage Course Content</h2>
    <?php 
    include('../dbcon.php');
    $course_id = $_GET['course_id']; // Assuming you are receiving the course_id parameter in the URL

    $query = "SELECT * FROM course_content WHERE course_id = $course_id";
    $query_run = mysqli_query($con, $query);
    $content = mysqli_num_rows($query_run);

    if ($content > 0) {
      while ($row = mysqli_fetch_array($query_run)) {
        $content_id = $row['content_id'];
        $content_title = $row['content_title'];
        $content_type = $row['content_type'];
        $content_file = $row['content_file'];
    ?>
        <div class="row">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><?php echo $content_title; ?></h4>
              <p class="card-text">Type: <?php echo $content_type; ?></p>
              <a href="<?php echo $content_file; ?>" class="btn btn-primary" target="_blank">Download</a>
              <a href="delete_content.php?content_id=<?php echo $content_id; ?>" class="btn btn-danger">Delete</a>
            </div>
          </div>
        </div>
    <?php
      }
    }
