<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$description = $_POST['description'];
		$employeerContribution = $_POST['employeer-contribution'];
		$employeeContribution = $_POST['employee-contribution'];

		$sql = "INSERT INTO deductions (description, employeer_contribution, employee_contribution) VALUES ('$description', '$employeerContribution', '$employeeContribution')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Deduction added successfully';
			
			  // Adding audit trail
			  $user = $_SESSION['username'];
			  $audit_description = "Deduction added by user: $user. Description: $description. employeerContribution: $employeerContribution.";
			  $audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
			  $conn->query($audit_sql);
			  // Adding audit trail

		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: deduction.php');

?>