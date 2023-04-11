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
    <link rel="stylesheet" href="../css/a_list_style.css">
    </head>
<?php
include ('./a_header.php'); 
?>
     
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="class-header">
                    <h4 style="text-align:center;">Users Management</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" id="search" class="form-control" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select id="filter" class="form-control">
                                    <option value="">Select User Type</option>
                                    <option value="admin">Admin</option>
                                    <option value="Teacher">Teacher</option>
                                    <option value="Student">Student</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-stripe">
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
    $(document).ready(function() {
        getdata();

        // Search functionality
        $('#search').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('.usersdata tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        // Filter functionality
        $('#filter').on('change', function() {
            var value = $(this).val().toLowerCase();
            $('.usersdata tr').filter(function() {
                $(this).toggle($(this).find('td:nth-child(6)').text().toLowerCase().indexOf(value) > -1)
            });
        });
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