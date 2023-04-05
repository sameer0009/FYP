<?php

include ('../dbcon.php');


// Check if the notification ID is provided in the request
if(isset($_POST['id'])){
    // Get notification ID
    $id = $_POST['id'];

    // Update notification in the database
    $sql = "UPDATE notifications SET is_read = 1 WHERE id = $id";
    $result = mysqli_query($con, $sql);
    if($result){
        // Notification updated successfully
        echo "success";
    }else{
        // Error while updating notification
        echo "error";
    }
}
?>