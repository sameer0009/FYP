<?php


// Connect to the database and add a new subject if the form has been submitted
include('./dbcon.php');



// Fetch all subjects from the database
$sql = "SELECT * FROM tblsubjects";
$result = mysqli_query($con, $sql);
$subjects = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<style>
    /* Global styles */
body {
  font-family: Arial, sans-serif;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.form-control {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.btn {
  display: inline-block;
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  padding: 12px 24px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-primary {
  background-color: #007bff;
  color: #fff;
}

.btn-primary:hover {
  background-color: #0069d9;
}

.btn-secondary {
  background-color: #6c757d;
  color: #fff;
}

.btn-secondary:hover {
  background-color: #5a6268;
}

.card {
  border: 1px solid #ccc;
  border-radius: 4px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-body {
  padding: 20px;
}

.card-title {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.card-text {
  font-size: 16px;
  margin-bottom: 20px;
}

.row {
  margin: 0 -10px;
}

.col-md-4 {
  padding: 0 10px;
  margin-bottom: 20px;
}

/* Media queries */
@media (max-width: 767px) {
  h1 {
    font-size: 24px;
  }

  .card-title {
    font-size: 20px;
  }

  .card-text {
    font-size: 14px;
  }
}

</style>

</head>
<body>
  <div class="container">
    <h1>Select a Subject to take Assessment:</h1>

    <!-- Display all subjects as cards -->
    <div class="row">
      <?php foreach ($subjects as $subject): ?>
        <div class="col-md-4 mt-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo $subject['subject']; ?></h5>
              <a href="Tsa_as.php?subject_id=<?php echo $subject['id']; ?>" class="btn btn-primary">take Quiz</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
