<?php
require_once 'connect.php';

// Check if 'id' is set and not empty
if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
    // Sanitize the 'id'
    $id = mysqli_real_escape_string($conn, $_REQUEST['id']);

    // Prepare the delete statement using a prepared statement
    $stmt = $conn->prepare("DELETE FROM `returned` WHERE `id` = ?");
    $stmt->bind_param("i", $id); // 'i' indicates integer data type
    $stmt->execute();

    // Check if the deletion was successful
    if($stmt->affected_rows > 0) {
        // Redirect to the returned report page
        header('location: returned_report.php');
        exit; // Ensure script execution stops after redirection
    } else {
        echo "Error: Failed to delete the selected data.";
        // You can handle the error scenario appropriately, like redirecting back or displaying an error message.
    }

    // Close the statement
    $stmt->close();
} else {
    // Handle the case where 'id' is not set or empty
    echo "Error: No ID provided.";
    // You can handle this case appropriately, like redirecting back or displaying an error message.
}

// Close the database connection
$conn->close();
?>
