<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../signin.php'); // Redirect to the login page if the tutor is not logged in
  exit();
}

include('../dbcon.php');

if (isset($_POST['submit'])) {
  $contentTitle = $_POST['contenttitle'];
  $contentType = $_POST['contenttype'];
  $courseID = $_GET['course_id']; // Assuming you are receiving the course_id parameter in the URL

  $fileName = $_FILES['contentfile']['name'];
  $fileTmpName = $_FILES['contentfile']['tmp_name'];
  $fileSize = $_FILES['contentfile']['size'];
  $fileError = $_FILES['contentfile']['error'];
  $fileType = $_FILES['contentfile']['type'];

  $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
  $allowedExtensions = array('pdf', 'ppt', 'pptx', 'doc', 'docx', 'mp4'); // Define the allowed file extensions

  if (in_array($fileExt, $allowedExtensions)) {
    if ($fileError === 0) {
      if ($fileSize < 52428800) { // Adjust the maximum file size limit if needed (currently set to 50MB)
        $newFileName = uniqid('', true) . '.' . $fileExt;
        $fileDestination = '../uploads/' . $newFileName;
        move_uploaded_file($fileTmpName, $fileDestination);

        $query = "INSERT INTO course_content (course_id, content_title, content_type, content_file)
                  VALUES ('$courseID', '$contentTitle', '$contentType', '$fileDestination')";
        $query_run = mysqli_query($con, $query);

        if ($query_run) {
          echo 'Course content uploaded successfully.';
        } else {
          echo 'Error: Unable to upload course content.';
        }
      } else {
        echo 'Error: The file size exceeds the maximum limit.';
      }
    } else {
      echo 'Error: An error occurred during file upload.';
    }
  } else {
    echo 'Error: Invalid file extension. Only PDF, PPT, PPTX, DOC, DOCX, and MP4 files are allowed.';
  }
}
?>
