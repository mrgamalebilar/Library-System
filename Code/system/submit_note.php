<?php
include "connect.php";

// Initialize variable for error message
$error_message = "";

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $note = $conn->real_escape_string($_POST['note']);
    
    // Check if the note is empty
    if (empty($note)) {
        $error_message = "Please input a note first!";
    } else {
        // Check if there are existing notes in the database
        $sql_check = "SELECT * FROM note";
        $result_check = $conn->query($sql_check);
        
        if ($result_check->num_rows > 0) {
            // If there are existing notes, update the first one
            $row = $result_check->fetch_assoc();
            $note_id = $row['id'];
            $sql = "UPDATE note SET note='$note' WHERE id='$note_id'";
        } else {
            // If there are no existing notes, insert the new note
            $sql = "INSERT INTO note (note) VALUES ('$note')";
        }

        if ($conn->query($sql) === TRUE) {
            // Note added or updated successfully
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Retrieve notes from database
$sql = "SELECT * FROM note";
$result = $conn->query($sql);

$notes = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $notes[] = $row['note'];
    }
}
$conn->close();
?>

<?php include "top_bar.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Note</title>
    <link rel="stylesheet" href="css/submit_note.css">
</head>
<body>
<div class="header">
    <label for="note-input" class="input-label">What's on your mind?</label>
    <img src="images/brain.png" alt="Profile Picture" class="profile-picture">
</div>

    <div class="note-box">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <textarea name="note" rows="4" placeholder="Enter your note maximum of 200 letters"></textarea>
            <button type="submit" name="submit">Save Note</button>
            <a href="home.php" class="btn btn-back">Back</a>
        </form>
        <br></br>
        <span class="error-message"><?php echo $error_message; ?></span>
        <?php foreach ($notes as $note) : ?>
            <div class="note"><?php echo $note; ?>
                <a href="delete_note.php?id=<?php echo $note['id']; ?>" class="delete-button">Delete</a>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
        var deleteButtons = document.querySelectorAll('.delete-button');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior
                var confirmation = confirm("Are you sure you want to delete this note?");
                if (confirmation) {
                    window.location.href = this.getAttribute('href');
                }
            });
        });
    </script>
</body>
</html>
