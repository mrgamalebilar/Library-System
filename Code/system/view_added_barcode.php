<?php
include 'top_bar.php';
require_once 'connect.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/view_added_barcodes.css">
    <title>Added Barcode Panel</title>
</head>
<body>

<h2>ADDED BARCODE-PANEL MANAGEMENT</h2>
<div class="form-group">
    <a href="faculty.php" class="btn btn-back">Back to Faculty</a>
</div>
<?php

include "connect.php";


function displayUsers($conn) {
    
    $sql = "SELECT barcode_id, visitant FROM visitant";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Barcode ID</th>
                    <th>Visitant</th>
                    <th>Action</th>
                </tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["barcode_id"]."</td>
                    <td>".$row["visitant"]."</td>
                    <td>
                        <a href='delete_barcode.php?barcode_id=".$row['barcode_id']."' class='btn btn-delete'>Delete</a>
                        <a href='load_barcode.php?barcode_id=".$row['barcode_id']."' class='btn btn-update'>Update</a>
                    </td>
                  </tr>";
        }
        
        echo "</table>";
    } else {
        echo "0 results";
    }
}


displayUsers($conn);


$conn->close();
?>
</body>
</html>
