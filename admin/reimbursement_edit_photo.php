<?php
	include 'includes/session.php';

	if(isset($_POST['upload'])){
		$empid = $_POST['id'];
		$filename = $_FILES['edit-photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['edit-photo']['tmp_name'], 'reimbursement/'.$filename);	
		}
		
		$sql = "UPDATE employee_financial_list SET reimbursement_proof = '$filename' WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee photo updated successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "Employee photo edited by: $user. Photo: $filename";
			$audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
			$conn->query($audit_sql);
			// Adding audit trail
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select employee to update photo first';
	}
	header('location: reimbursement.php');
?>