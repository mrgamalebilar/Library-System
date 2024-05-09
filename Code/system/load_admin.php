<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <?php include 'top_bar.php'; ?>
    <link rel="stylesheet" href="css/edit_admins.css">
</head>
<body>
    <?php
        require_once 'connect.php';
        $qupdate_admin = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
        $fupdate_admin = $qupdate_admin->fetch_array();
    ?>
    <div class="container">
        <form method="POST" action="update_admin.php?admin_id=<?php echo $fupdate_admin['admin_id']?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" value="<?php echo $fupdate_admin['username']?>" required="required" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" value="<?php echo $fupdate_admin['password']?>" maxlength="12" name="password" required="required" id="password">
            </div>
            <div class="form-group">
                <label for="firstname">Firstname:</label>
                <input type="text" value="<?php echo $fupdate_admin['firstname']?>" name="firstname" required="required" id="firstname">
            </div>
            <div class="form-group">
                <label for="middlename">Middlename:</label>
                <input type="text" value="<?php echo $fupdate_admin['middlename']?>" name="middlename" placeholder="(Optional)" id="middlename">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname:</label>
                <input type="text" value="<?php echo $fupdate_admin['lastname']?>" required="required" name="lastname" id="lastname">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" name="edit_admin" value="Save Changes">
                <a href="admin.php" class="btn btn-back">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
