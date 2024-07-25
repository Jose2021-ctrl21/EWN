<?php
	include 'includes/session.php';

	if(isset($_POST['delete_bp'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM base_pay WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Base pay deleted successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "base_pay variable deleted by: $user.  base_pay id: $id";
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

	header('location: position.php');
	
?>