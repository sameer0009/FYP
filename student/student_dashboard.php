<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../signin.php'); // redirect to the login page if the student is not logged in
exit();
}
?>
<!DOCTYPE html>
<html>
<?php 
include ('./header.php');
?>
  <div id="notifications-panel"></div>
</body>
