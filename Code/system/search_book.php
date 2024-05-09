<?php
// Include your database connection file (connect.php)
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = isset($_POST['search']) ? $_POST['search'] : '';

    // Constructing the SQL query to search for the entered text in multiple columns
    $sql = "SELECT * FROM books WHERE 
            book_title LIKE '%$search%' OR 
            author LIKE '%$search%' OR 
            call_num LIKE '%$search%' OR 
            accession_num LIKE '%$search%'";

    $result = $conn->query($sql);

    if (!empty($search) && $result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Call Number</th>
                    <th>Accession Number</th>
                    <th>Published Date</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["book_title"]."</td>
                    <td>".$row["author"]."</td>
                    <td>".$row["call_num"]."</td>
                    <td>".$row["accession_num"]."</td>
                    <td>".$row["published_date"]."</td>
                    <td>".$row["date_added"]."</td>
                    <td>
                    <a href='borrow_book.php?book_id=".$row['book_id']."&book_title=".$row['book_title']."&author=".$row['author']."&call_num=".$row['call_num']."&accession_num=".$row['accession_num']."&published_date=".$row['published_date']."' style='color: green;'>Borrow</a> |
                    <a href='load_book.php?book_id=".$row['book_id']."' style='color: blue;'>Update</a> |
                    <a href='delete_book.php?book_id=".$row['book_id']."'>Delete</a> 
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
