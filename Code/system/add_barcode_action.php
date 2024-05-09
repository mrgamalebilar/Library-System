<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "connect.php";
    
    $barcode = $_POST["barcode"];
    $type = $_POST["type"];
    
    // Use NOW() to automatically set the DATE_ADDED field to the current timestamp
    $sql = "INSERT INTO visitant (barcode_id, type, date_added) VALUES ('$barcode', '$type', NOW())";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect to add_barcode.php after successful insertion
        header("Location: add_barcode.php");
        exit();
    } else {
        // Display error message if insertion fails
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close(); // Close database connection
} else {
    // Redirect to add_barcode.php if POST request method is not used
    header("Location: add_barcode.php");
    exit();
}
?>
