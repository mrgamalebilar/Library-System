<!DOCTYPE html>

<?php
session_start();
if(isset($_SESSION['admin_id']) || isset($_SESSION['stuff_id'])){
    header('location: home.php');
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Login.css">
    <title>Login</title>
</head>
<body>
<?php include 'header.php'; ?>
    <div class="login-box">
        <div class="login-header">
            <p style="text-align: center; margin: 10px 0 20px 0; font-size: 25px;">Please Login</p>
        </div>
        <div class="input-box">
            <input type="text" id="username" class="input-field" placeholder="Username" autocomplete="off" required>
        </div>
        <div class="input-box">
            <input type="password" id="password" class="input-field" placeholder="Password" autocomplete="off" required>
        </div>
        <div class="input-submit">
            <button class="submit-btn" id="submit"></button>
            <label for="submit" style="color: white;">LOGIN</label>
        </div>
        <div id="result"></div> 
        <div id="username_warning" class="has-error has-feedback"></div> 
        <div id="password_warning" class="has-error has-feedback"></div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/Logins.js"></script>
</body>
</html>
