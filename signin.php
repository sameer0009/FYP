<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://www.w3schools.com/lib/w3.js"></script>
  <link rel="stylesheet" href="./css/signin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
  </style>
</head>
<body>
  <h1>Sign In</h1>

  <?php
  include 'dbcon.php';
  require '../fyp-main/PHPMailer/src/PHPMailer.php';
  require '../fyp-main/PHPMailer/src/SMTP.php';
  require '../fyp-main/PHPMailer/src/Exception.php';
  
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  
  if (isset($_POST['forgot_password_submit'])) {
      $email = $_POST['email'];
  
      $temporary_code = mt_rand(100000, 999999); // Generate a six-digit temporary code
  
      $token_search = "SELECT * FROM users WHERE email='$email'";
      $query = mysqli_query($con, $token_search);
      $email_count = mysqli_num_rows($query);
  
      if ($email_count) {
          $update_token_query = "UPDATE users SET reset_token='$temporary_code' WHERE email='$email'";
          mysqli_query($con, $update_token_query);
  
  
          $mail = new PHPMailer();
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->Port = 587;
          $mail->SMTPSecure = 'tls';
          $mail->SMTPAuth = true;
          $mail->Username = 'tutify6@gmail.com';
          $mail->Password = 'cvdusmbzsatayahq';
          $mail->setFrom('tutify6@gmail.com', 'Team TUTIFY');
          $mail->addAddress($email);
          $mail->isHTML(true);
          $mail->Subject = 'Password Reset';
          $mail->Body = "now you can reset your password  or can login using this: $temporary_code";
          $mail->AltBody = "now you can reset your password  or can login using this: $temporary_code";
  
          if ($mail->send()) {
              echo "<script>alert(' Please check your email.')</script>";
  
              // Redirect the user to the password change page with the temporary code as a parameter
              echo "<script>window.location.href = 'password_change.php?email=$email&code=$temporary_code';</script>";
          } else {
              echo "<script>alert('Error sending . Please try again.')</script>";
          }
      } else {
          echo "<script>alert('Invalid email.')</script>";
      }
  }
  




  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email_search = "SELECT * FROM users WHERE email='$email' ";
    $query = mysqli_query($con, $email_search);

    $email_count = mysqli_num_rows($query);

    if ($email_count) {
      $row = mysqli_fetch_array($query); 
      if ($row['user_type'] == 'Student') {
        $_SESSION['user_name'] = $row['fname'];
        $_SESSION['id'] = $row['id'];
        header('location:student/student_dashboard.php');
      } elseif ($row['user_type'] == 'Teacher') {
        $_SESSION['user_name'] = $row['fname'];
        $_SESSION['id'] = $row['id'];
        header('location:tutor/tutor_dashboard.php');
      } elseif ($row['user_type'] == 'Admin') {
        $_SESSION['user_name'] = $row['fname'];
        header('location:admin/admin.php');
      }
    } else {
      echo "Invalid email";
    }
  }

?>

<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
  <div class="imgcontainer">
    <img src="./img/user.svg" alt="Avatar" class="avatar">
  </div>
  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required >
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required >
    <button name="submit" type="submit">Login</button>
    <span class="psw" style="color: #333333;"> <a href="#" onclick="document.getElementById('id01').style.display='block'">Forget Password</a></span>
    <br>
    <br>
    <button onclick="window.location.href = 'join.php';" class="back-button">Back</button>
  </div>
</form>

<div id="id01" class="w3-modal">
<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width: 600px">
  <div class="w3-container w3-teal">
    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
    <h2>Forgot Password</h2>
  </div>
  <div class="w3-container">
    <form action="#" method="post">
      <div class="w3-section">
        <label><b>Email</b></label>
        <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Email" name="email" required>
        <button class="w3-button w3-block w3-teal w3-section w3-padding" type="submit" name="forgot_password_submit">Reset</button>
      </div>
      
    </form>
  </div>
</div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
</body>
</html>
