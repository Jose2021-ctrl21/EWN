<?php
	include 'includes/session.php';

	if(isset($_POST['edit_bp'])){
		$id = $_POST['id'];
		$edit_base_pay = $_POST['edit_base_pay'];

		$sql = "UPDATE base_pay SET base_pay = '$edit_base_pay' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Base pay updated successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "base_pay variable edited by: $user. base_pay: $edit_base_pay. id: $rate";
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

	header('location:position.php');

?>