<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <?php include 'top_bar.php'; ?>
    <link rel="stylesheet" href="css/edit_admins.css">
</head>
<body>
    <?php
        require_once 'connect.php';
        $qupdate_student = $conn->query("SELECT * FROM `student` WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error());
        $fupdate_student = $qupdate_student->fetch_array();
    ?>
    <div class="container">
        <form method="POST" action="update_student.php?student_id=<?php echo $fupdate_student['student_id']?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="barcode_id">Barcode Id:</label>
                <input type="text" value="<?php echo $fupdate_student['student_no']?>" required="required" name="student_no" id="student_no">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" value="<?php echo $fupdate_student['name']?>" name="name" required="required" id="name">
            </div>
            <div class="form-group">
                <label for="Sex">Sex:</label>
                <input type="text" value="<?php echo $fupdate_student['sex']?>" required="required" name="sex" id="sex">
            </div>
            <div class="form-group">
                <label for="Course">Course/Year-Section:</label>
                <input type="text" value="<?php echo $fupdate_student['course_section']?>" required="required" name="course_section" id="course_section">
            </div>
            <div class="form-group">
            <label for="department">Department:</label>
                <input type="text" value="<?php echo $fupdate_student['department']?>" required="required" name="department" id="department">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-warning" name="edit_student" value="Save Changes">
                <a href="student.php" class="btn btn-back">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
