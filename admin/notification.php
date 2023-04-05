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
  <title>Student Panel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <!-- Favicon -->
   <link href="img/favicon.ico" rel="icon">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="css/style.css" rel="stylesheet">
<style>
.card {
  margin: auto;
  width: 50%;
  border-radius: 10px;
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.3);
  border: none;
}

.card-header {
  border-radius: 10px 10px 0 0;
}

.card-body {
  padding: 20px;
}

.form-group label {
  font-weight: bold;
}

.btn-primary {
  margin-top: 10px;
}

.alert {
  margin-top: 10px;
  border-radius: 10px;
}

.card-text {
  margin: 0;
}

.text-secondary {
  font-size: small;
}
</style>
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo $_SESSION['user_name']; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#home">Home</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_list.php">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#notifications">Transactions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tutor-list">Update Record</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tutor-list">TSA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="notification.php">Notification</a>
        </li>
      </ul>
    </div>
    <a href="../logout.php" title="Logout" class="btn btn-danger py-4 px-3 d-none d-lg-block">Log out</a>
  </nav>
 

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
  <div class="card-header bg-primary text-white">
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

   <!-- Notification list -->
   

  </div>
</div>
</body>
</html>