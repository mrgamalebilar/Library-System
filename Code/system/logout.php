<?php
	session_start();
	unset($_SESSION['admin_id']);
	unset($_SESSION['stuff_id']);
	header('location: login.php');
?>
