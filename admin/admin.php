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
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="css/style.css" rel="stylesheet">
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
          <a class="nav-link" href="./tsa_question.php">TSA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="notification.php">Notification</a>
        </li>
      </ul>
    </div>
  </nav>
  
     
