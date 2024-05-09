<?php include 'top_bar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Barcode</title>
    <link rel="stylesheet" href="css/add_barcode.css">
</head>
<body>

    <div class="container">
        <h2>Add Barcode</h2>
        <form method="post" action="add_barcode_action.php">
            <input type="text" name="barcode" placeholder="Barcode" required>
            <label for="type">Type:</label>
            <select name="type" id="type" required>
                <option value="">Select Type</option>
                <option value="Faculty">Faculty</option>
                <option value="Visitor">Visitor</option>
                <option value="Guest">Guest</option>
                <option value="Student from other school">Student from other school</option>
            </select>
            <br><br>
            <input type="submit" name="addBarcode" value="Add Barcode">
            <a href="faculty_visitor.php" class="btn btn-back red-btn">Back</a>
        </form>

        <h3>Barcode List</h3>
        <table>
            <tr>
                <th>Barcode ID</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            <!-- Fetch data from visitant database and display each row in the table -->
            <?php
            include "connect.php";

            $sql = "SELECT * FROM visitant";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>".$row["barcode_id"]."</td>";
                    echo "<td>".$row["type"]."</td>";
                    echo "<td>
                         <a href='load_barcode.php?barcode_id=".$row['barcode_id']."' class='update-link'>Update</a> | 
                         <a href='delete_barcode.php?barcode_id=".$row['barcode_id']."' class='delete-link' style='color: red;'>Delete</a>
                         </td>";

                    echo "</tr>";
                }
            } else {
                echo "<span style='color: red;'>No Barcode Added!</span>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
