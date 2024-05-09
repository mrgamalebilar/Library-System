<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `books` WHERE `book_id` = '$_REQUEST[book_id]'") or die(mysqli_error());
	header('location: book.php');