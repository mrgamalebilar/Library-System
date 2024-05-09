<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Books</title>
    <?php include 'top_bar.php'; ?>
    <link rel="stylesheet" href="css/edit_admins.css">
</head>
<body>
    <?php
        require_once 'connect.php';
        $book_id = $conn->real_escape_string($_REQUEST['book_id']);
        $qupdate_books = $conn->query("SELECT * FROM `books` WHERE `book_id` = '$book_id'") or die(mysqli_error());        
        $fupdate_books = $qupdate_books->fetch_array();
    ?>
    <div class="container">
        <form method="POST" action="update_book.php?book_id=<?php echo $fupdate_books['book_id']?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="book_title">Book Title:</label>
                <input type="text" value="<?php echo $fupdate_books['book_title']?>" required="required" name="book_title" id="book_title">
            </div>
            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" value="<?php echo $fupdate_books['author']?>" name="author" placeholder="(Optional)" id="author">
            </div>
            <div class="form-group">
                <label for="call_num">Call Num:</label>
                <input type="text" value="<?php echo $fupdate_books['call_num']?>" name="call_num" placeholder="(Optional)" id="call_num">
            </div>
            <div class="form-group">
                <label for="accession_num">Accession Num:</label>
                <input type="text" value="<?php echo $fupdate_books['accession_num']?>" name="accession_num" placeholder="(Optional)" id="accession_num">
            </div>
            <div class="form-group">
                <label for="published_date">Published Date:</label>
                <input type="text" value="<?php echo $fupdate_books['published_date']?>" required="required" name="published_date" id="published_date">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-warning" name="edit_books" value="Save Changes">
                <a href="book.php" class="btn btn-back">Back</a>
            </div>
        </form>
    </div>
</body>
</html>
