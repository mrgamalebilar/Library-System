<?php
$book_title = $_GET['book_title'];
$author = $_GET['author'];
$call_num = $_GET['call_num'];
$accession_num = $_GET['accession_num'];
$published_date = $_GET['published_date'];
?>
<?php include "top_bar.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
    <link rel="stylesheet" href="css/borrow_book.css">
</head>
<body>

    <form action="borrow_book_process.php" method="post" class="borrow-form">
        <h5>TRANSACTION - BORROWING</h5>
        <style>
    ::placeholder {
        color: red;
    }
</style>

<div class="form-group">
    <label for="student_id">Student Barcode No:</label>
    <input type="text" id="student_id" name="student_id" placeholder="Non-Student borrower? Just input a unique number!" required>
</div>


        <div class="form-group">
            <label for="name">Student Name:</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="sex">Sex:</label>
            <input type="text" id="sex" name="sex" required>
        </div>

        <div class="form-group">
            <label for="course_section">Course/Section:</label>
            <input type="text" id="course_section" name="course_section" required>
        </div>

        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" id="department" name="department" required>
        </div>

        <div class="form-group">
            <label for="book_title">Book Title:</label>
            <input type="text" id="book_title" name="book_title" value="<?php echo $book_title; ?>" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" value="<?php echo $author; ?>" required>
        </div>

        <div class="form-group">
            <label for="call_num">Call Number:</label>
            <input type="text" id="call_num" name="call_num" value="<?php echo $call_num; ?>" required>
        </div>

        <div class="form-group">
            <label for="accession_num">Accession Number:</label>
            <input type="text" id="accession_num" name="accession_num" value="<?php echo $accession_num; ?>" required>
        </div>

        <div class="form-group">
            <label for="published_date">Published Date:</label>
            <input type="text" id="published_date" name="published_date" value="<?php echo $published_date; ?>" required>
        </div>

        <div class="form-group">
            <label for="date_return">Date to be Return:</label>
            <input type="date" id="date_return" name="date_return" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Borrow Book" class="btn-submit">
            <a href="book.php" class="btn-back">Cancel</a>
        </div>
    </form>
</body>
</html>
