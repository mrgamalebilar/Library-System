<!DOCTYPE html>
<?php include 'top_bar.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Students</title>
    <link rel="stylesheet" href="css/import_students.css"> 
</head>
<body>
    <div class="center">
        <div class="form-container">
            <form class="" action="" method="post" enctype="multipart/form-data">
                <input type="file" name="excel" required value="">
                <button type="submit" name="import" class="import-btn">Import</button>
                <button type="button" onclick="goBack()" class="cancel-btn">Cancel</button>
            </form>
        </div>
    </div>

    <?php

include "connect.php";

if(isset($_POST["import"])) {

    $fileName = $_FILES["excel"]["name"];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

    $targetDirectory = "importedStudent/" . $newFileName;
    move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

    require 'excelReader/excel_reader2.php';
    require 'excelReader/SpreadsheetReader.php';

    $reader = new SpreadsheetReader($targetDirectory);

    foreach($reader as $key => $row) {
        $barcode_id = mysqli_real_escape_string($conn, $row[0]);
        $name = mysqli_real_escape_string($conn, $row[1]);
        $sex = mysqli_real_escape_string($conn, $row[2]);
        $course_section = mysqli_real_escape_string($conn, $row[3]);
        $department = mysqli_real_escape_string($conn, $row[4]);
        $type = mysqli_real_escape_string($conn, $row[5]);

        // Insert into student database
        $sql_student = "INSERT INTO student (student_no, name, sex, course_section, department, type, date_added)
                VALUES ('$barcode_id', '$name', '$sex', '$course_section', '$department', '$type', NOW())";
        mysqli_query($conn, $sql_student);

        // Insert into students_report database
        $sql_report = "INSERT INTO students_report (student_no, name, sex, course_section, department, type, date_added)
                VALUES ('$barcode_id', '$name', '$sex', '$course_section', '$department', '$type', NOW())";
        mysqli_query($conn, $sql_report);
    }

    mysqli_close($conn);

    echo "<script>
            alert('Students Successfully Imported');
            window.location.href = 'student.php'; // Redirect to the desired page after import
          </script>";
}
?>


    <script>
        // JavaScript function to go back to student.php when the Cancel button is clicked
        function goBack() {
            window.location.href = 'student.php';
        }
    </script>
</body>
</html>
