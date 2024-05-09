<head>
<link rel="stylesheet" href="css/penalty_message.css">
</head>
<?php
include "connect.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data and sanitize inputs
    $studentId = mysqli_real_escape_string($conn, $_POST["student_id"]);

    // Check if the student has a penalty record
    $checkPenaltyQuery = $conn->prepare("SELECT * FROM penalty WHERE student_id = ?");
    $checkPenaltyQuery->bind_param("i", $studentId);
    $checkPenaltyQuery->execute();
    $checkPenaltyResult = $checkPenaltyQuery->get_result();

    if ($checkPenaltyResult->num_rows > 0) {
        // If a penalty record is found, display a message
        echo "<div class='penalty-message'>This ID number has a penalty records or books that has not yet returned</div>";
        echo "<div class='button-container'><button onclick='window.location=\"book.php\"' class='back-button'>Back</button>";
        echo "<button onclick='window.location=\"penalty.php\"' class='penalty-button'>Go to Penalty Data</button></div>";
        exit(); // Stop further execution
    } else {
        // Proceed with book borrowing if no penalty record is found

        // Collect other form data and sanitize inputs
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
        $sex = mysqli_real_escape_string($conn, $_POST["sex"]);
        $courseSection = mysqli_real_escape_string($conn, $_POST["course_section"]);
        $department = mysqli_real_escape_string($conn, $_POST["department"]);
        $bookTitle = mysqli_real_escape_string($conn, $_POST["book_title"]);
        $author = mysqli_real_escape_string($conn, $_POST["author"]);
        $callNumber = mysqli_real_escape_string($conn, $_POST["call_num"]);
        $accessionNumber = mysqli_real_escape_string($conn, $_POST["accession_num"]);
        $publishedDate = mysqli_real_escape_string($conn, $_POST["published_date"]);
        $dateReturn = mysqli_real_escape_string($conn, $_POST["date_return"]);
        $status = 'Borrowed'; // Define status here
        $dateBorrowed = date("Y-m-d H:i:s"); // Current date and time

        // Check database connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement for borrow table
        $borrowSql = "INSERT INTO borrow (student_id, name, sex, course_section, department, book_title, author, call_num, accession_num, published_date, date_return, status, date_borrowed) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind parameters for borrow table
        $borrowStmt = $conn->prepare($borrowSql);

        if (!$borrowStmt) {
            die("Error preparing statement for borrow table: " . $conn->error);
        }

        // Bind parameters for borrow table
        $borrowStmt->bind_param("sssssssssssss", $studentId, $name, $sex, $courseSection, $department, $bookTitle, $author, $callNumber, $accessionNumber, $publishedDate, $dateReturn, $status, $dateBorrowed);

        // Execute statement for borrow table
        if (!$borrowStmt->execute()) {
            die("Error borrowing book: " . $borrowStmt->error);
        }

        $borrowStmt->close(); // Close the statement for borrow table

        // Prepare SQL statement for borrowed table
        $borrowedSql = "INSERT INTO borrowed (student_id, name, sex, course_section, department, book_title, author, call_num, accession_num, published_date, date_return, status, date_borrowed) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind parameters for borrowed table
        $borrowedStmt = $conn->prepare($borrowedSql);

        if (!$borrowedStmt) {
            die("Error preparing statement for borrowed table: " . $conn->error);
        }

        // Bind parameters for borrowed table
        $borrowedStmt->bind_param("sssssssssssss", $studentId, $name, $sex, $courseSection, $department, $bookTitle, $author, $callNumber, $accessionNumber, $publishedDate, $dateReturn, $status, $dateBorrowed);

        // Execute statement for borrowed table
        if (!$borrowedStmt->execute()) {
            die("Error inserting data into borrowed table: " . $borrowedStmt->error);
        }

        $borrowedStmt->close(); // Close the statement for borrowed table

        // Close connection
        $conn->close();

        // Redirect after successful insertion
        header("Location: return.php");
        exit();
    }
} else {
    echo "Form not submitted.";
}
?>
