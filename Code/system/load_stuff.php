<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Stuff</title>
    <?php include 'top_bar.php'; ?>
    <link rel="stylesheet" href="css/edit_admins.css">
</head>
<body>
    <?php
        require_once 'connect.php';
        $qupdate_stuff = $conn->query("SELECT * FROM `stuff` WHERE `stuff_id` = '$_REQUEST[stuff_id]'") or die(mysqli_error());
        $fupdate_stuff = $qupdate_stuff->fetch_array();
    ?>
    <div class="container">
        <form method="POST" action="update_stuff.php?stuff_id=<?php echo $fupdate_stuff['stuff_id']?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" value="<?php echo $fupdate_stuff['username']?>" required="required" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" value="<?php echo $fupdate_stuff['password']?>" maxlength="12" name="password" required="required" id="password">
            </div>
            <div class="form-group">
                <label for="firstname">Firstname:</label>
                <input type="text" value="<?php echo $fupdate_stuff['firstname']?>" name="firstname" required="required" id="firstname">
            </div>
            <div class="form-group">
                <label for="middlename">Middlename:</label>
                <input type="text" value="<?php echo $fupdate_stuff['middlename']?>" name="middlename" placeholder="(Optional)" id="middlename">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname:</label>
                <input type="text" value="<?php echo $fupdate_stuff['lastname']?>" required="required" name="lastname" id="lastname">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" name="edit_stuff" value="Save Changes">
                <a href="stuff.php" class="btn btn-back">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
