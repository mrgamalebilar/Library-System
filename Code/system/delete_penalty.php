<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Sanitize input
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Delete record from penalty table
    $deleteQuery = "DELETE FROM `penalty` WHERE `id` = '$id'";
    if ($conn->query($deleteQuery) === TRUE) {
        header('Location: penalty.php');
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
