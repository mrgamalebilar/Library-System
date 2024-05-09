<?php
    require_once 'connect.php';

    if(isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
        
        $conn->query("TRUNCATE TABLE `borrow`") or die(mysqli_error());
        $conn->close();
        header('location: borrowed_report.php');
        exit;
    }

   
    echo '<script>
            if(confirm("Are you sure you want to delete all records?")) {
                window.location.href = "delete_all_borrowed_report.php?confirm=true";
            } else {
                window.location.href = "borrowed_report.php"; // Redirect back to the report
            }
          </script>';
?>
