<?php
	$conn = new mysqli('localhost', 'root', '', 'thesis') or die(mysqli_error());
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}