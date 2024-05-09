<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `stuff` WHERE `stuff_id` = '$_REQUEST[stuff_id]'") or die(mysqli_error());
	header('location: stuff.php');