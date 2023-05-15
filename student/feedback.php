<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../signin.php'); // redirect to the login page if the student is not logged in
  exit();
}
?>

<html>
<head>
  <link href="../css/feedback_style.css" rel="stylesheet">
 
</head>

<?php
include ('header.php');
?>

<?php
include ('../dbcon.php');

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Get the form data
  $tutor_id = mysqli_real_escape_string($con, $_POST['tutor_id']);
  $tutor_name = mysqli_real_escape_string($con, $_POST['tutor_name']);
  $student_name = mysqli_real_escape_string($con, $_POST['student_name']);
  $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
  $rating = mysqli_real_escape_string($con, $_POST['rating']);
  $comment = mysqli_real_escape_string($con, $_POST['comment']);

  // Connect to the database

  // Insert the review into the database
  $sql = "INSERT INTO tutor_reviews (feedback_tutor_id, tutor_name, student_name, student_id, rating, comment) VALUES ('$tutor_id', '$tutor_name', '$student_name', '$student_id', '$rating', '$comment')";
  mysqli_query($con, $sql);
}

?>

<?php
// Connect to the MySQL database

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Write a MySQL query to fetch data from the table
$sql = "SELECT user_type, fname, id FROM users";

// Execute the query and fetch the data in an array
$result = mysqli_query($con, $sql);
$optionsname = '';
$optionsid = '';

while ($row = mysqli_fetch_array($result)) {
  if ($row['user_type'] == "Teacher") {
    $optionsname .= '<option value="'.$row['fname'].'">'.$row['fname'].'</option>';
    $optionsid .= '<option value="'.$row['id'].'">'.$row['id'].'</option>';
  }
}
?>

<!-- Display the review form -->
<form method="post" action="">
<h2>Tutor Feedback</h2>
  <select name="tutor_name">
    <?php echo $optionsname; ?>
  </select>
  <select name="tutor_id">
    <?php echo $optionsid; ?>
  </select>
  <input type="hidden" name="student_id" value="<?php echo $_SESSION['id']; ?>">
  <input type="hidden" name="student_name" value="<?php echo $_SESSION['user_name']; ?>">
 
  <div class="rating-section">
  <h4>Rate the Tutor</h4>
  <div class="rating">
    <input type="radio" id="star1" name="rating" value="5">
    <label class="rating-star" for="star1" title="1 star"></label>
    <input type="radio" id="star2" name="rating" value="4">
    <label class="rating-star" for="star2" title="2 stars"></label>
    <input type="radio" id="star3" name="rating" value="3">
    <label class="rating-star" for="star3" title="3 stars"></label>
    <input type="radio" id="star4" name="rating" value="2">
    <label class="rating-star" for="star4" title="4 stars"></label>
    <input type="radio" id="star5" name="rating" value="1">
    <label class="rating-star" for="star5" title="5 stars"></label>
  </div>
</div>

  <br>
  <br>
  <label for="comment">Comment:</label>
  <textarea name="comment"></textarea>
  <br>
  <input type="submit" value="Submit Review">
</form>
</body>
</html>

