<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'top_bar.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management</title>
    <link rel="stylesheet" href="css/books.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>

    <div class="container">
        <h2>Book Management</h2>

        <form method="post">
  <input type="text" name="book_title" placeholder="Book Title" required>
  <input type="text" name="author" placeholder="Author" required>
  <label for="published_date">Published Date:</label>
  <input type="date" name="published_date" id="published_date" placeholder="Published Date" required>
  <input type="text" name="call_num" placeholder="Call Number" required>
  <input type="text" name="accession_num" placeholder="Accession Number" required>
  <input type="submit" name="addBook" value="Add Book">
</form>
<input type="text" id="search_input" name="search" placeholder="Search Book">

<div class="result">
    <!-- Results will be displayed here -->
</div>

        <?php
            include "connect.php"; // Include your database connection file
            function displayUsers($conn) {
                $search = isset($_POST['search']) ? $_POST['search'] : '';
            
                
                $sql = "SELECT * FROM faculty_visitor WHERE 
                        book_title LIKE '%$search%' OR 
                        author LIKE '%$search%' OR 
                        call_num LIKE '%$search%' OR 
                        accession_num LIKE '%$search%'";
                        
                
                $result = $conn->query($sql);
        
                if ($result->num_rows > 0) {
                    echo "<table>
                            <tr>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>Call Num</th>
                            <th>Accession Num</th>
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
                            <a href='borrow_book.php?book_id=".$row['book_id']."'>Borrow</a>|
                            <a href='load_book.php?book_id=".$row['book_id']."'>Update</a>|
                            <a href='delete_book.php?book_id=".$row['book_id']."'>Delete</a>

                            
                        </td>
                            </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
            }
            if (isset($_POST['addBook'])) {
                $book_title = $_POST['book_title'];
                $author = $_POST['author'];
                $call_num = $_POST['call_num'];
                $accession_num = $_POST['accession_num'];
                $published_date = $_POST['published_date'];
                
                // Check if the data already exists in books database
                $checkBooksQuery = "SELECT * FROM books WHERE book_title = '$book_title' AND author = '$author' AND call_num = '$call_num' AND accession_num = '$accession_num'";
                $checkBooksResult = $conn->query($checkBooksQuery);
            
                // Check if the data already exists in books_report database
                $checkBooksReportQuery = "SELECT * FROM books_report WHERE book_title = '$book_title' AND author = '$author' AND call_num = '$call_num' AND accession_num = '$accession_num'";
                $checkBooksReportResult = $conn->query($checkBooksReportQuery);
            
                if ($checkBooksResult->num_rows > 0 && $checkBooksReportResult->num_rows > 0) {
                    // Data already exists, do not save the same data
                    echo "<span style='color: red;'>The book already exists in both databases</span>";
                } else {
                    // Insert into the books database
                    $sqlBooks = "INSERT INTO books (book_title, author, call_num, accession_num, published_date, date_added)
                                VALUES ('$book_title', '$author', '$call_num', '$accession_num', '$published_date', NOW())";
            
                    // Insert into the books_report database
                    $sqlBooksReport = "INSERT INTO books_report (book_title, author, call_num, accession_num, published_date, date_added)
                                VALUES ('$book_title', '$author', '$call_num', '$accession_num', '$published_date', NOW())";
            
                    // Execute queries
                    if ($conn->query($sqlBooks) === TRUE && $conn->query($sqlBooksReport) === TRUE) {
                        echo "<span style='color: green;'>New book added successfully</span>";
                    } else {
                        echo "Error: " . $sqlBooks . "<br>" . $conn->error;
                        echo "Error: " . $sqlBooksReport . "<br>" . $conn->error;
                    }
                }
            }
            

            $sql = "SELECT * FROM books";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>
                        <tr>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>Call Num</th>
                            <th>Accession Num</th>
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
            } else {
                echo "<span style='color: red;'>No Books Added!</span>";
                
            }

            $conn->close();
        ?>
        <script>
            $(document).ready(function () {
                $('#search_input').on('input', function() {
                var searchText = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'search_book.php', 
                    data: { search: searchText },
                    success: function(response) {
                        $('.result').html(response);
                    }
                });
            });
            });
        </script>
    </div>
</body>
</html>
