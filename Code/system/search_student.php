<?php
// Include your database connection file (connect.php)
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = isset($_POST['search']) ? $_POST['search'] : '';

    // Constructing the SQL query to search for the entered text in multiple columns
    $sql = "SELECT * FROM student WHERE 
            student_no LIKE '%$search%' OR 
            name LIKE '%$search%' OR 
             department LIKE '%$search%'";

    $result = $conn->query($sql);

    if (!empty($search) && $result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Barcode Id</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Course/Section-Year</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["student_no"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["sex"]."</td>
                    <td>".$row["course_section"]."</td>
                    <td>".$row["department"]."</td>
                    <td>
                        <a href='delete_student.php?student_id=".$row['student_id']."'>Delete</a> | 
                        <a href='load_student.php?student_id=".$row['student_id']."' style='color: blue;'>Update</a>
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
