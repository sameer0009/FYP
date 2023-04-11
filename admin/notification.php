<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../join.php'); // redirect to the login page if the student is not logged in
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="../css/a_noti_style.css"rel="stylesheet">
</head>
<?php
include ('./a_header.php'); 
?>
<br> 
<?php

// Connect to the database (replace with your own credentials)
include('../dbcon.php');

// Check if the form is submitted
if(isset($_POST['submit'])){
    // Get form data
    $message = $_POST['message'];

    // Insert notification into the database
    $sql = "INSERT INTO notifications (user_id, message) VALUES (2, '$message')";
    $result = mysqli_query($con, $sql);
    if($result){
        // Notification saved successfully
        $success = "Notification saved successfully.";
    }else{
        // Error while saving notification
        $error = "Error while saving notification.";
    }
}

// Get notifications for current user (tutor)
$user_id = 2; // Replace with actual tutor ID
$sql = "SELECT * FROM notifications WHERE user_id = $user_id ORDER BY created_at DESC";
$result = mysqli_query($con, $sql);
?>

<!-- Bootstrap notification panel -->
<div class="card">
  <div class="card-header bg-danger text-white">
    Notifications
  </div>
  <div class="card-body">
    <!-- Notification form -->
    <form method="post">
      <div class="form-group">
        <label for="message">Notification</label>
        <textarea class="form-control" id="message" name="message" rows="3" required ></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Send</button>
      <?php if(isset($success)): ?>
        <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
      <?php endif; ?>
      <?php if(isset($error)): ?>
        <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
      <?php endif; ?>
    </form>

   

  </div>
</div>
</body>
</html>