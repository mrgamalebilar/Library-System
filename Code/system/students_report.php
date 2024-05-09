<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Report</title>
    <link rel="stylesheet" href="css/Borrowed_reports.css">
</head>
<body>
<div class="container">
    <h2>Students Report</h2>
    <a href="dashboard.php" class="back-btn">Back to Dashboard</a>
    <div class="button-group">
        <form method="POST" action="delete_all_students_report.php" class="delete-all-form">
            <button type="submit" class="delete-all-btn">Delete All Students Report</button>
        </form>

        <button onclick="printTable()" class="print-btn">Print</button>
        
        <form method="GET" action="total_students_report.php" class="calculate-all-form">
            <button type="submit" class="calculate-all-btn">Calculate All Data</button>
        </form>
    </div>
</div>

<table class="returned-books-table">
    <thead>
        <tr>
            <th>Student No</th>
            <th>Name</th>
            <th>Sex</th>
            <th>Course/Section</th>
            <th>Department</th>
            <th>Type</th>
            <th class="action-column">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
require_once 'connect.php';

// Filter by book title if provided in the query string
$bookTitleFilter = isset($_GET['student_id']) ? $_GET['student_id'] : '';

// Sort by name if provided in the query string
$sortOrder = isset($_GET['sort']) && ($_GET['sort'] == 'desc') ? 'DESC' : 'ASC';

// Construct SQL query with optional filters and sorting
$query = "SELECT * FROM `students_report`";
if (!empty($bookTitleFilter)) {
    $query .= " WHERE `student_no` = '$studentNoFilter'";
}
$query .= " ORDER BY SUBSTRING_INDEX(`name`, ' ', 1) $sortOrder"; // Order by the first letter of the name

// Execute query
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    // Output data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['student_no']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['sex']}</td>";
        echo "<td>{$row['course_section']}</td>";
        echo "<td>{$row['department']}</td>";
        echo "<td>{$row['type']}</td>";
        echo "<td class='action-column'>"; // Add class to action column cell
        echo "<form method='POST' action='delete_students.php'>";
        echo "<input type='hidden' name='student_id' value='{$row['student_id']}'>"; // Corrected the name attribute
        echo "<button type='submit' style='color: red;'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td style='color: red; text-align: center;' colspan='7'>No Students record found.</td></tr>";
}

// Close database connection
$conn->close();
?>


    </tbody>
</table>

</body>
</html>
<script>
function printTable() {
    // Hide elements not part of the table
    var elementsToHide = document.querySelectorAll('.container, .button-group, .back-btn, .action-column');
    elementsToHide.forEach(function(element) {
        element.classList.add('hide-for-print'); // Add a class to hide elements for printing
    });

    // Hide the delete buttons in the action column
    var deleteButtons = document.querySelectorAll('.returned-books-table td.action-column button');
    deleteButtons.forEach(function(button) {
        button.style.display = 'none';
    });

    // Print the table
    var table = document.querySelector('.returned-books-table');
    table.style.display = 'table'; // Ensure the table is visible
    table.setAttribute('id', 'print-table');
    window.print();
    table.removeAttribute('id');

    // Show the hidden elements after printing
    elementsToHide.forEach(function(element) {
        element.classList.remove('hide-for-print'); // Remove the class to show elements after printing
    });

    // Show the delete buttons after printing
    deleteButtons.forEach(function(button) {
        button.style.display = 'block';
    });
}
</script>
