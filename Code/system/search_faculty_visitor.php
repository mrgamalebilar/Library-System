<?php
// Include your database connection file (connect.php)
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = isset($_POST['search']) ? $_POST['search'] : '';

    // Constructing the SQL query to search for the entered text in multiple columns
    $sql = "SELECT * FROM faculty_visitor WHERE 
            faculty_no LIKE '%$search%' OR 
            name LIKE '%$search%' OR 
            sex LIKE '%$search%' OR 
            type LIKE '%$search%'";

    $result = $conn->query($sql);

    if (!empty($search) && $result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Faculty-Visitor Id</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["faculty_no"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["sex"]."</td>
                    <td>".$row["type"]."</td>
                    <td>
                    <a href='delete_faculty_visitor.php?faculty_id=".$row['faculty_id']."'>Delete</a> | 
                    <a href='load_faculty_visitor.php?faculty_id=".$row['faculty_id']."' style='color: blue;'>Update</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } elseif (empty($search)) {
        // If search is empty, don't display the table
        echo "";
    } else {
        echo "<span style='color: red;'>0 results</span>";
        
    }
}

// Close the database connection
$conn->close();
?>
