<!DOCTYPE html>
<?php include 'restriction.php';
include 'barcode.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Home Page</title>
</head>
<body>

    <header>
        <div class="logo">
            <img src="images/bisu logo.png" alt="Logo" width="100" height="100">
        </div>
        <div class="text">
        <h1 style="font-size: 20px; margin-right: 120px;">BOHOL ISLAND STATE UNIVERSITY</h1>
        <h1 style="font-size: 15px; margin-right: 120px;">BILAR CAMPUS LIBRARY</h1>

        </div>
        <div class="button">
            <a href="home.php">Home</a>
        </div>

        <div class="button accounts">
					<?php if(!$hideAccountsButton) { ?>
            <a href="">Accounts</a>

            <div class="dropdown">
                <a href="admin.php">Admin</a>
                <a href="stuff.php">Staff</a>
                <a href="faculty_visitor.php">Faculty/Visitors</a>
                     <?php } ?>
                <a href="student.php">Student</a>
            </div>

        </div>
        <div class="button">
            <a href="dashboard.php">Dashboard</a>
        </div>
        <div class="button attendance">
            <a href="attendance.php">Attendance</a>
        </div>
        </div>

        <div class="button">
            <a href="book.php">Book</a>
        </div>
        <div class="button transaction">
            <a href="#">Transaction</a>
            <div class="dropdown">
                <a href="borrow.php">Borrow Books</a>
                <a href="return.php">Return Books</a>
                <a href="penalty.php">Penalties</a>
            </div>
        </div>
        <div class="button settings">
            <a href="#">Settings</a>
            <div class="dropdown">
        <a href="confirmation_logout.php">Logout</a>
                    </div>
        </div>
    </header>
</body>
</html>
