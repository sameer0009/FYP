<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="./css/signin.css">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <style> @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap'); </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Sign In</title>
</head>

<body>


  
  <?php
  include 'dbcon.php';
  
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $email_search = "SELECT * FROM users WHERE email='$email' ";
    $query=mysqli_query($con,$email_search);

    $email_count = mysqli_num_rows($query);

    if ($email_count) {
        $row=mysqli_fetch_array($query); 
        if($row['user_type'] == 'Student'){
          $_SESSION['user_name']=$row['fname'];
          $_SESSION['id']=$row['id'];
          header('location:student/student_dashboard.php');
        }elseif($row['user_type'] == 'Teacher'){
          $_SESSION['user_name']=$row['fname'];
          $_SESSION['id']=$row['id'];
          header('location:tutor/tutor_dashboard.php');
        }elseif ($row['user_type'] == 'Admin') {
          $_SESSION['user_name'] =$row['fname'];
          header('location:admin/admin.php');
        }
    }else{
      echo "invalid email";
    }
  }
  ?>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
  <div class="imgcontainer">
    <img src="./img/user.svg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button name="submit" type="submit">Login</button>
  </div>
   
  </div>
</form>
</body>
</html>