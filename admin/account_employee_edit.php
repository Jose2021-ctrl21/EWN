<?php
	include 'includes/session.php';
	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$bankAccount = $_POST['edit-bank-account'];
		$gcash = $_POST['edit-gcash'];
		
		$sql = "UPDATE employees SET bank_account = '$bankAccount',gcash = '$gcash' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee account updated successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "Account employee edited by: $user. Bank Account: $bankAccount. Gcash: $gcash.";
			$audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
			$conn->query($audit_sql);
			// Adding audit trail
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}
	header('location:account_employee.php');
?>