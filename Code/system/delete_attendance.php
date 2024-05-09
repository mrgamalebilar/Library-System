<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `barcode` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	header('location: attendance_report.php');