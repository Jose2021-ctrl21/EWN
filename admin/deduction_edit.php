<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$description = $_POST['description'];
		$editEmployeerContribution = $_POST['edit-employeer-contribution'];
		$editEmployeeContribution = $_POST['edit-employee-contribution'];

		$sql = "UPDATE deductions SET description = '$description', employeer_contribution = '$editEmployeerContribution',  employee_contribution = '$editEmployeeContribution' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Deduction updated successfully';
			// edting audit trail
			$user = $_SESSION['username'];
			$audit_description = "Deduction edited by user: $user. Description: $description. employeer: $editEmployeerContribution. employee: $editEmployeeContribution.";
			$audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
			$conn->query($audit_sql);
			// edting audit trail
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:deduction.php');

?>