<?php
include '../dbcon.php';

$query="SELECT * FROM users";

$query_run = mysqli_query($con,$query);
$result_array=[];

if(mysqli_num_rows($query_run) >0)
{
    foreach($query_run as $row)
    {
        array_push($result_array, $row);
    }
    header('Content-type: application/json');
    echo json_encode($result_array);
}
else
{
    echo "<h4>No record Found</h4>";
}
?>