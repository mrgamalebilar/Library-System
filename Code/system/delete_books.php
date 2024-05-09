<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['book_id'])) {
    // Sanitize input
    $book_id = mysqli_real_escape_string($conn, $_POST['book_id']);

    // Prepare and bind the DELETE statement
    $deleteQuery = $conn->prepare("DELETE FROM `books_report` WHERE `book_id` = ?");
    $deleteQuery->bind_param("i", $book_id);

    // Execute the statement
    if ($deleteQuery->execute()) {
        // Redirect to penalty.php after successful deletion
        header('Location: books_report.php');
        exit;
    } else {
        // Handle errors
        echo "Error deleting record: " . $deleteQuery->error;
    }

    // Close the statement
    $deleteQuery->close();
} else {
    echo "Invalid request.";
}
?>
