<?php
    require_once 'connect.php';
    $conn->query("TRUNCATE TABLE `faculty_visitor_report`") or die(mysqli_error());
    $conn->close();
    header('location: faculty_visitor_report.php');
    exit;
?>