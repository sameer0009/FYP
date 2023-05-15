<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/signup.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <style> @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap'); </style>
    <title>Sign Up</title>
</head>
<body>


<form method="POST" action="index.php">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="fname"><b>First Name</b></label>
    <input type="text" id="fname" placeholder="Enter First Name" name="fname" required>
    <label for="lname"><b>Last Name</b></label>
    <input type="text" id="lname" placeholder="Enter Last Name" name="lname" required>
    <label for="phone"><b>Phone Number</b></label>
    <input type="text" id="phone" placeholder="Enter Phone Number" name="phone" required>
    <label for="email"><b>Email</b></label>
    <input type="email" id="email" placeholder="Enter Email" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" id="password" placeholder="Enter Password" name="password" required>

    <label><b>Select Type</b></label>
    <br>
    <input type="radio" id="student" name="type" value="Student">
    <label for="student">Student</label><br>
    <input type="radio" id="teacher" name="type" value="Teacher">
    <label for="teacher">Tutor</label><br>

    <p>By creating an account you agree to our <a href="./terms_policy.php" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="submit" name="submit" class="signupbtn">Sign Up</button>
    </div>
    <button onclick="window.location.href = 'join.php';" class="back-button">Back</button>

  </div>
</form>
</body>
</html>
