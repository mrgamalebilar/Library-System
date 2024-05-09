<?php
include 'top_bar.php';
include 'connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book</title>
    <link rel="stylesheet" href="css/book_return.css">
</head>
<body>
    <div class="container">
        <div class="alert alert-info">TRANSACTION - RETURNING</div>
        <input type="text" id="search_input" name="search" placeholder="Search Student/Book" class="search-input">
        <div style='text-align: center; color: red;'>
            Note: You must delete all the books data that is already returned!
        </div>
        <div class="result">
            <!-- Results will be displayed here -->
        </div>
        <table id="table" class="table table-bordered">
            <thead class="alert-success">
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
                    <th>Date Borrowed</th>
                    <th>Date to be Return</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include "connect.php";

                function displayUsers($conn) {
                    $search = isset($_POST['search']) ? $_POST['search'] : '';

                    // Constructing the SQL query to search for the entered text in multiple columns
                    $sql = "SELECT *, 'Student' AS type FROM borrowed WHERE 
                            student_id LIKE '%$search%' OR 
                            name LIKE '%$search%' OR 
                            department LIKE '%$search%' OR 
                            book_title LIKE '%$search%'";
                    
                    $result = $conn->query($sql);
                    $query = $conn->query("SELECT * FROM borrowed") or die(mysqli_error($conn));
                    if ($query->num_rows === 0) {
                        echo "<tr><td colspan='11' style='color: red; text-align: center;'>No borrowed book record</td></tr>";
                    } else {
                        while ($row = $query->fetch_assoc()) {
                            if (strtotime($row['date_return']) < strtotime(date('Y-m-d')) && $row['status'] != 'Returned') {
                                $status = 'Overdue';
                                $statusColor = 'red';
                                
                                // Check if the data already exists in penalty table
                                $checkPenaltyQuery = $conn->prepare("SELECT * FROM penalty WHERE student_id = ? AND book_title = ?");
                                $checkPenaltyQuery->bind_param("is", $row['student_id'], $row['book_title']);
                                $checkPenaltyQuery->execute();
                                $checkPenaltyResult = $checkPenaltyQuery->get_result();
                                if ($checkPenaltyResult->num_rows == 0) {
                                    // Insert data into penalty table
                                  // Insert data into penalty table
                                $penaltyQuery = $conn->prepare("INSERT INTO penalty (student_id, name, sex, course_section, department, book_title, author, call_num, accession_num, published_date, date_return, date_borrowed, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                $penaltyQuery->bind_param("issssssssssss", $row['student_id'], $row['name'], $row['sex'], $row['course_section'], $row['department'], $row['book_title'], $row['author'], $row['call_num'], $row['accession_num'], $row['published_date'], $row['date_return'], $row['date_borrowed'], $status);
                                $penaltyQuery->execute();
                                $penaltyQuery->close();

                                }
                                $checkPenaltyQuery->close();

                                // Check if the data already exists in penalty_report table
                                $checkPenaltyReportQuery = $conn->prepare("SELECT * FROM penalty_report WHERE student_id = ? AND book_title = ?");
                                $checkPenaltyReportQuery->bind_param("is", $row['student_id'], $row['book_title']);
                                $checkPenaltyReportQuery->execute();
                                $checkPenaltyReportResult = $checkPenaltyReportQuery->get_result();
                                if ($checkPenaltyReportResult->num_rows == 0) {
                                    // Insert data into penalty_report table
                                    $penaltyReportQuery = $conn->prepare("INSERT INTO penalty_report (student_id, name, sex, course_section, department, book_title, author, call_num, accession_num, published_date, date_return, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                    $penaltyReportQuery->bind_param("isssssssssss", $row['student_id'], $row['name'], $row['sex'], $row['course_section'], $row['department'], $row['book_title'], $row['author'], $row['call_num'], $row['accession_num'], $row['published_date'], $row['date_return'], $status);
                                    $penaltyReportQuery->execute();
                                    $penaltyReportQuery->close();
                                }
                                $checkPenaltyReportQuery->close();
                                
                                // Update the status in the borrowed table
                                $updateStmt = $conn->prepare("UPDATE borrowed SET status=? WHERE id=?");
                                $updateStmt->bind_param("si", $status, $row['id']);
                                $updateStmt->execute();
                                $updateStmt->close();
                            } else {
                                $status = $row['status'];
                                $statusColor = 'green';
                            }
            ?>
                <tr>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['sex']; ?></td>
                    <td><?php echo $row['course_section']; ?></td>
                    <td><?php echo $row['department']; ?></td>
                    <td><?php echo $row['book_title']; ?></td>
                    <td><?php echo $row['author']; ?></td>
                    <td><?php echo $row['call_num']; ?></td>
                    <td><?php echo $row['accession_num']; ?></td> 
                    <td><?php echo $row['published_date']; ?></td>
                    <td><?php echo $row['date_borrowed']; ?></td>
                    <td><?php echo $row['date_return']; ?></td>
                    <td style="color: <?php echo $statusColor; ?>"><?php echo $status; ?></td>
                    <td>
                        <?php if ($status == 'Returned'): ?>
                            <form method="POST" action="delete_returned_book.php"> 
                                <button type="submit" name="id" value="<?php echo $row['id']; ?>" class="return-btn delete-btn">Delete</button>
                            </form>
                        <?php else: ?>
                            <form method="POST" action="returning.php"> 
                                <button type="submit" name="id" value="<?php echo $row['id']; ?>" class="return-btn">Return Book</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php 
                        }
                    }
                }
                displayUsers($conn);
            ?>
            </tbody>
        </table>
       
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function () {
    $('#search_input').on('input', function() {
    var searchText = $(this).val();
    $.ajax({
        type: 'POST',
        url: 'search_returned_books.php', // Replace 'search_returned_books.php' with your PHP file handling the search logic
        data: { search: searchText },
        success: function(response) {
            $('.result').html(response);
        }
    });
});
});
</script>
