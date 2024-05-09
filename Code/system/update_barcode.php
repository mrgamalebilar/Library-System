<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    include "connect.php";
    
    // Get the updated data
    $barcode_id = $_POST["barcode_id"];
    $new_type = $_POST["new_type"];
    $new_barcode_id = $_POST["new_barcode_id"]; // New variable to hold updated barcode ID
    
    // Update the data in the visitant database
    $sql = "UPDATE visitant SET barcode_id='$new_barcode_id', type='$new_type' WHERE barcode_id='$barcode_id'";
    
    if ($conn->query($sql) === TRUE) {
        // Data updated successfully, redirect back to the add_barcode.php page
        header("Location: add_barcode.php");
        exit();
    } else {
        // If there's an error, display an error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    // Close the database connection
    $conn->close();
} else {
    // If the form is not submitted, redirect back to the add_barcode.php page
    header("Location: add_barcode.php");
    exit();
}
?>
