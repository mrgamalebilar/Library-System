
<?php include 'top_bar.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Logout Confirmation</title>
    <link rel="stylesheet" href="css/confirmation_logout.css">

	<script>
		function confirmLogout() {
				window.location.href = "logout.php";
		}
	</script>
</head>
<body>
	<div class="container">
		<div class="box">
			<h4>Confirmation</h4>
			<p class="red-text">Are you sure you want to logout?</p>
			<button class="buttons" onclick="confirmLogout()">Yes</button>
            <a href="home.php" class="btn-back">Cancel</a>
		</div>
	</div>
</body>
</html>
