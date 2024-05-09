<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Faculty</title>
    <?php include 'top_bar.php'; ?>
    <link rel="stylesheet" href="css/edit_admins.css">
</head>
<body>
    <?php
    require_once 'connect.php';

    // Check if faculty_id is provided in the URL
    if(isset($_REQUEST['faculty_id'])) {
        // Retrieve faculty data based on the faculty_id
        $faculty_id = $_REQUEST['faculty_id'];
        $qupdate_faculty = $conn->query("SELECT * FROM `faculty_visitor` WHERE `faculty_id` = '$faculty_id'") or die(mysqli_error($conn));

        // Check if data is found for the provided faculty_id
        if($qupdate_faculty && $qupdate_faculty->num_rows > 0) {
            $fupdate_faculty = $qupdate_faculty->fetch_array();
        } else {
            // Faculty data not found
            echo "Faculty data not found for the provided ID.";
            exit; // Stop further execution
        }
    } else {
        // faculty_id not provided
        echo "Faculty ID not provided.";
        exit; // Stop further execution
    }
    ?>
    <div class="container">
        <form method="POST" action="update_faculty_visitor.php?faculty_id=<?php echo $fupdate_faculty['faculty_id']?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="faculty_no">Barcode Id:</label>
                <input type="text" value="<?php echo $fupdate_faculty['faculty_no']?>" required="required" name="faculty_no" id="faculty_no">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" value="<?php echo $fupdate_faculty['name']?>" name="name" required="required" id="name">
            </div>
            <div class="form-group">
                <label for="sex">Sex:</label>
                <input type="text" value="<?php echo $fupdate_faculty['sex']?>" required="required" name="sex" id="sex">
            </div>
            <div class="form-group">
    <label for="type" style="display: block; margin-bottom: 5px;">Type:</label>
    <select name="type" id="type" required style="padding: 8px; border-radius: 5px; border: 1px solid #ccc; width: 30%; transition: border-color 0.3s;">
        <option value="">Select Type</option>
        <option value="faculty" <?php if ($fupdate_faculty['type'] == 'faculty') echo 'selected'; ?>>Faculty</option>
        <option value="visitor" <?php if ($fupdate_faculty['type'] == 'visitor') echo 'selected'; ?>>Visitor</option>
        <option value="guest" <?php if ($fupdate_faculty['type'] == 'guest') echo 'selected'; ?>>Guest</option>
        <option value="student from other school" <?php if ($fupdate_faculty['type'] == 'student from other school') echo 'selected'; ?>>Student from other school</option>
    </select>
</div>



            <div class="form-group">
                <input type="submit" class="btn btn-warning" name="edit_faculty_visitor" value="Save Changes">
                <a href="faculty_visitor.php" class="btn btn-back">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
