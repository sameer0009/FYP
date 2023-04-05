<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../join.php'); // redirect to the login page if the student is not logged in
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Panel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <!-- Favicon -->
   <link href="img/favicon.ico" rel="icon">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="css/style.css" rel="stylesheet">
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo $_SESSION['user_name']; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#home">Home</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_list.php">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#notifications">Transactions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tutor-list">Update Record</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./tsa_question.php">TSA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="notification.php">Notification</a>
        </li>
      </ul>
    </div>
  </nav>
  <br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Selection Assessments</title>
    <link rel="stylesheet" href="style.css">
    <style>

.quiz-container {
    width: 50%;
    margin: auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 5px #ccc;
    text-align: center;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
select {
    padding: 5px;
    margin-bottom: 10px;
    width: 100%;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    padding: 10px;
    margin-top: 10px;
    border-radius: 5px;
    border: none;
    background-color: #007bff;
    color: #fff;
}

        </style>
</head>
<body>

    <div class="quiz-container">
        <h2>TSA</h2>
        <form method="post" action="save_tsa.php">
            <label for="subject">Subject:</label>
            <select id="subject" name="subject" required>
                <option value="">--Select Subject--</option>
                <option value="Math">Math</option>
                <option value="Science">Science</option>
                <option value="History">History</option>
                <option value="English">English</option>
            </select>
            <label for="question">Question ID:</label>
            <input type="number" id="ID" name="ID" required>
            <label for="marks" > Marks: </label>
            <input type="number" id="marks" name="marks" required>
            <label for="question">Question:</label>
            <input type="text" id="question" name="question" required>
            <label for="option1">Option 1:</label>
            <input type="text" id="option1" name="option1" required>
            <label for="option2">Option 2:</label>
            <input type="text" id="option2" name="option2" required>
            <label for="option3">Option 3:</label>
            <input type="text" id="option3" name="option3" required>
            <label for="option4">Option 4:</label>
            <input type="text" id="option4" name="option4" required>
            <label for="correct_answer">Correct Answer:</label>
            <input type="text" id="correct_answer" name="correct_answer" required>
            <input type="hidden" name="subject_name" value="">
            <br>
            <button type="submit" class="btn btn-primary">Save Question</button>
        </form>
    </div>
</body>
</html>
