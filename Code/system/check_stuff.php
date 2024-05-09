<?php
require_once 'connect.php';
$username = $_POST['username'];
$password = $_POST['password'];
$q_stuff = $conn->query("SELECT * FROM `stuff` WHERE BINARY `username` = '$username' AND BINARY `password` = '$password'") or die(mysqli_error());
$v_stuff = $q_stuff->num_rows;
if ($v_stuff > 0) {
    session_start();
    $f_stuff = $q_stuff->fetch_array();
    $_SESSION['stuff_id'] = $f_stuff['stuff_id'];
    echo 'Success';
} else {
    echo 'Error';
}
$conn->close();
?>
