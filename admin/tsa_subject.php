<?php
session_start();
if (!isset($_SESSION['user_name'])) {
header('Location: ../join.php'); // redirect to the login page if the student is not logged in
exit();
}

// Connect to the database and add a new subject if the form has been submitted
include('../dbcon.php');

if (isset($_POST['add_subject'])) {
  $subject_name = $_POST['subject_name'];
  $sql = "INSERT INTO tblsubjects (subject) VALUES ('$subject_name')";
  $result = mysqli_query($con, $sql);
}

// Fetch all subjects from the database
$sql = "SELECT * FROM tblsubjects";
$result = mysqli_query($con, $sql);
$subjects = mysqli_fetch_all($result, MYSQLI_ASSOC);


// delete button 
if (isset($_POST['delete_subject'])) {
  $subject_id = $_POST['subject_id'];
  $sql = "DELETE FROM tblsubjects WHERE id = '$subject_id'";
  $result = mysqli_query($con, $sql);
  if ($result) {
    header('Location: tsa_subject.php');
    exit();
  }
}


?>


<!DOCTYPE html>
<html>
<?php include ('./a_header.php'); ?>
<head>
<link href="../css/tsa_styles.css" rel="stylesheet">

</head>
<body>
  <div class="container">
    <h1>ADD a Subject to Take Test</h1>

    <!-- Form to add a new subject -->
    <form method="post" action="">
      <div class="form-group">
        <label for="subject_name">Add New Subject:</label>
        <input type="text" name="subject_name" id="subject_name" class="form-control" required>
      </div>
      <button type="submit" name="add_subject" class="btn btn-primary">Add Subject</button>
    </form>
    <div continer>
    <!-- Display all subjects as cards -->
    <div class="row">
      <?php foreach ($subjects as $subject): ?>
        <div class="col-md-4 mt-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $subject['subject']; ?></h5>
              <a href="tsa_question.php?subject_id=<?php echo $subject['id']; ?>" class="btn btn-primary">Add question</a>
              <br><br>
              <a href="tsa_question_list.php?subject_id=<?php echo $subject['id']; ?>" class="btn btn-secondary">Show added questions</a>
              <br><br>
              <form method="post" action="">
          <input type="hidden" name="subject_id" value="<?php echo $subject['id']; ?>">
          <button type="submit" name="delete_subject" class="btn btn-danger">Delete</button>
        </form>            
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  </div>
</body>
</html>
