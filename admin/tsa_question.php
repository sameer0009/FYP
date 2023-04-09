<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../join.php'); // redirect to the login page if the student is not logged in
  exit();
}
?>
<!DOCTYPE html>
<html>
<?php
include ('./a_header.php'); 
?>
     
<br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Selection Assessments</title>
    <link rel="stylesheet" href="style.css">
    <link href="../css/a_tsa_style.css" rel="stylesheet">
</head>
<body>

    <div class="quiz-container">
    <h2 style="text-align:center; font-size: 36px; color: #333333;">Tutor Selection Assessment</h2>
        <form method="post" action="save_tsa.php">
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" redirect>
            <label for="question">Question ID:</label>
            <input type="number" id="ID" name="ID" required>
            <label for="marks">Marks:</label>
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
            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
        </form>
    </div>
</body>
</html>
