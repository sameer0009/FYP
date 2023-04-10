<head>
    <style>
        /* Style the container element */
.container {
  width: 80%;
  margin: 0 auto;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
}

/* Style the heading elements */
h1, h2, h3 {
  margin-top: 0;
  text-align: center;
}

h1 {
  font-size: 36px;
}

h2 {
  font-size: 24px;
  margin-bottom: 20px;
}

h3 {
  font-size: 18px;
  margin-top: 20px;
}

/* Style the button element */
.btn {
  display: inline-block;
  padding: 10px 20px;
  margin-top: 20px;
  border: none;
  border-radius: 5px;
  background-color: #007bff;
  color: #fff;
  font-size: 16px;
  text-decoration: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn:hover {
  background-color: #0069d9;
}

/* Style the radio button inputs */
input[type=radio] {
  margin-right: 10px;
}

/* Style the form element */
form {
  margin-top: 20px;
}

    </style>
</head>
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
  $sql = "INSERT INTO tsa_quiz_results (subject_id, score) VALUES ('$subject_id', '$score')";
  mysqli_query($con, $sql);

  // Output the quiz result
  echo "<div class='container'>";
  echo "<h1>Your Result for {$subject_name} Quiz</h1>";
  echo "<h2>Your Score: {$score}%</h2>";
  echo "<h2>Correct Answers: {$correct_answers}/{$total_questions}</h2>";
  echo "</div>";

  if ($score >= 80) {
    echo "<div class='container'>";
    echo "<h3>Congratulations! You have cleared the quiz with {$score}% marks.</h3>";
    echo "<a href='schedule_interview.php' class='btn btn-primary'>Schedule an Interview</a>";
    echo "</div>";
  } else {
    echo "<div class='container'>";
    echo "<h3>Sorry, you have not cleared the quiz with {$score}% marks. Please try again.</h3>";
    echo "</div>";
  }
  

  // Unset the session variables
  unset($_SESSION['subject_id']);
}



?>
