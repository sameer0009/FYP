<?php
session_start();

include('./dbcon.php');

if (isset($_GET['subject_id'])) {
  $subject_id = $_GET['subject_id'];

  // Fetch the subject from the database
  $sql = "SELECT * FROM tblsubjects WHERE id = $subject_id";
  $result = mysqli_query($con, $sql);
  $subject = mysqli_fetch_assoc($result);

  // Check if the subject exists before using it
  if ($subject) {
    // Fetch all questions for the selected subject
    $sql = "SELECT * FROM tsa_questions WHERE subject = '{$subject['subject']}'";
    $result = mysqli_query($con, $sql);
    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Shuffle the questions to randomize their order
    shuffle($questions);
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  font-size: 36px;
  font-weight: bold;
  text-align: center;
  margin-bottom: 30px;
}

.form-group {
  margin-bottom: 30px;
}

h4 {
  font-size: 24px;
  font-weight: bold;
  margin-bottom: 20px;
}

.form-check-label {
  font-size: 18px;
  font-weight: normal;
}

.btn {
  font-size: 18px;
  font-weight: bold;
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.2s ease-in-out;
}

.btn:hover {
  background-color: #0062cc;
}

    </style>
</head>
<body>
  <div class="container">
    <?php if (isset($subject)): ?>
    <h1><?php echo $subject['subject']; ?> TSA</h1>
    <form method="post" action="tsa_quiz_result.php">
      <?php foreach ($questions as $index => $question): ?>
        <div class="form-group">
          <h4><?php echo ($index + 1) . '. ' . $question['question']; ?></h4>
          <?php $options = array($question['option1'], $question['option2'], $question['option3'], $question['option4']); shuffle($options); ?>
          <?php foreach ($options as $option) : ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="question_<?php echo $question['id']; ?>" id="option_<?php echo $option; ?>" value="<?php echo $option; ?>" required>
              <label class="form-check-label" for="option_<?php echo $option; ?>"><?php echo $option; ?></label>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>

      <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>">
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php else: ?>
    <p>Invalid subject selected.</p>
    <?php endif; ?>
  </div>
</body>
</html>
