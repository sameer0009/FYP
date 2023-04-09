<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: ../join.php'); // redirect to the login page if the user is not logged in
    exit();
}

// Connect to the database
include('../dbcon.php');

// Get the subject ID from the query string parameter
$subject_id = $_GET['subject_id'];

// Fetch the subject name from the database
$sql_subject = "SELECT subject FROM tblsubjects WHERE ID = '$subject_id'";
$result_subject = mysqli_query($con, $sql_subject);
$row_subject = mysqli_fetch_assoc($result_subject);
$subject_name = $row_subject['subject'];

// Handle search filter
$search_term = '';
if (isset($_POST['search'])) {
    $search_term = $_POST['search_term'];
}

$sql_questions = "SELECT * FROM tsa_questions WHERE subject = '$subject_name'";
if (!empty($search_term)) {
    $sql_questions .= " AND (Question LIKE '%$search_term%' OR Option1 LIKE '%$search_term%' OR Option2 LIKE '%$search_term%' OR Option3 LIKE '%$search_term%' OR Option4 LIKE '%$search_term%')";
}

$result_questions = mysqli_query($con, $sql_questions);
$questions = mysqli_fetch_all($result_questions, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<?php include ('./a_header.php'); ?>
<body>
  <div class="container">
    <h1>Questions for <?php echo $subject_name; ?></h1>
    <!-- Search filter form -->
<form method="post" action="">
  <div class="form-group">
    <label for="search_term">Search:</label>
    <input type="text" name="search_term" id="search_term" class="form-control" required value="<?php echo $search_term; ?>">
  </div>
  <button type="submit" name="search" class="btn btn-primary">Search</button>
</form>
<br>
<button type="button" class="btn btn-secondary ml-auto" onclick="history.back()">Back</button>
<br>
<!-- Display all questions -->
<div class="row">
  <?php foreach ($questions as $question): ?>
    <div class="col-md-12 mt-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><?php echo $question['question']; ?></h5>
          <p class="card-text">Option 1: <?php echo $question['option1']; ?></p>
          <p class="card-text">Option 2: <?php echo $question['option2']; ?></p>
          <p class="card-text">Option 3: <?php echo $question['option3']; ?></p>
          <p class="card-text">Option 4: <?php echo $question['option4']; ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
</div>

</body>
</html>