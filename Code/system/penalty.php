<?php
include 'top_bar.php';
include 'connect.php';

// Function to delete penalty records older than a specified duration
function deletePenaltiesByBanDuration($conn, $banDuration)
{
    $currentTime = time(); // Get the current Unix timestamp
    $deleteTime = $currentTime - $banDuration; // Calculate the delete time

    // Format the delete date
    $deleteDate = date('Y-m-d H:i:s', $deleteTime);

    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("DELETE FROM penalty WHERE date_borrowed < ?");
        // Bind the parameter
        $stmt->bind_param("s", $deleteDate);
        // Execute the query
        $stmt->execute();
        // Close the statement
        $stmt->close();
    } catch (Exception $e) {
        // Handle any exceptions
        echo "Error deleting penalties: " . $e->getMessage();
    }
}

// Check if the form is submitted for deleting penalties
if(isset($_POST['delete_days'])) {
    // Convert the selected ban duration to seconds
    $deleteDays = $_POST['delete_days'];
    $deleteSeconds = intval($deleteDays);
    deletePenaltiesByBanDuration($conn, $deleteSeconds); // Call the function to delete penalties older than ban duration
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penalty Data</title>
    <link rel="stylesheet" href="css/penalties.css">
    <style>
        /* Style for select dropdown */
        #deleteForm select {
            width: 200px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }

        /* Style for selected option */
        #deleteForm option:checked {
            background-color: #f8f8f8;
        }
        .delete-penalties-btn {
    background-color: #f44336; /* Red */
    border: none;
    color: white;
    padding: 7px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
    margin-top: 10px; /* Add margin to separate from the select dropdown */
    cursor: pointer;
    border-radius: 5px;
    transition-duration: 0.4s;
}

.delete-penalties-btn:hover {
    background-color: #d32f2f; /* Darker red */
}


        /* Animation for select dropdown */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* Apply animation to select dropdown */
        #deleteForm select {
            animation: fadeIn 0.5s ease;
        }
    </style>
    <script>
        // Function to store selected ban duration in session storage
        function storeSelectedDuration() {
            var selectElement = document.getElementById("delete_days");
            var selectedDuration = selectElement.options[selectElement.selectedIndex].value;
            sessionStorage.setItem("selectedDuration", selectedDuration);
        }

        // Function to retrieve and set selected ban duration from session storage
        window.onload = function () {
            var storedDuration = sessionStorage.getItem("selectedDuration");
            if (storedDuration !== null) {
                var selectElement = document.getElementById("delete_days");
                for (var i = 0; i < selectElement.options.length; i++) {
                    if (selectElement.options[i].value === storedDuration) {
                        selectElement.selectedIndex = i;
                        break;
                    }
                }
            }
        };
    </script>
</head>
<body>
<div class="container">
    <h1>Penalty Data</h1>
    <div style='text-align: left;'>
        <form method='post' action='penalty_report.php'>
            <button type='submit' class='report-btn'>View All Penalty Reports</button>
        </form>
    
        <br></br>
        <form id="deleteForm" method="post" action="">
            <label for="delete_days" style="font-weight: bold; color: green;">Select Ban Duration:</label>
            <select name="delete_days" id="delete_days" onchange="storeSelectedDuration()">
                <option value="">Select Duration</option>
                <option value="3600">1 hour</option>
                <option value="86400">1 day</option>
                <option value="604800">1 week</option>
                <option value="1209600">2 weeks</option>
                <option value="2592000">1 month</option>
                <option value="5184000">2 months</option>
                <option value="7776000">3 months</option>
            </select>
            <button type="submit" class="delete-penalties-btn">Delete Penalties</button>
        </form>
        <p style="color: red; font-size: 12px;">Unreturned data cannot be delete</p>
    </div>
    <?php
    // Display penalty data
    $query = $conn->query("SELECT * FROM penalty") or die(mysqli_error());
    if ($query->num_rows === 0) {
        echo "<div style='text-align: center; color: red;'><p>No overdue data found.</p></div>";
    } else {
        ?>
        <table class='penalty-table'>
            <thead>
            <tr>
                <!-- Table headers -->
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
            while ($row = $query->fetch_assoc()) {
                // Check if the data exists in the borrowed table
                $checkQuery = "SELECT * FROM `borrowed` WHERE `student_id` = '" . $row['student_id'] . "'";
                $result = $conn->query($checkQuery);

                // Determine status based on returned book
                if ($result->num_rows > 0) {
                    $status = "<span style='color: red;'>Overdue</span>";
                } else {
                    $status = "<span style='color: green;'>Returned</span>";
                }

                ?>
                <tr>
                    <!-- Display table data -->
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
                    <td><?php echo $status; ?></td>
                    <td>
                        <?php
                        if ($result->num_rows > 0) {
                            echo "<span style='color: red;'>Unreturned</span>";
                        } else {
                            ?>
                            <form method='post' action='delete_penalty.php'>
                                <input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
                                <button type='submit' class='delete-btn'>Delete</button>
                            </form>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    }
    ?>
</div>
</body>
</html>
