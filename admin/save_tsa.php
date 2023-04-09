<?php
// Get the question and options from the form
$subject = $_POST['subject'];
$marks = $_POST['marks'];
$question = $_POST['question'];
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$correct_answer = $_POST['correct_answer'];

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'tutify');

// Insert the question and options into the database
$sql = "INSERT INTO tsa_questions (subject, marks, question, option1, option2, option3, option4, correct_answer) 
        VALUES ('$subject', '$marks', '$question', '$option1', '$option2', '$option3', '$option4', '$correct_answer')";

if (mysqli_query($conn, $sql)) {
    $message = "Question added successfully.";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = 'tsa_question.php';</script>";
} else {
    $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "<script type='text/javascript'>alert('$error');</script>";
}

// Close the database connection
mysqli_close($conn);
?>
