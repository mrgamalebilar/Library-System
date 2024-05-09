<?php
require_once 'connect.php';

function returnBook($id) {
    global $conn;

    $query = "SELECT * FROM `borrowed` WHERE `id` = '$id'";
    $result = $conn->query($query) or die(mysqli_error($conn)); 

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $studentId = $row['student_id'];
        $name = $row['name'];
        $sex = $row['sex'];
        $courseSection = $row['course_section'];
        $department = $row['department'];
        $bookTitle = $row['book_title'];
        $author = $row['author'];
        $callNum = $row['call_num'];
        $accessionNum = $row['accession_num'];
        $publishedDate = $row['published_date'];
        $date_return = $row['date_return'];
        $status = 'Returned';
        

        $insertQuery = "INSERT INTO `returned` 
                        (`student_id`, `name`, `sex`, `course_section`, `department`, `book_title`, `author`, `call_num`, `accession_num`, `published_date`, `date_return`, `status`, `returned_date`) 
                        VALUES 
                        ('$studentId', '$name', '$sex', '$courseSection', '$department', '$bookTitle', '$author', '$callNum', '$accessionNum', '$publishedDate', '$date_return', '$status', NOW())";
        $conn->query($insertQuery) or die(mysqli_error($conn));

        if ($conn->affected_rows > 0) {
            $updateQuery = "UPDATE `borrowed` SET `status` = 'Returned' WHERE `id` = '$id'";
            $conn->query($updateQuery) or die(mysqli_error($conn)); 
            
            if ($conn->affected_rows > 0) {
                return true; 
            }
        }
    }
    
    return false; 
}


$id = $_POST['id'];
if(returnBook($id)) {
    header('Location: return.php');
    exit;
} else {
    echo "Error returning the book.";
    // Redirect or display an error message as needed
}
?>
