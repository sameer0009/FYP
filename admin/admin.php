
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
    
    <link rel="stylesheet" href="../css/a_card_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-tL9xHxpEaxN0jgY0Y2QsZ6BShGX6d/UK76v1fIRmX9oVJm2wbii62wDZ3oRx/nl7hzjFISj1ojV7A1Ry9uV7iw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  </head>
<body>

<?php
include ('./a_header.php'); 
include ('../dbcon.php');

 
// Query to get total number of users
$sql = "SELECT COUNT(*) as total_users FROM users";
$result = $con->query($sql);

// Initialize variable to store total number of users
$total_users = 0;

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    $total_users = $row["total_users"];
  }
}

// Query to get total number of courses
$sql = "SELECT COUNT(*) as total_courses FROM course";
$result = $con->query($sql);

// Initialize variable to store total number of courses
$total_courses = 0;

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    $total_courses = $row["total_courses"];
  }
}

// Query to get total number of notifications
$sql = "SELECT COUNT(*) as total_notifications FROM notifications ";
$result = $con->query($sql);

// Initialize variable to store total number of notifications
$total_notifications = 0;

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    $total_notifications = $row["total_notifications"];
  }
}

// Query to get total subjects from tblsubjects
$sql = "SELECT COUNT(*) as total_subjects FROM tblsubjects";
$result = $con->query($sql);

// Initialize variable to store total number of subjects
$total_subjects = 0;

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    $total_subjects = $row["total_subjects"];
  }
}

// Query to get courses from tblsubjects
$sql = "SELECT * FROM tblsubjects";
$result = $con->query($sql);



//Close database connection
$con->close();
?>
<br>
<div class="container" >
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="d-sm-flex align-items-baseline report-summary-header">
                  <h2 class="font-weight-semibold">Report Summary</h2>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 report-inner-cards-wrapper">
                <div class="report-inner-card color-1">
                  <div class="inner-card-icon">
                    <i class="fas fa-rocket"></i>
                  </div>
                  <div class="inner-card-text text-white">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text"><?php echo $total_users; ?></p>
                  </div>
                </div>
              </div>

              <div class="col-md-4 report-inner-cards-wrapper">
                <div class="report-inner-card color-2">
                  <div class="inner-card-icon">
                    <i class="fas fa-graduation-cap"></i>
                  </div>
                  <div class="inner-card-text text-white">
                    <h5 class="card-title">Total Courses</h5>
                    <p class="card-text"><?php echo $total_courses; ?></p>
                  </div>
                </div>
              </div>
           
            <div class="col-md-4 report-inner-cards-wrapper">
                <div class="report-inner-card color-3">
                  <div class="inner-card-icon">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="inner-card-text text-white">
                    <h5 class="card-title">Notifications</h5>
                    <p class="card-text"><?php echo $total_notifications; ?></p>
                  </div>
                </div>
              </div>
              
              <div class="col-md-4 report-inner-cards-wrapper">
                <div class="report-inner-card color-4">
                  <div class="inner-card-icon">
                    <i class="fas fa-book"></i>
                  </div>
                  <div class="inner-card-text text-white">
                    <h5 class="card-title">TSA Subjects</h5>
                    <p class="card-text"><?php echo $total_subjects; ?></p>
                  </div>
                </div>
              </div>


            </div>
    
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<br>

<div class="container">
  <h1>User and Courses Graph</h1>
<?php
include ('../dbcon.php');

// Query to get total number of users
$sql = "SELECT COUNT(*) as total_users FROM users";
$result = $con->query($sql);

// Initialize variable to store total number of users
$total_users = 0;

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    $total_users = $row["total_users"];
  }
}

// Query to get total number of courses
$sql = "SELECT COUNT(*) as total_courses FROM course";
$result = $con->query($sql);

// Initialize variable to store total number of courses
$total_courses = 0;

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    $total_courses = $row["total_courses"];
  }
}

// Create data array for the chart
$data = array(
    array('Task', 'Hours per Day'),
    array('Total Users', (int) $total_users),
    array('Total Courses', (int) $total_courses)
);

// Convert the data to JSON format
$data_json = json_encode($data);

// Close the database connection
mysqli_close($con);
?>

<!-- Include the Google Charts library -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Draw the pie chart -->
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable(<?php echo $data_json; ?>);

    var options = {
        title: 'Total Users and Courses',
        pieHole: 0.3,
        colors: ['#4285F4', '#DB4437']
    };

    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
</script>

<!-- Display the chart -->
<div id="chart_div" style="width: 100%; height: 500px;"></div>
    </div>
  </div>

  </div>
  <br>
  <br>

