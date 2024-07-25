<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM employee_financial_list WHERE id = $id";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Row in employee financial list deleted successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "Row in employee financial list variable deleted by: $user. Row in employee financial list: $title. Salary: $rate. Row in employee financiel list id: $id";
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

	header('location: financial_statement.php');
	
?>