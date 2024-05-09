<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty/Visitor Report</title>
    <link rel="stylesheet" href="css/Borrowed_reports.css">
</head>
<body>
<div class="container">
    <h2>Faculty/Visitor Report</h2>
    <a href="Dashboard.php" class="back-btn">Back to Dashboard</a>
    <div class="button-group">
        <form method="POST" action="delete_all_faculty_visitor_report.php" class="delete-all-form">
            <button type="submit" class="delete-all-btn">Delete All Faculty/Visitor Report</button>
        </form>

        <button onclick="printTable()" class="print-btn">Print</button>
        
        <form method="GET" action="total_faculty_visitor_report.php" class="calculate-all-form">
            <button type="submit" class="calculate-all-btn">Calculate All Data</button>
        </form>
    </div>
</div>

<table class="returned-books-table">
    <thead>
        <tr>
            <th>Faculty No</th>
            <th>Name</th>
            <th>Sex</th>
            <th>Type</th>
            <th class="action-column">Action</th> <!-- Add a class to identify this column -->
        </tr>
    </thead>
    <tbody>
        <?php
        require_once 'connect.php';

        // Filter by sex if provided in the query string
        $sexFilter = isset($_GET['sex']) ? $_GET['sex'] : '';

        // Sort by name if provided in the query string
        $sortOrder = isset($_GET['sort']) && ($_GET['sort'] == 'desc') ? 'DESC' : 'ASC';

        // Construct SQL query with optional filters and sorting
        $query = "SELECT * FROM `faculty_visitor_report`";
        if (!empty($sexFilter)) {
            $query .= " WHERE `sex` = '$sexFilter'";
        }
        $query .= " ORDER BY SUBSTRING_INDEX(`name`, ' ', 1) $sortOrder";

        // Execute query
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            // Output data
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['faculty_no']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['sex']}</td>";
                echo "<td>{$row['type']}</td>";
                echo "<td class='action-column'><form method='POST' action='delete_faculty_visitor_report.php'>";
                echo "<input type='hidden' name='faculty_id' value='{$row['faculty_id']}'>";
                echo "<button type='submit' style='color: red;'>Delete</button>";
                echo "</form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11' style='color: red; text-align: center;'>No Faculty/Visitor records found.</td></tr>";
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
