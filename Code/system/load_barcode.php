<!DOCTYPE html>
<?php include "top_bar.php" ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barcode</title>
    <link rel="stylesheet" href="css/load_only_barcode.css"> <!-- Adjust the CSS file path accordingly -->
</head>
<body>
    <div class="container">
        <h2>Edit Barcode</h2>
        <?php
        // Include the database connection file
        include "connect.php";

        // Check if barcode ID is provided in the URL
        if(isset($_GET['barcode_id'])) {
            // Get the barcode ID from the URL
            $barcode_id = $_GET['barcode_id'];

            // Retrieve the data associated with the given barcode ID from the visitant table
            $sql = "SELECT * FROM visitant WHERE barcode_id = '$barcode_id'";
            $result = $conn->query($sql);

            // Check if data is found
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // Display a form to edit the barcode ID and type
                echo "<form method='post' action='update_barcode.php'>";
                echo "<input type='hidden' name='barcode_id' value='".$row['barcode_id']."'>";
                echo "<label for='new_barcode_id'>New Barcode ID:</label>";
                echo "<input type='text' name='new_barcode_id' id='new_barcode_id' value='".$row['barcode_id']."' required>";
                echo "<br><br>";
                echo "<label for='new_type'>Type:</label>";
                echo "<select name='new_type' id='new_type' required>";
                echo "<option value='Faculty' ".($row['type']=='faculty' ? 'selected' : '').">Faculty</option>";
                echo "<option value='Visitor' ".($row['type']=='visitor' ? 'selected' : '').">Visitor</option>";
                echo "<option value='Guest' ".($row['type']=='guest' ? 'selected' : '').">Guest</option>";
                echo "<option value='Student from other school' ".($row['type']=='student from other school' ? 'selected' : '').">Student from other school</option>";
                echo "</select>";
                echo "<br><br>";
                echo "<input type='submit' name='saveChanges' value='Save'>";
                
                echo "<a href='add_barcode.php' class='btn btn-back'>Cancel</a>";


                echo "</form>";
            } else {
                // If no data is found for the given barcode ID
                echo "No data found for the selected barcode ID.";
            }
        } else {
            // If barcode ID is not provided in the URL
            echo "Barcode ID not provided.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
