<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#"><?php echo ucwords($_SESSION["user_name"]);?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./tutor_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tutor_profile.php">Profile Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./reviews.php">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#payments">Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./session.php">Create Session</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addcourse.php">Add Course</a>
                </li>
            </ul>
           
                </div>
                
        <a href="../logout.php" title="Logout" class="btn btn-danger py-2 px-2 d-none d-lg-block">Log out</a>
    </nav>