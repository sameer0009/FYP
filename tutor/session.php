<?php
session_start();
if (!isset($_SESSION['user_name'])) {
  header('Location: ../signin.php'); // redirect to the login page if the student is not logged in
exit();
}

include('./t_head.php');
include('./t_header.php');



// connect to database (replace with your own database credentials)
include('../dbcon.php');

// check if connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
 
// Define variables and initialize with empty values
$class_time = $class_date = $class_duration = "";
$class_time_err = $class_date_err = $class_duration_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate class time
    if(empty(trim($_POST["class_time"]))){
        $class_time_err = "Please enter the class time.";
    } else{
        $class_time = trim($_POST["class_time"]);
    }
    
    // Validate class date
    if(empty(trim($_POST["class_date"]))){
        $class_date_err = "Please enter the class date.";
    } else{
        $class_date = trim($_POST["class_date"]);
    }
    
    // Validate class duration
    if(empty(trim($_POST["class_duration"]))){
        $class_duration_err = "Please enter the class duration.";
    } else{
        $class_duration = trim($_POST["class_duration"]);
    }
    
    // Check input errors before inserting in database
    if(empty($class_time_err) && empty($class_date_err) && empty($class_duration_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO class_schedule (class_time, class_date, class_duration) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_class_time, $param_class_date, $param_class_duration);
            
            // Set parameters
            $param_class_time = $class_time;
            $param_class_date = $class_date;
            $param_class_duration = $class_duration;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to timetable page
                header("location: timetable.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($con);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tutor Panel - Schedule Class Time</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{ width: 500px; margin: 0 auto; }
    

    </style>
</head>
<body>
<div class="wrapper">
        <h2>Create Class Session </h2>
        <div class="form-group" style="text-align: right;">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Create Class</button>
                <button type="button" class="btn btn-primary"><i class="fa fa-video"></i> Create 1-1 Session</button>
            </form>
        </div>
    <div class="wrapper">
        <h2>Schedule Class Time</h2>
        <p>Please fill in the details below to schedule a class time.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($class_time_err)) ? 'has-error' : ''; ?>">
                <label>Class Time</label>
                <input type="time" name="class_time" class="form-control" value="<?php echo $class_time;?>" min="09:00" max="18:00">
<span class="help-block"><?php echo $class_time_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($class_date_err)) ? 'has-error' : ''; ?>">
<label>Class Date</label>
<input type="date" name="class_date" class="form-control" value="<?php echo $class_date; ?>">
<span class="help-block"><?php echo $class_date_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($class_duration_err)) ? 'has-error' : ''; ?>">
<label>Class Duration (in minutes)</label>
<input type="number" name="class_duration" class="form-control" value="<?php echo $class_duration; ?>">
<span class="help-block"><?php echo $class_duration_err; ?></span>
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="Submit">
<a href="timetable.php" class="btn btn-default">Cancel</a>
</div>
</form>
</div>

</div>
</body>
</html> 
