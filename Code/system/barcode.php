<?php
if (isset($_POST['barcode'])) {
    include 'connect.php'; 
    $barcode = mysqli_real_escape_string($conn, $_POST['barcode']);

    $query_check_student = "SELECT * FROM student WHERE student_no = '$barcode'";
    $result_check_student = mysqli_query($conn, $query_check_student);

    $query_check_faculty_visitor = "SELECT * FROM faculty_visitor WHERE faculty_no = '$barcode'";
    $result_check_faculty_visitor = mysqli_query($conn, $query_check_faculty_visitor);

    $query_check_visitant = "SELECT * FROM visitant WHERE barcode_id = '$barcode'";
    $result_check_visitant = mysqli_query($conn, $query_check_visitant);

    if ($result_check_student && mysqli_num_rows($result_check_student) > 0) {
        $data = mysqli_fetch_assoc($result_check_student);
    } elseif ($result_check_faculty_visitor && mysqli_num_rows($result_check_faculty_visitor) > 0) {
        $data = mysqli_fetch_assoc($result_check_faculty_visitor);
    } elseif ($result_check_visitant && mysqli_num_rows($result_check_visitant) > 0) {
        $data = mysqli_fetch_assoc($result_check_visitant);
    } else {
        echo "Barcode not found";
    }

    if (isset($data)) {
        $barcode_id = isset($data['student_no']) ? $data['student_no'] : (isset($data['faculty_no']) ? $data['faculty_no'] : $data['barcode_id']);
        $name = $data['name'];
        $sex = $data['sex'];
        $course_section = isset($data['course_section']) ? $data['course_section'] : '';
        $department = isset($data['department']) ? $data['department'] : ''; // Corrected variable name
        $type = isset($data['type']) ? $data['type'] : '';

        $query_insert_barcode = "INSERT INTO barcode (barcode_id, faculty_no, name, sex, course_section, department, type, datereg) VALUES ";
        $query_insert_barcode .= "('$barcode_id', 'faculty_no', '$name', '$sex', '$course_section', '$department', '$type', NOW())";
        $result_insert_barcode = mysqli_query($conn, $query_insert_barcode);

        if ($result_insert_barcode) {
            echo "Login Successful";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
