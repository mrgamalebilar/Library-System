<?php

include 'connect.php';
$error = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>
    <link rel="stylesheet" href="css/attendance.css">
</head>
<body onload="document.pos.barcode.focus();">
    <?php include 'top_bar.php'; ?>
    <div class="container">
        <form class="pos-style" name="pos" action="" method="post">
            <div class="form-group">
                <input type="text" name="barcode" class="form-control" placeholder="Scan your id!">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Id Number</th>
                        <th>Name</th>
                        <th>Sex</th>
                        <th>Course/Year-Section</th>
                        <th>Department</th>
                        <th>Type</th>
                        <th>Date/TimeLogin</th>
                    </tr>
                </thead>
                <tbody>
                <?php
include 'connect.php'; // Include the database connection file
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['barcode'])) {
    $barcode = mysqli_real_escape_string($conn, $_POST['barcode']);

    // Check in the 'student' table
    $query_check_student = "SELECT * FROM student WHERE student_no = '$barcode'";
    $result_check_student = mysqli_query($conn, $query_check_student);

    // Check in the 'faculty_visitor' table
    $query_check_faculty_visitor = "SELECT * FROM faculty_visitor WHERE faculty_no = '$barcode'";
    $result_check_faculty_visitor = mysqli_query($conn, $query_check_faculty_visitor);

    // Check in the 'visitant' table
    $query_check_visitant = "SELECT * FROM visitant WHERE barcode_id = '$barcode'";
    $result_check_visitant = mysqli_query($conn, $query_check_visitant);

    // Determine which table the barcode belongs to and fetch details
    if ($result_check_student && mysqli_num_rows($result_check_student) > 0) {
        $row = mysqli_fetch_assoc($result_check_student);
    } elseif ($result_check_faculty_visitor && mysqli_num_rows($result_check_faculty_visitor) > 0) {
        $row = mysqli_fetch_assoc($result_check_faculty_visitor);
    } elseif ($result_check_visitant && mysqli_num_rows($result_check_visitant) > 0) {
        $row = mysqli_fetch_assoc($result_check_visitant);
    } else {
        $error = "ID Number not found. Please enroll first.";
        echo '<tr><td colspan="8" style="text-align: center;"><h1 class="error">' . $error . '</h1></td></tr>';
    }

    // If a record is found, log attendance
    if (isset($row)) {
        $attendance_id = isset($row['student_no']) ? $row['student_no'] : '';
        $faculty_no = isset($row['faculty_no']) ? $row['faculty_no'] : '';
        $barcode_id = isset($row['barcode_id']) ? $row['barcode_id'] : '';
        $name = isset($row['name']) ? $row['name'] : '';
        $sex = isset($row['sex']) ? $row['sex'] : '';
        $course_section = isset($row['course_section']) ? $row['course_section'] : '';
        $department = isset($row['department']) ? $row['department'] : '';
        $type = isset($row['type']) ? $row['type'] : '';
        $datereg = isset($row['date_added']) ? $row['date_added'] : '';

        // Insert or update attendance in 'attendance' table
        $query_insert_attendance = "REPLACE INTO attendance (attendance_id, faculty_no, barcode_id, name, sex, course_section, department, type, datereg) ";
        $query_insert_attendance .= "VALUES ('$attendance_id', '$faculty_no', '$barcode_id', '$name', '$sex', '$course_section', '$department', '$type', '$datereg')";
        mysqli_query($conn, $query_insert_attendance);

        // Display the retrieved data in the table
        echo "<tr>
                <td>1</td>
                <td>$attendance_id  $faculty_no $barcode_id</td>
                <td>$name</td>
                <td>$sex</td>
                <td>$course_section</td>
                <td>$department</td>
                <td>$type</td>
                <td>$datereg</td>
              </tr>";
    }
}
?>

                </tbody>
            </table>
        </form>
    </div>
</body>
</html>
