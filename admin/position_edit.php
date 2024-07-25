<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		$base_pay = $_POST['base_pay'];
		$rate = $_POST['rate'];
		$edit_leave_credits = $_POST['edit_leave_credits'];

		$sql = "UPDATE position SET description = '$title', base_pay = '$base_pay', rate = '$rate', leave_credits = '$edit_leave_credits' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Position updated successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "Position variable edited by: $user. Position: $title. Salary: $rate";
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