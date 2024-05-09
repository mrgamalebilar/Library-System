<?php
    require_once 'connect.php';
    $conn->query("TRUNCATE TABLE `students_report`") or die(mysqli_error());
    $conn->close();
    header('location: students_report.php');
    exit;
?>