<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'top_bar.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Panel</title>
    <link rel="stylesheet" href="css/students.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div class="container">
        <h2>Student Panel Management</h2>


        <form method="post">
            <input type="text" name="student_no" placeholder="Student No" required>
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="text" name="sex" placeholder="Sex" required>
            <input type="text" name="course_section" placeholder="Course/Year-Section" required>
            <input type="text" name="department" placeholder="Department" required>
            <input type="hidden" name="type" value="student">
            <input type="submit" name="addStudent" value="Add Student">
            <button id="import_students" class="custom-button">Import Students</button>
            <button id="delete_all_students" class="custom-button">Delete All Students</button>
 
        </form>
        <input type="text" id="search_input" name="search" placeholder="Search Student">

        <div class="result">
            <!-- Results will be displayed here -->
        </div>

        <?php
require_once 'connect.php';

function displayUsers($conn) {
    $search = isset($_POST['search']) ? $_POST['search'] : '';

    // Constructing the SQL query to search for the entered text in multiple columns
    $sql = "SELECT *, 'Student' AS type FROM student WHERE 
            student_no LIKE '%$search%' OR 
            name LIKE '%$search%' OR 
            department LIKE '%$search%' 
            ORDER BY SUBSTRING(name, 1, 1) ASC"; // Order by the first letter of the name ascending
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Student No</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Course/Year-Section</th>
                    <th>Department</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["student_no"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["sex"]."</td>
                    <td>".$row["course_section"]."</td>
                    <td>".$row["department"]."</td>
                    <td>".$row["type"]."</td>
                    <td><a href='delete_student.php?student_id=".$row['student_id']."'>Delete</a> | <a href='load_student.php?student_id=".$row['student_id']."' style='color: blue;'>Update</a>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<span style='color: red;'>No student account Added!</span>";
    }
}
            
if (isset($_POST['addStudent'])) {
    $student_no = $_POST['student_no'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
    $course_section = $_POST['course_section'];
    $department = $_POST['department'];
    $type = $_POST['type'];

    // Check if the student exists in the student table
    $existingStudentQuery = "SELECT * FROM student WHERE student_no = '$student_no'";
    $existingStudentResult = $conn->query($existingStudentQuery);
    if ($existingStudentResult->num_rows > 0) {
        echo "<span style='color: red;'>Barcode Id already exists!</span>";
    } else {
        // Insert into the student table
        $sql = "INSERT INTO student (student_no, name, sex, course_section, department, type, date_added)
                VALUES ('$student_no', '$name', '$sex', '$course_section','$department', '$type', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "<span style='color: green;'>New record created successfully</span>";

            // Insert into the students_report table
            $sqlReport = "INSERT INTO students_report (student_no, name, sex, course_section, department, type, date_added)
                          VALUES ('$student_no', '$name', '$sex', '$course_section','$department', '$type', NOW())";

            // Check if the student exists in the students_report table
            $existingReportQuery = "SELECT * FROM students_report WHERE student_no = '$student_no'";
            $existingReportResult = $conn->query($existingReportQuery);
            if ($existingReportResult->num_rows == 0) {
                // Insert into students_report only if the student doesn't already exist
                if ($conn->query($sqlReport) !== TRUE) {
                    echo "Error inserting into students_report: " . $conn->error;
                }
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
                    url: 'search_student.php', // Replace 'search_student.php' with your PHP file handling the search logic
                    data: { search: searchText },
                    success: function(response) {
                        $('.result').html(response);
                    }
                });
            });
     

                 // Import students button functionality
                $('#import_students').click(function () {
                    window.location.href = 'import_student.php';
                });

                // Delete all students button functionality
                $('#delete_all_students').click(function () {
                    if (confirm('Are you sure you want to delete all students?')) {
                        $.ajax({
                            type: "POST",
                            url: "delete_all_student.php",
                            success: function(response) {
                                alert('All students deleted successfully');
                                window.location.reload();
                            },
                            error: function(xhr, status, error) {
                                alert('Error deleting students');
                            }
                        });
                    }
                });
            });
        </script>
    </div>
</body>
</html>
