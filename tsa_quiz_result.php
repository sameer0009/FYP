<!DOCTYPE html>
<html>
<head>
  <link href="./css/tsa_result.css" rel="stylesheet">
</head>

</html>

<?php
session_start();
include('./dbcon.php');

if (isset($_POST['subject_id'])) {
  $subject_id = $_POST['subject_id'];

  // Fetch the subject name from the database
  $sql_subject = "SELECT subject FROM tblsubjects WHERE ID = '$subject_id'";
  $result_subject = mysqli_query($con, $sql_subject);
  $row_subject = mysqli_fetch_assoc($result_subject);
  $subject_name = $row_subject['subject'];

  // Fetch all questions for the selected subject
  $sql = "SELECT * FROM tsa_questions WHERE subject = '$subject_name'";
  $result = mysqli_query($con, $sql);
  $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

  $total_questions = count($questions);
  $correct_answers = 0;

  // Check each answer submitted by the user
  foreach ($questions as $question) {
    $answer_key = 'question_' . $question['id'];
    $user_answer = $_POST[$answer_key];
    $correct_answer = $question['correct_answer'];

    if ($user_answer == $correct_answer) {
      $correct_answers++;
    }
  }

  $score = $correct_answers / $total_questions * 100;

  // Save the score to the database
  $sql = "INSERT INTO tsa_quiz_results (subject_id, subject_name, score) VALUES ('$subject_id', '$subject_name', '$score')";
  mysqli_query($con, $sql);

  // Print the quiz result in tabular form
  echo '<h2>Quiz Result - '.$subject_name.'</h2>';
  echo '<table>';
  echo '<tr><th>Total Questions</th><th>Correct Answers</th><th>Score</th></tr>';
  echo '<tr><td>'.$total_questions.'</td><td>'.$correct_answers.'</td><td>'.$score.'%</td></tr>';
  echo '</table>';
}
?>
