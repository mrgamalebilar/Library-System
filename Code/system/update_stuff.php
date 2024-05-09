<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_stuff'])){	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		
			$conn->query("UPDATE `stuff` SET `username` = '$username', `password` = '$password', `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = '$lastname' WHERE `stuff_id` = '$_REQUEST[stuff_id]'") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Save Changes");
			
				</script>
			';
			header('Location: stuff.php');
			
		}
		