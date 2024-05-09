<?php
require_once 'connect.php';

// Delete data from the borrowed table based on the provided ID
$conn->query("DELETE FROM `borrowed` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());

// Redirect to return.php
header('location: return.php');
?>
