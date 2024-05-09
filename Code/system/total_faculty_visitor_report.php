<?php
// Include the database connection file
require_once 'connect.php';

// Function to calculate total count by sex, name, type, and month
function getTotalByType($type, $month)
{
    global $conn;
    $sql = "SELECT COUNT(*) AS total FROM `faculty_visitor_report` WHERE `type` = '$type' AND MONTH(`date_added`) = $month";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}

// Fetch unique types from the database
$typeQuery = "SELECT DISTINCT `type` FROM `faculty_visitor_report`";
$typeResult = $conn->query($typeQuery);

// Array of months
$months = array(
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December'
);

// Default month selection
$selectedMonth = isset($_GET['month']) ? $_GET['month'] : date('n'); // Default to current month

// Check if data is found for the selected month
$dataFound = false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Faculty/Visitor Report</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s ease-in-out;
        }

        h2 {
            margin-top: 0;
            text-align: center;
            color: #333;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            text-align: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

        .month-selection {
            text-align: center;
            margin-bottom: 20px;
        }

        .month-selection select {
            padding: 8px;
            border-radius: 5px;
        }

        .no-data {
            text-align: center;
            color: red;
            font-weight: bold;
        }
    </style>
    <div style="text-align: center; margin-top: 20px;">
        <a href="faculty_visitor_report.php" class="back-btn">Back to Faculty/Visitor Report</a>
    </div>
</head>
<body>
    <!-- Month selection dropdown -->
    <div class="month-selection">
        <form method="GET">
            <label for="month">Select Month:</label>
            <select name="month" id="month">
                <?php foreach ($months as $monthNumber => $monthName): ?>
                    <option value="<?php echo $monthNumber; ?>" <?php if ($selectedMonth == $monthNumber) echo 'selected'; ?>><?php echo $monthName; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Show Data">
        </form>
    </div>

    <?php
    // Display the table only if data is found for the selected month
    if ($typeResult && $typeResult->num_rows > 0) {
        // Loop through each unique type
        while ($row = $typeResult->fetch_assoc()) {
            $type = $row['type'];

            // Calculate total count for each type
            $totalType = getTotalByType($type, $selectedMonth);

            // If any data is found, set flag to true
            if ($totalType > 0) {
                $dataFound = true;

                // Output the totals for each type
                echo "<div class='container'>";
                echo "<h2>Total Faculty/Visitor Report for Type: $type</h2>";
                echo "<table>";
                echo "<thead>";
                echo "<tr><th>Type</th><th>Total Count</th></tr>";
                echo "</thead>";
                echo "<tbody>";

                // Display total count for the type
                echo "<tr><td>$type</td><td>$totalType</td></tr>";

                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            }
        }
    }

    // If no data is found, display a message
    if (!$dataFound) {
        echo "<div class='no-data'>No Faculty/Visitor report found for {$months[$selectedMonth]}.</div>";
    }

    // Close database connection
    $conn->close();
    ?>
</body>
</html>
