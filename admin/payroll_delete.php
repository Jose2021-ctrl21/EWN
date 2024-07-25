<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM payroll_employee WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Payroll deleted successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "Payroll deleted by: $user. Position: $title. Salary: $rate. Position id: $id";
			$audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
			$conn->query($audit_sql);
			// Adding audit trail
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: payroll.php');
	
?>