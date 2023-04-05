<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../signin.php'); // redirect to the login page if the student is not logged in
exit();
}
?>

<html>
    <head>
        <style>
            form {
  max-width: 500px;
  margin: 10rem auto;
  padding: 20px;
  background-color: #f7f7f7;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-family: Arial, sans-serif;
}

label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

input[type="submit"] {
    margin:1rem auto;
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

textarea {
  width: 100%;
  height: 100px;
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
  resize: vertical;
}

select {
  padding: 5px;
  border: 1px solid #ccc;
  border-radius: 5px;
  background-color: #fff;
  width: 100%;
  max-width: 200px;
}

select:focus {
  outline: none;
  border-color: #4CAF50;
}

        </style>
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
  $student_name=mysqli_real_escape_string($con, $_POST['student_name']); 
  $student_id =mysqli_real_escape_string($con, $_POST['student_id']);
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
$sql = "SELECT user_type,fname,id FROM users";

// Execute the query and fetch the data in an array
$result = mysqli_query($con, $sql);
$optionsname = '';
$optionsid = '';

while ($row = mysqli_fetch_array($result)) {
  if ($row['user_type']=="Teacher") {
    $optionsname .= '<option value="'.$row['fname'].'">'.$row['fname'].'</option>';
    $optionsid .= '<option value="'.$row['id'].'">'.$row['id'].'</option>';
  }
   
}
?>

<!-- Add the options to the drop-down list using HTML -->


<!-- Display the review form -->
<form method="post" action="">
<select name="tutor_name">
    <?php echo $optionsname; ?>
</select>
<select name="tutor_id">
<?php echo $optionsid;?>
</select>
  <input type="hidden" name="student_id" value="<?php echo $_SESSION['id']; ?>">
  <input type="hidden" name="student_name" value="<?php echo $_SESSION['user_name']; ?>">
  <label for="rating">Rating:</label>
  <select name="rating">
    <option value="1">1 Star</option>
    <option value="2">2 Stars</option>
    <option value="3">3 Stars</option>
    <option value="4">4 Stars</option>
    <option value="5">5 Stars</option>
  </select>
  <br>
  <label for="comment">Comment:</label>
  <textarea name="comment"></textarea>
  <br>
  <input type="submit" value="Submit Review">
</form>




    </body>

</html>