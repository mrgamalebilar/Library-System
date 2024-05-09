<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Books Report</title>
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
        <a href="books_report.php" class="back-btn">Back to Books Report</a>
    </div>
</head>
<body>
<?php
// Include the database connection file
require_once 'connect.php';

// Fetch unique book titles and authors from the books database
$bookQuery = "SELECT DISTINCT `book_title`, `author` FROM `books`";
$bookResult = $conn->query($bookQuery);

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

?>
    
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

$dataFound = false; // Flag to check if data is found

if ($bookResult && $bookResult->num_rows > 0) {
    while ($row = $bookResult->fetch_assoc()) {
        $bookTitle = $row['book_title'];
        $author = $row['author'];

        // Calculate total count for each book title and author added in the selected month
        $totalBooksQuery = "SELECT COUNT(*) AS total FROM `books` WHERE `book_title` = '$bookTitle' AND `author` = '$author' AND MONTH(`date_added`) = '$selectedMonth'";
        $totalBooksResult = $conn->query($totalBooksQuery);
        if ($totalBooksResult && $totalBooksResult->num_rows > 0) {
            $totalBooksRow = $totalBooksResult->fetch_assoc();
            $totalBooks = $totalBooksRow['total'];

            // If data is found, set data found flag to true and break out of the loop
            if ($totalBooks > 0) {
                $dataFound = true;
                break;
            }
        }
    }

    // If data is found, display the table
    if ($dataFound) {
        echo "<div class='container'>";
        echo "<h2>Total Books Report</h2>";
        echo "<table>";
        echo "<thead>";
        echo "<tr><th>Book Title</th><th>Author</th><th>Total Books</th></tr>";
        echo "</thead>";
        echo "<tbody>";

        // Loop through the book results again to display the table rows
        $bookResult->data_seek(0); // Reset the result pointer
        while ($row = $bookResult->fetch_assoc()) {
            $bookTitle = $row['book_title'];
            $author = $row['author'];

            // Calculate total count for each book title and author added in the selected month
            $totalBooksQuery = "SELECT COUNT(*) AS total FROM `books` WHERE `book_title` = '$bookTitle' AND `author` = '$author' AND MONTH(`date_added`) = '$selectedMonth'";
            $totalBooksResult = $conn->query($totalBooksQuery);
            if ($totalBooksResult && $totalBooksResult->num_rows > 0) {
                $totalBooksRow = $totalBooksResult->fetch_assoc();
                $totalBooks = $totalBooksRow['total'];

                // Output the row for each book title and author
                echo "<tr><td>$bookTitle</td><td>$author</td><td>$totalBooks</td></tr>";
            }
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        // If no data is found, display a message
        echo "<div class='no-data'>No Books report found for {$months[$selectedMonth]}.</div>";
    }
} else {
    // If no data is found, display a message
    echo "<div class='no-data'>No Books report found for {$months[$selectedMonth]}.</div>";
   
}

// Close database connection
$conn->close();
?>

</body>
</html>
