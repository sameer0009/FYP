<?php


   
// Initialize the session
//session_start();

// Check if the user is logged in, if not then redirect to login page
//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  //  header("location: login.php");
  //  exit;
//}

// connect to database (replace with your own database credentials)
include('../dbcon.php');

// check if connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


// Query to retrieve scheduled classes
$sql = "SELECT id, class_time, class_date, class_duration FROM class_schedule ORDER BY class_date, class_time";
$result = mysqli_query($con, $sql);


// Display the scheduled classes in a table
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Class Schedule</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 80%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Class Schedule</h1>
    </div>
    <div class="wrapper">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Duration (min)</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($result)): ?>
                <tr>
                    <td><?php echo $row['class_time']; ?></td>
                    <td><?php echo $row['class_date']; ?></td>
                    <td><?php echo $row['class_duration']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <p>
            <a href="session.php" class="btn btn-primary">Schedule a Class</a>
           
        </p>
    </div>
</body>
</html>
