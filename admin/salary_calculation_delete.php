<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM salary_calculation WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Row has been deleted'.$id;
				// audit trail
			  $user = $_SESSION['username'];
			  $audit_description = "Deduction added by user: $user. Description: $description. Amount: $amount.";
			  $audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
			  $conn->query($audit_sql);
				// audit trail
			  
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: salary_calculation.php');
	
?>