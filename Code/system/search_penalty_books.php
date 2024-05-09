<?php
// Include your database connection file (connect.php)
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = isset($_POST['search']) ? $_POST['search'] : '';

    if (!empty($search)) {
        // Constructing the SQL query to search for the entered text in multiple columns
        $sql = "SELECT * FROM borrowed WHERE 
               student_id LIKE '%$search%' OR 
                            name LIKE '%$search%' OR 
                            department LIKE '%$search%' OR 
                            book_title LIKE '%$search%'";

        $result = $conn->query($sql);

        if ($result) { // Check if the query was successful
            if ($result->num_rows > 0) {
                echo "<table>
                        <tr>
                            <th>Student No</th>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Course/Section</th>
                            <th>Department</th>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>Call Number</th>
                            <th>Accession Number</th>
                            <th>Published Date</th>
                            <th>Date Return</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["student_id"]."</td>
                            <td>".$row["name"]."</td>
                            <td>".$row["sex"]."</td>
                            <td>".$row["course_section"]."</td>
                            <td>".$row["department"]."</td>
                            <td>".$row["book_title"]."</td>
                            <td>".$row["author"]."</td>
                            <td>".$row["call_num"]."</td>
                            <td>".$row["accession_num"]."</td>
                            <td>".$row["published_date"]."</td>
                            <td>".$row["date_return"]."</td>
                            <td style='color: ".($row["status"] == 'Overdue' ? 'red' : 'green')."'>".$row["status"]."</td>
                            <td>";
                            if ($row["status"] == 'Returned') {
                                echo "<form method='POST' action='delete_returned_book.php'> 
                                        <button type='submit' name='id' value='".$row['id']."' class='return-btn delete-btn'>Delete</button>
                                    </form>";
                            } else {
                                echo "<form method='POST' action='returning.php'> 
                                        <button type='submit' name='id' value='".$row['id']."' class='return-btn'>Return Book</button>
                                    </form>";
                            }
                    echo "</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "<span style='color: red;'>0 results</span>";
            }
        } else {
            echo "Error executing query: " . $conn->error;
        }
    } else {
        // If search is empty, don't display the table
        echo "";
    }
} else {
    // If not a POST request, don't execute the search query
    echo "Invalid request method";
}

// Close the database connection
$conn->close();
?>
