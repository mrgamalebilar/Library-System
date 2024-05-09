<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `students_report` WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error());
	header('location: students_report.php');