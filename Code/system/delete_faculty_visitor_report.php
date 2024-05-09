<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `faculty_visitor_report` WHERE `faculty_id` = '$_REQUEST[faculty_id]'") or die(mysqli_error());
	header('location: faculty_visitor_report.php');