<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penalty Books Report</title>
    <link rel="stylesheet" href="css/Borrowed_reports.css">
</head>
<body>
<div class="container">
    <h2>Penalty Report</h2>
    <a href="Dashboard.php" class="back-btn">Back to Dashboard</a>
    <div class="button-group">
        <form method="POST" action="delete_all_penalty_report.php" class="delete-all-form">
            <button type="submit" class="delete-all-btn">Delete All Penalty Report</button>
        </form>

        <button onclick="printTable()" class="print-btn">Print</button>
        
        <form method="GET" action="total_penalty_report.php" class="calculate-all-form">
            <button type="submit" class="calculate-all-btn">Calculate All Data</button>
        </form>
    </div>
     <!-- Add date selection form -->
     <form method="GET" action="penalty_report.php" class="date-filter-form">
        <label for="date">Select Date:</label>
        <input type="date" id="date" name="date">
        <button type="submit" class="filter-btn">Show</button>
    </form>
    <!-- Add refresh button -->
    <form method="GET" action="penalty_report.php" class="refresh-form">
        <button type="submit" name="refresh" class="refresh-btn">Refresh</button>
    </form>
</div>

<table class="returned-books-table">
    <thead>
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
            <th>Date to be Return</th>
            <th>Date Returned</th>
            <th>Status</th>
            <th class="action-column">Action</th> <!-- Add a class to identify this column -->
        </tr>
    </thead>
    <tbody>
        <?php
        require_once 'connect.php';
         
        // Filter by date if provided in the query string
        $dateFilter = isset($_GET['date']) ? $_GET['date'] : '';
        if (isset($_GET['refresh'])) {
            // Redirect to the same page without any date filter
            header('Location: penalty_report.php');
            exit();
        }

        // Construct SQL query with optional filters and sorting
        $query = "SELECT * FROM `penalty_report` WHERE 1=1"; // Start with a true condition
        
        if (!empty($dateFilter)) {
            // Ensure that the date is in the format yyyy-mm-dd
            $dateFilter = date('Y-m-d', strtotime($dateFilter));
            $query .= " AND DATE(`date_return`) = '$dateFilter'";
        }

        // Filter by sex if provided in the query string
        $sexFilter = isset($_GET['sex']) ? $_GET['sex'] : '';
        if (!empty($sexFilter)) {
            $query .= " AND `sex` = '$sexFilter'";
        }

        // Sort by name if provided in the query string
        $sortOrder = isset($_GET['sort']) && ($_GET['sort'] == 'desc') ? 'DESC' : 'ASC';
        $query .= " ORDER BY SUBSTRING_INDEX(`name`, ' ', 1) $sortOrder";

        // Execute query
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            // Output data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['student_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['sex']}</td>";
                echo "<td>{$row['course_section']}</td>";
                echo "<td>{$row['department']}</td>";
                echo "<td>{$row['book_title']}</td>";
                echo "<td>{$row['author']}</td>";
                echo "<td>{$row['call_num']}</td>";
                echo "<td>{$row['accession_num']}</td>";
                echo "<td>{$row['published_date']}</td>";
                echo "<td>" . date('Y-m-d') . "</td>";
                echo "<td>{$row['date_return']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td class='action-column'><form method='POST' action='delete_penalty_report.php'>";
                echo "<input type='hidden' name='id' value='{$row['id']}'>";
                echo "<button type='submit' style='color: red;'>Delete</button>";
                echo "</form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='13' style='color: red; text-align: center;'>No overdue records found.</td></tr>";
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
}
</script>
