<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../signin.php'); // redirect to the login page if the student is not logged in
exit();
}
?>
<!DOCTYPE html>
<html>
<?php 
include('./header.php');
?>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#assignments">Assignments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#quizzes">Quizzes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#grades">Grades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#progress">Progress</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="assignments" class="tab-pane active">
                <h3 class="my-3">Assignment Submissions</h3>
                <form action="submit_assignment.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="assignment_name">Assignment Name</label>
                        <input type="text" class="form-control" id="assignment_name" name="assignment_name" required>
                    </div>
                    <div class="form-group">
                        <label for="assignment_file">Upload Assignment</label>
                        <input type="file" class="form-control-file" id="assignment_file" name="assignment_file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div id="quizzes" class="tab-pane">
                <h3 class="my-3">Online Quizzes</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Quiz Name</th>
                            <th>Score</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = mysqli_connect("host", "username", "password", "database");
                        $sql = "SELECT quiz_name, quiz_score, quiz_date FROM quizzes WHERE student_id = 1";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['quiz_name'] . "</td>";
                            echo "<td>" . $row['quiz_score'] . "</td>";
                            echo "<td>" . $row['quiz_date'] . "</td>";
                            echo "</tr>";
                            }
                            ?>
                            </tbody>
                            </table>
                            </div>
                            <div id="grades" class="tab-pane">
                            <h3 class="my-3">Grades</h3>
                            <table class="table table-bordered">
                            <thead>
                            <tr>
                            <th>Assignment Name</th>
                            <th>Grade</th>
                            <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                                 $conn = mysqli_connect("host", "username", "password", "database");
                                                 $sql = "SELECT assignment_name, grade, submission_date FROM assignments WHERE student_id = 1";
                                                 $result = mysqli_query($conn, $sql);
                                                 while ($row = mysqli_fetch_assoc($result)) {
                                                     echo "<tr>";
                                                     echo "<td>" . $row['assignment_name'] . "</td>";
                                                     echo "<td>" . $row['grade'] . "</td>";
                                                     echo "<td>" . $row['submission_date'] . "</td>";
                                                     echo "</tr>";
                                                 }
                                                 ?>
                            </tbody>
                            </table>
                            </div>
                            <div id="progress" class="tab-pane">
                            <h3 class="my-3">Progress</h3>
                            <table class="table table-bordered">
                            <thead>
                            <tr>
                            <th>Subject</th>
                            <th>Progress</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                                 $conn = mysqli_connect("host", "username", "password", "database");
                                                 $sql = "SELECT subject_name, progress FROM progress WHERE student_id = 1";
                                                 $result = mysqli_query($conn, $sql);
                                                 while ($row = mysqli_fetch_assoc($result)) {
                                                     echo "<tr>";
                                                     echo "<td>" . $row['subject_name'] . "</td>";
                                                     echo "<td>" . $row['progress'] . "</td>";
                                                     echo "</tr>";
                                                 }
                                                 ?>
                            </tbody>
                            </table>
                            </div>
                            </div>
                            </div>
                            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 </body>
 </html>
