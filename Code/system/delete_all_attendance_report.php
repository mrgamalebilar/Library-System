<?php
    require_once 'connect.php';

    if(isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
       
        $conn->query("TRUNCATE TABLE `barcode`") or die(mysqli_error());
        $conn->close();
        header('location: attendance_report.php');
        exit;
    }

    echo '<script>
            if(confirm("Are you sure you want to delete all records?")) {
                window.location.href = "delete_all_attendance_report.php?confirm=true";
            } else {
                window.location.href = "attendance_report.php"; // Redirect back to the report
            }
          </script>';
?>
