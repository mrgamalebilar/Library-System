<?php
    require_once 'connect.php';
    $conn->query("TRUNCATE TABLE `faculty_visitor`") or die(mysqli_error());
    $conn->close();
    header('location: faculty_visitor.php');
    exit;
?>