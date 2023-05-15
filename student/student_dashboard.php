<?php
session_start();

// Check if the 'user_name' session variable is set
if (!isset($_SESSION['user_name'])) {
  header('Location: ../signin.php'); // Redirect to the login page if the user is not logged in
  exit();
}
?>
<!DOCTYPE html>
<html>
<?php
include ('./header.php');
include ('../dbcon.php');
$user_name = $_SESSION['user_name'];

$sql = "SELECT users.fname, users.lname, users.phone, users.email, 
        profile_s.address, profile_s.postal_code, profile_s.area, profile_s.country, profile_s.state, 
        profile_s.picture 
        FROM users
        JOIN profile_s ON users.id = profile_s.id
        WHERE users.fname = '$user_name'";
$result = mysqli_query($con, $sql);
?>

  <div id="notifications-panel"></div>

  <div class="container my-3">
  <div class="row">
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div class="col-md-7">
        <div class="card">
          <img class="card-img-top" style="width:100px"src="../uploads/<?php echo $row['picture']; ?>" alt="Profile Picture ">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['fname'] . ' ' . $row['lname']; ?></h5>
            <p class="card-text">Email: <?php echo $row['email']; ?></p>
            <p class="card-text">Phone: <?php echo $row['phone']; ?></p>
            <p class="card-text">Address: <?php echo $row['address']; ?></p>
        
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>
</body>
