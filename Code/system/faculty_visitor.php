<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'top_bar.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel</title>
    <link rel="stylesheet" href="css/faculty_visitors.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Faculty/Visitor Panel Management</h2>

        <form method="post">
            <input type="text" name="faculty_no" placeholder="Faculty No" required>
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="sex" placeholder="Sex" required>
            <br></br>
            <label for="type" style="display: block; margin-bottom: 5px;">Type:</label>
<select name="type" id="type" required style="padding: 8px; border-radius: 5px; border: 1px solid #ccc; width: 31.5%; transition: border-color 0.3s;">
    <option value="">Select Type</option>
    <option value="faculty">Faculty</option>
    <option value="visitor">Visitor</option>
    <option value="guest">Guest</option>
    <option value="student from other school">Student from other school</option>
</select>

            <br></br>
            <input type="submit" name="addFaculty_visitor" value="Add Faculty/Visitor">
            <button id="delete_all_faculty_visitor" class="custom-button">Delete All</button>
        </form>

        <input type="text" id="search_input" name="search" placeholder="Search Faculty/Visitor">
        <button id="addBarcodeBtn">Add Barcode Only</button>

        <div class="result">
           
        </div>

        <?php
            include "connect.php";

            function displayUsers($conn) {
                $search = isset($_POST['search']) ? $_POST['search'] : '';
            
                
                $sql = "SELECT * FROM faculty_visitor WHERE 
                        faculty_no LIKE '%$search%' OR 
                        name LIKE '%$search%' OR 
                        sex LIKE '%$search%' OR 
                        type LIKE '%$search%'";
                        
                
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    echo "<table>
                            <tr>
                                <th>Faculty No</th>
                                <th>Name</th>
                                <th>Sex</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row["faculty_no"]."</td>
                                <td>".$row["name"]."</td>
                                <td>".$row["sex"]."</td>
                                <td>".$row["type"]."</td>
                                <td><a href='delete_faculty_visitor.php?faculty_id=".$row['faculty_id']."'>Delete</a> | <a href='load_faculty_visitor.php?faculty_id=".$row['faculty_id']."' style='color: blue;'>Update</a>

                            </tr>";
                    }
                    echo "</table>";
                } else {
                echo "<span style='color: red;'>No Faculty/Visitor Account Added!</span>";
                }
            }
            
            if (isset($_POST['addFaculty_visitor'])) {
                $faculty_no = $_POST['faculty_no'];
                $name = $_POST['name'];
                $sex = $_POST['sex'];
                $type = $_POST['type'];
            
                // Check if the faculty visitor already exists in the database
                $existingFacultyVisitorQuery = "SELECT * FROM faculty_visitor WHERE faculty_no = '$faculty_no'";
                $existingFacultyVisitorResult = $conn->query($existingFacultyVisitorQuery);
            
                if ($existingFacultyVisitorResult->num_rows > 0) {
                    echo "<span style='color: red;'>Barcode Id already exists!</span>";
                } else {
                    // Insert into faculty_visitor database
                    $insertFacultyVisitorQuery = "INSERT INTO faculty_visitor (faculty_no, name, sex, type, date_added)
                                                  VALUES ('$faculty_no', '$name', '$sex', '$type', NOW())";
            
                    if ($conn->query($insertFacultyVisitorQuery) === TRUE) {
                        echo "<span style='color: green;'>New record created successfully</span>";
            
                        // Insert into faculty_visitor_report database
                        $insertFacultyVisitorReportQuery = "INSERT INTO faculty_visitor_report (faculty_no, name, sex, type, date_added)
                                                            VALUES ('$faculty_no', '$name', '$sex', '$type', NOW())";
            
                        if ($conn->query($insertFacultyVisitorReportQuery) !== TRUE) {
                            echo "Error: " . $insertFacultyVisitorReportQuery . "<br>" . $conn->error;
                        }
                    } else {
                        echo "Error: " . $insertFacultyVisitorQuery . "<br>" . $conn->error;
                    }
                }
            }
            
            
            
            displayUsers($conn);

            $conn->close();
        ?>

        <script>
            $(document).ready(function () {
                $('#search_input').on('input', function() {
                    var searchText = $(this).val();
                    $.ajax({
                        type: 'POST',
                        url: 'search_faculty_visitor.php', 
                        data: { search: searchText },
                        success: function(response) {
                            $('.result').html(response);
                        }
                    });
                });

                $('#delete_all_faculty_visitor').click(function () {
                    if (confirm('Are you sure you want to delete all faculty/visitor?')) {
                        $.ajax({
                            type: "POST",
                            url: "delete_all_faculty_visitor.php",
                            success: function(response) {
                                alert('All faculty/visitor deleted successfully');
                                window.location.reload();
                            },
                            error: function(xhr, status, error) {
                                alert('Error deleting faculty visitor');
                            }
                        });
                    }
                });

               
                $('#addBarcodeBtn').click(function () {
                    window.location.href = 'add_barcode.php';
                });
            });
        </script>
    </div>
</body>
</html>
