<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report</title>
    <link rel="stylesheet" href="css/Borrowed_reports.css">
</head>
<body>
<div class="container">
    <h2>Attendance Report</h2>
    <a href="dashboard.php" class="back-btn">Back to Dashboard</a>
    <div class="button-group">
        <form method="POST" action="delete_all_attendance_report.php" class="delete-all-form">
            <button type="submit" class="delete-all-btn">Delete All Attendance Report</button>
        </form>

        <button onclick="printTable()" class="print-btn">Print</button>
        
        <form method="GET" action="total_attendance_report.php" class="calculate-all-form">
            <button type="submit" class="calculate-all-btn">Calculate All Data</button>
        </form>
    </div>
    <!-- Add date selection form -->
    <form method="GET" action="attendance_report.php" class="date-filter-form">
        <label for="date">Select Date:</label>
        <input type="date" id="date" name="date">
        <button type="submit" class="filter-btn">Show</button>
    </form>
    <!-- Add refresh button -->
<form method="GET" action="attendance_report.php" class="refresh-form">
    <button type="submit" class="refresh-btn">Refresh</button>
</form>

</div>

<table class="returned-books-table">
    <thead>
        <tr>
            <th>Barcode No</th>
            <th>Name</th>
            <th>Sex</th>
            <th>Course/Section</th>
            <th>Department</th>
            <th>Type</th>
            <th>Date Login</th>
            <th class="action-column">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once 'connect.php';

        // Filter by sex if provided in the query string
        $sexFilter = isset($_GET['sex']) ? $_GET['sex'] : '';

        // Sort by name if provided in the query string
        $sortOrder = isset($_GET['sort']) && ($_GET['sort'] == 'desc') ? 'DESC' : 'ASC';

        // Filter by date if provided in the query string
        $dateFilter = isset($_GET['date']) ? $_GET['date'] : '';
        if (isset($_GET['refresh'])) {
            // Redirect to the same page without any date filter
            header('Location: attendance_report.php');
            exit();
        }

        // Construct SQL query with optional filters and sorting
        $query = "SELECT * FROM `barcode`";
        if (!empty($sexFilter)) {
            $query .= " WHERE `sex` = '$sexFilter'";
        }
        if (!empty($dateFilter)) {
            // Ensure that the date is in the format yyyy-mm-dd
            $dateFilter = date('Y-m-d', strtotime($dateFilter));
            if (!empty($sexFilter)) {
                $query .= " AND";
            } else {
                $query .= " WHERE";
            }
            $query .= " DATE(`datereg`) = '$dateFilter'";
        }
        $query .= " ORDER BY SUBSTRING_INDEX(`name`, ' ', 1) $sortOrder";

        // Execute query
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            // Output data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['barcode_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['sex']}</td>";
                echo "<td>{$row['course_section']}</td>";
                echo "<td>{$row['department']}</td>";
                echo "<td>{$row['type']}</td>";
                echo "<td>{$row['datereg']}</td>";
                echo "<td class='action-column'>"; // Add class to action column cell
                echo "<form method='POST' action='delete_attendance.php'>";
                echo "<input type='hidden' name='id' value='{$row['id']}'>";
                echo "<button type='submit' style='color: red;'>Delete</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' style='color: red; text-align: center;'>No Attendance records found.</td></tr>";
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
