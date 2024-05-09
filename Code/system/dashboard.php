<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboardview.css">
    <title>Dashboard</title>
</head>
<body>
<?php
include('connect.php');


function fetchSingleValue($conn, $query) {
    $result = $conn->query($query);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}


$total_faculty_visitor = fetchSingleValue($conn, "SELECT COUNT(*) as total FROM faculty_visitor");
$total_students = fetchSingleValue($conn, "SELECT COUNT(*) as total FROM student");
$total_attendance = fetchSingleValue($conn, "SELECT COUNT(*) as total FROM barcode");
$total_books = fetchSingleValue($conn, "SELECT COUNT(*) as total FROM books");
$total_borrowed_books = fetchSingleValue($conn, "SELECT COUNT(*) as total FROM borrow");
$total_returned_books = fetchSingleValue($conn, "SELECT COUNT(*) as total FROM returned");
$total_penalty_records = fetchSingleValue($conn, "SELECT COUNT(*) as total FROM penalty");






$conn->close();
?>
<?php include 'top_bar.php';?>
<div class="dashboard-container">

    <div class="big-card-container">
        <div class="big-card">
            <h2>Faculty/Visitors</h2>
            <p class="count" id="total_faculty_visitor"><?php echo $total_faculty_visitor; ?></p>
            <a href="faculty_visitor_report.php" class="view-report-btn">View Report</a>
        </div>
       
        <div class="big-card">
            <h2>Students</h2>
            <p class="count" id="total_students"><?php echo $total_students; ?></p>
            <a href="students_report.php" class="view-report-btn">View Report</a>
        </div>
       
        <div class="big-card">
            <h2>Attendance</h2>
            <p class="count" id="total_attendance"><?php echo $total_attendance; ?></p>
            <a href="attendance_report.php" class="view-report-btn">View Report</a>
        </div>
        
        <div class="big-card">
            <h2>Books</h2>
            <p class="count" id="total_books"><?php echo $total_books; ?></p>
            <a href="books_report.php" class="view-report-btn">View Report</a>
        </div>
       
        <div class="big-card">
            <h2>Borrowed Books</h2>
            <p class="count" id="total_borrowed_books"><?php echo $total_borrowed_books; ?></p>
            <a href="borrowed_report.php" class="view-report-btn">View Report</a>
        </div>
       
        <div class="big-card">
            <h2>Returned Books</h2>
            <p class="count" id="total_returned_books"><?php echo $total_returned_books; ?></p>
            <a href="returned_report.php" class="view-report-btn">View Report</a>
        </div>
       
        <div class="big-card">
            <h2>Penalty Records</h2>
            <p class="count" id="total_penalty_records"><?php echo $total_penalty_records; ?></p>
            <a href="penalty_report.php" class="view-report-btn">View Report</a>
        </div>
    </div>
</div>
</body>
</html>
