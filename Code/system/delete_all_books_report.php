<?php
    require_once 'connect.php';
    $conn->query("TRUNCATE TABLE `books_report`") or die(mysqli_error());
    $conn->close();
    header('location: books_report.php');
    exit;
?>