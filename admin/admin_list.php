<?php
session_start();
if (!isset($_SESSION['user_name'])) {
   header("Location: ../join.php");
   exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Users Managment Panel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <!-- Favicon -->
   <link href="img/favicon.ico" rel="icon">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo ucwords($_SESSION['user_name']); ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="admin.php">Home</a>
          </li>
        <li class="nav-item">
          <a class="nav-link" href="#notifications">Transactions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#tutor-list">Update Record</a>
        </li>
      </ul>
    </div>
    <a href="../logout.php" title="Logout" class="btn btn-danger py-4 px-3 d-none d-lg-block">Log out</a>
  </nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="class-header">
                    <h4 style="text-align:center;">Users Managment</h4>
                </div>
                <div class="card-body">
                    <table  class="table table-bordered table-stripe">
                        <thead>
                            <tr style="color:black;">
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>User Type</th>
                                <th>Create Date</th>
                            </tr>
                        </thead>
                        <tbody id="load-users" class="usersdata">
                               
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <script>
      $(document).ready(function () {
        getdata();
      });

      function getdata(){
        $.ajax({
          type: "GET",
          url: "fetch.php",
          success: function (response) {
           // console.log(response);
            $.each(response, function (key, value) { 
           // console.log(value['fname']);
           $('.usersdata').append( '<tr>'+
                                    '<td>'+value['id']+'</td>\
                                    <td>'+value['fname']+'</td>\
                                    <td>'+value['lname']+'</td>\
                                    <td>'+value['email']+'</td>\
                                    <td>'+value['phone']+'</td>\
                                    <td>'+value['user_type']+'</td>\
                                    <td>'+value['create_date']+'</td>\
                               </tr>');

            });
          }
        });
      }
    </script>
     
</body>
</html>