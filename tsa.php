<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'tutify');

// Get all the questions from the database
$sql = "SELECT * FROM tsa_questions";
$result = mysqli_query($conn, $sql);

// Store the questions in an array
$questions = array();
while ($row = mysqli_fetch_assoc($result)) {
    $questions[] = $row;
}

// Shuffle the questions
shuffle($questions);

// Initialize the score
$score = 0;

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepare the SQL statement
    $sql = "SELECT correct_answer FROM tsa_questions WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $question_id);

    // Loop through all the questions
    foreach ($questions as $question) {
        // Get the submitted answer for this question
        $answer = $_POST['answer_' . $question['id']];

        // Execute the prepared statement to get the correct answer for this question
        $question_id = $question['id'];
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $correct_answer);
        mysqli_stmt_fetch($stmt);

       // Check if the submitted answer is correct
if ($answer == $correct_answer) {
    $score++;
    if ($score > 0) {
        
        header("Location:index.php");


        exit();
    
    }
    else
    {
        
        header ("Location:signup.php");

    }

}
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Print the score
    echo '<h2>Your score is: ' . $score . '/' . count($questions) . '</h2>';
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Selection Assessments</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1>Quiz</h1>

        <form method="post">
            <?php foreach ($questions as $question) : ?>
                <div class="card my-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $question['question']; ?></h5>
                        <?php $options = array($question['option1'], $question['option2'], $question['option3'], $question['option4']); shuffle($options); ?>
                        <?php foreach ($options as $option) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer_<?php echo $question['id']; ?>" value="<?php echo $option; ?>" required>
                                <label class="form-check-label"><?php echo $option; ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
