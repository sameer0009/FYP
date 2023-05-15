<?php
require 'dbcon.php';

if (isset($_POST['password_change_submit'])) {
    $email = $_POST['email'];
    $code = $_POST['code'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if the email and code are valid
    $checkCodeQuery = "SELECT * FROM users WHERE email='$email' AND reset_token='$code'";
    $result = mysqli_query($con, $checkCodeQuery);
    $rowCount = mysqli_num_rows($result);

    if ($rowCount) {
        if ($newPassword === $confirmPassword) {
            // Update the user's password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updatePasswordQuery = "UPDATE users SET password='$hashedPassword', reset_token='' WHERE email='$email'";
            mysqli_query($con, $updatePasswordQuery);

            echo "<script>alert('Password changed successfully. You can now login with your new password.')</script>";
            echo "<script>window.location.href = 'signin.php';</script>";
        } else {
            echo "<script>alert('Passwords do not match. Please try again.')</script>";
        }
    } else {
        echo "<script>alert('Invalid email or code.')</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Change</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./css/password_reset.css">
</head>
<body>
    <div class="container" >
    <h2> Change password</h2>
    <form method="POST" action="">
        <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
        <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>">
        <div>
            <label>New Password</label>
            <input type="password" name="new_password" required>
        </div>
        <div>
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" required>
        </div>
        <div>
            <button type="submit" name="password_change_submit">Change Password</button>
        </div>
        <div style="text-align: right;">
        <button onclick="window.location.href = 'signin.php';">Back</button>
    </div>
    </form>
   
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
