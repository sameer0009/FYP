<?php
session_start();
if (!isset($_SESSION['user_name'])) {
   header("Location: ../join.php");
   exit();
}
?>
<!DOCTYPE html>
<html>
<?php
include ('./a_header.php'); 
?>
     

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