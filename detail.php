<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tutify - Online Education</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
 

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
   


    <!-- Navbar Start -->
    <?php include('index_header.php');?>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Course Detail</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Course Detail</p>
            </div>
            
        </div>
    </div>
    <!-- Header End -->


    <!-- Detail Start -->
    <?php 
include ('../fyp-main/dbcon.php');
$query = "SELECT course_image, course_id, course_name, course_description, course_duration, course_price, course_intsructor FROM course";
$query_run = mysqli_query($con, $query);
$course = mysqli_num_rows($query_run);

if ($course > 0) {
while ($row = mysqli_fetch_array($query_run)) {
}}
?>

    <!-- Detail Start -->
    <?php 
    include ('../fyp-main/dbcon.php');
    $query = "SELECT course_image, course_id, course_name, course_description, course_duration, course_price, course_intsructor FROM course";
    $query_run = mysqli_query($con, $query);
    $course = mysqli_num_rows($query_run);

    if ($course > 0) {
        while ($row = mysqli_fetch_array($query_run)) {
    ?>
        
        <!-- Detail Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-5">
                            <div class="section-title position-relative mb-5">
                                <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2"><?php echo $row['course_intsructor']; ?></h6>
                                <h1 class="display-4"><?php echo $row['course_name']; ?></h1>
                            </div>
                            <img class="img-fluid rounded w-100 mb-4" src="uploads/<?php echo $row['course_image']; ?>" alt="<?php echo $row['course_name']; ?> Image">
                            <p><?php echo $row['course_description']; ?></p>
                        </div>
                    </div>
    
                    <div class="col-lg-12 mt-6 mt-lg-0">
                        <div class="bg-primary mb-5 py-3">
                            <h3 class="text-white py-3 px-4 m-0">Course Features</h3>
                            <div class="d-flex justify-content-between border-bottom px-4">
                                <h6 class="text-white my-3">Instructor</h6>
                                <h6 class="text-white my-3"><?php echo $row['course_intsructor']; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between border-bottom px-4">
                                <h6 class="text-white my-3">Rating</h6>
                                <h6 class="text-white my-3">4.5 <small>(250)</small></h6>
                            </div>
                            <div class="d-flex justify-content-between border-bottom px-4">
                                <h6 class="text-white my-3">Lectures</h6>
                                <h6 class="text-white my-3">15</h6>
                            </div>
                            <div class="d-flex justify-content-between border-bottom px-4">
                                <h6 class="text-white my-3">Duration</h6>
                                <h6 class="text-white my-3"><?php echo $row['course_duration']; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between border-bottom px-4">
                                <h6 class="text-white my-3">Skill level</h6>
                                <h6 class="text-white my-3">All Level</h6>
                            </div>
                            <div class="d-flex justify-content-between px-4">
                                <h6 class="text-white my-3">Language</h6>
                                <h6 class="text-white my-3">English</h6>
                            </div>
                            <h5 class="text-white py-3 px-4 m-0">Course Price: <?php echo $row['course_price']; ?> PKR</h5>
                            <div class="py-3 px-4">
                            <form action="<?php echo isset($_SESSION['user_name']) ? 'payment.php' : '../fyp-main/signin.php'; ?>" method="post">
                            <input type="hidden" name="course_id" value="<?php echo $row['course_id']; ?>">
                            <button type="submit" class="btn btn-block btn-secondary py-3 px-5" name="enroll_now">
                                <?php echo isset($_SESSION['user_name']) ? 'Enroll Now' : 'Sign In to Enroll'; ?>
                            </button>
                            </form>

                            </div>
                        </div>
                    </div>
                    </div>
        <?php
        }
    } else {
        echo "No courses found.";
    }
    mysqli_close($con);
    ?>
</section>
    
    
    <!-- Detail End -->


<!-- Footer Start -->
<?php
    include('./footer.php');
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

