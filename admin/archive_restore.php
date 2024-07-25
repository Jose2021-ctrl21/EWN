<?php
	include 'includes/session.php';

	if(isset($_POST['restore'])){
		$id = $_POST['id'];
		$sql = "UPDATE employees SET archive ='no' WHERE id = $id";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee archive successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "Employee restored by: $user. Employee id: $id";
			$audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
			$conn->query($audit_sql);
			// Adding audit trail
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to restore first';
	}
	header('location: archive.php');
?>