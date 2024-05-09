<?php
    require_once 'connect.php';
    $conn->query("TRUNCATE TABLE `student`") or die(mysqli_error());
    $conn->close();
    header('location: student.php');
    exit;
?>