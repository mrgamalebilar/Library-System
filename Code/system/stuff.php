<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'top_bar.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stuff Panel</title>
    <link rel="stylesheet" href="css/staffs.css">
</head>
<body>

    <div class="container">
        <h2>Staff Panel - User Management</h2>
        <!-- Form for adding users -->
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="middlename" placeholder="Middle Name">
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="submit" name="addStuff" value="Add Staff">
            
        </form>

        <?php
         include "connect.php";

        // Function to display users
        function displayUsers($conn) {
            $sql = "SELECT * FROM stuff";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Action</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    $hashedPassword = "*********";
                    echo "<tr>
                            <td>".$row["username"]."</td>
                            <td>".$hashedPassword."</td>
                            <td>".$row["firstname"]."</td>
                            <td>".$row["middlename"]."</td>
                            <td>".$row["lastname"]."</td>
                            <td><a href='delete_stuff.php?stuff_id=".$row['stuff_id']."'>Delete</a> | <a href='load_stuff.php?stuff_id=".$row['stuff_id']."' style='color: blue;'>Update</a>

                        </tr>";
                }
                echo "</table>";
            } else {
                echo "<span style='color: red;'>No staff account Added!</span>";
               
            }
        }

        // Adding a user
        if (isset($_POST['addStuff'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $firstname = $_POST['firstname'];
            $middlename = $_POST['middlename'];
            $lastname = $_POST['lastname'];
        
            $existingAdminQuery = "SELECT * FROM admin WHERE username = '$username'";
            $existingStuffQuery = "SELECT * FROM stuff WHERE username = '$username'";
        
            $existingAdminResult = $conn->query($existingAdminQuery);
            $existingStuffResult = $conn->query($existingStuffQuery);
        
            if ($existingAdminResult->num_rows > 0 || $existingStuffResult->num_rows > 0) {
                echo "<span style='color: red;'>Username already taken! Please try using another Username</span>";
            } else {
                $sql = "INSERT INTO stuff (username, password, firstname, middlename, lastname)
                        VALUES ('$username', '$password', '$firstname', '$middlename', '$lastname')";
        
                if ($conn->query($sql) === TRUE) {
                    echo "<span style='color: green;'>New record created successfully</span>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
          // Displaying users
        displayUsers($conn);

        $conn->close();
        ?>
    </div>
</body>
</html>
