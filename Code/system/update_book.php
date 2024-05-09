<?php
require_once 'connect.php';

if (isset($_POST['edit_books'])) {

    $book_id = $_REQUEST['book_id'];
    $book_title = isset($_POST['book_title']) ? $_POST['book_title'] : '';
    $author = isset($_POST['author']) ? $_POST['author'] : '';
    $call_num = isset($_POST['call_num']) ? $_POST['call_num'] : '';
    $accession_num = isset($_POST['accession_num']) ? $_POST['accession_num'] : '';
    $published_date = isset($_POST['published_date']) ? $_POST['published_date'] : '';
    $date_borrowed = date('Y-m-d H:i:s'); 

    
    if (empty($book_title) || empty($author) || empty($call_num) || empty($accession_num) || empty($published_date)) {
        echo "All fields are required.";
        exit();
    }

    $update_query = $conn->prepare("UPDATE `books` SET `book_title` = ?, `author` = ?, `call_num` = ?, `accession_num` = ?, `published_date` = ?, `date_added` = NOW() WHERE `book_id` = ?");
    
   
    if (!$update_query) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit();
    }

    $update_query->bind_param("sssssi", $book_title, $author, $call_num, $accession_num, $published_date, $book_id);

    if ($update_query->execute()) {
        echo '<script type="text/javascript">alert("Changes saved successfully");</script>';
        header('Location: book.php');
        exit();
    } else {
        echo "Error updating record: " . $update_query->error;
    }
}
?>
