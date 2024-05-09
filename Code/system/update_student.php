<?php
	require_once 'connect.php';
	if(ISSET($_POST['edit_student'])){	
		$student_no = $_POST['student_no'];
		$name = $_POST['name'];
		$sex = $_POST['sex'];
		$course_section = $_POST['course_section'];
		$department = $_POST['department'];


		
			$conn->query("UPDATE `student` SET `student_no` = '$student_no', `name` = '$name', `sex` = '$sex', `course_section` = '$course_section', `department` = '$department' WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Save Changes");
			
				</script>
			';
			header('Location: student.php');
			
		}
		