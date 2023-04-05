<?php
session_start();
$_SESSION['id'];
$_SESSION['user_name'];
?>
<?php

include('../dbcon.php');

// Connect to the database

// Get the tutor ID from the URL parameter
$tutor_id = $_SESSION['id'];

// Get the tutor's reviews
$sql = "SELECT rating,comment,student_name FROM tutor_reviews WHERE feedback_tutor_id=$tutor_id";
$result = mysqli_query($con, $sql);
$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the database connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tutor Reviews - <?php echo $_SESSION['user_name'] ?></title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<style>
		.container {
			margin-top: 50px;
		}
		h1 {
			text-align: center;
			margin-bottom: 30px;
		}
		p {
			font-size: 18px;
			line-height: 1.5;
		}
		hr {
			margin: 20px 0;
		}

	</style>
   <?php
   include('./t_head.php');
   ?>

</head>
<body>

   <!-- Navigation Bar -->
  <?php include('./t_header.php');?>
    <!-- End of Navigation Bar -->
	
	<div class="container">
		<input type="hidden" name="tutor_id" value="<?php echo $_SESSION['id'];?>">
		<h1>Reviews for <?php echo $_SESSION['user_name']; ?></h1>
		<?php 
		foreach ($reviews as $review): ?>
		  	<div class="card mb-3">
		  		<div class="card-body">
			  		<h5 class="card-title">Rating: <?php echo $review['rating']; ?>/5</h5>
					  <h5 class="card-title">Student Name: <?php echo $review['student_name']; ?></h5>
			  		<p class="card-text"><?php echo $review['comment']; ?></p>
		  		</div>
			</div>
			<hr>
		<?php endforeach; ?>
	</div>
	<!-- Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>