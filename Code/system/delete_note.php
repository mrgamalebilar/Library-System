<?php
include "connect.php";

// Prepare a DELETE query to delete all rows from the note table
$sql = "DELETE FROM note";

// Execute the DELETE query
if ($conn->query($sql) === TRUE) {
    // Redirect back to the page where the delete button was clicked from
    header("Location: ".$_SERVER['HTTP_REFERER']);
    exit();
} else {
    // If there's an error, display an error message
    echo "Error deleting notes: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
