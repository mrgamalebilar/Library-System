<?php
// Include database connection
require_once 'connect.php';

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_faculty_visitor'])) {
    // Retrieve form data
    $faculty_id = $_GET['faculty_id'];
    $faculty_no = $_POST['faculty_no'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $type = $_POST['type'];

    // Prepare and execute SQL statement to update data in the database
    $stmt = $conn->prepare("UPDATE `faculty_visitor` SET `faculty_no`=?, `name`=?, `sex`=?, `type`=? WHERE `faculty_id`=?");
    $stmt->bind_param("ssssi", $faculty_no, $name, $sex, $type, $faculty_id);

    if ($stmt->execute()) {
        // Data updated successfully
        echo "Data updated successfully.";
		header("Location: faculty_visitor.php");
    } else {
        // Error updating data
        echo "Error updating data: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    // Redirect if form data is not received
    header("Location: faculty_visitor.php");
    exit();
}

// Close database connection
$conn->close();
?>
