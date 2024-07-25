<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "UPDATE employees SET archive ='yes' WHERE id = $id";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee archive successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "Employee archive by: $user. Employee id: $id";
			$audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
			$conn->query($audit_sql);
			// Adding audit trail
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to archive first';
	}
	header('location: employee.php');
?>