<?php
session_start();

// Check if the 'user_name' session variable is set
if (!isset($_SESSION['user_name'])) {
  header('Location: ../signin.php'); // Redirect to the login page if the user is not logged in
  exit();
}

include('../dbcon.php');

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

// Generate graph data
$graphData = array(
    array('Category', 'Count'),
    array('Total Courses', $total_courses)
);

// Convert graph data to JSON format
$graphJson = json_encode($graphData);

?>




<!DOCTYPE html>
<html lang="en">
  <head>
  <!-- Include the Google Charts library -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $graphJson; ?>);

        var options = {
            title: 'Total Courses',
            pieSliceText: 'value',
            is3D: true,
            legend: 'none',
            slices: {
                1: { offset: 0.2 }, // Explode the second slice (index 1)
            }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>

  </head>
  <body>
    <?php include('./t_head.php'); ?>
    <?php include('./t_header.php'); ?>

    <div class="container my-3">
    
       
       
        <h3>Analytics</h3>
        <div id="analytics">
        </div>
        <div id="piechart" style="width: 500px; height: 300px;"></div>
    

      

      <h3>Notifications</h3>
        <?php
      

    $user_id = 2; // Replace with actual tutor ID
    $sql = "SELECT * FROM notifications WHERE user_id = $user_id ORDER BY created_at DESC";
    $result = mysqli_query($con, $sql);
    ?>
    <div class="row">
      <div class="col-sm">
      <div class="card mt-3">
  <div class="card-body">
    <?php if(mysqli_num_rows($result) == 0): ?>
      <p class="card-text">No notifications to display.</p>
    <?php endif; ?>
    <?php if(mysqli_num_rows($result) > 0): ?>
      <table class="table">
        <thead>
          <tr>
            <th style='color:black; font-weight:bold;'>Message</th>
            <th style='color:black; font-weight:bold;'>Created At</th>
            <th style='color:black; font-weight:bold;'>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
              <td><?php echo $row['message']; ?></td>
              <td><?php echo date('M d, Y h:i A', strtotime($row['created_at'])); ?></td>
              <td><button class="btn btn-danger mark-as-read" data-id="<?php echo $row['id']; ?>">Mark as read</button></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</div>
      </div>
    </div>

   
<div class="container my-3">
<h3>Schedule</h3>
    <div class="row">
      <div class="col-sm">
      <?php include('calender.php');?>
      </div>
    </div>
    </div>

  
          



</div>


<script>
    $(document).on('click', '.mark-as-read', function() {
  var notificationId = $(this).data('id');
  $.ajax({
    url: 'mark_notification_as_read.php',
    type: 'POST',
    data: {id: notificationId},
    success: function(response) {
      if(response == 'success') {
        $(this).closest('tr').fadeOut();
      }
    }.bind(this)
  });
});

</script>

</body>
</html>
