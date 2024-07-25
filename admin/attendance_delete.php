<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM attendance WHERE id = $id";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Attendance deleted successfully';
			
				// audit trail
			  $user = $_SESSION['username'];
			  $audit_description = "Deduction added by user: $user. Description: $description. Amount: $amount.";
			  $audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
			  $conn->query($audit_sql);
				// audit trail

				//delete also row in employee financial list
				$employee_id = $_POST['employee_id'];
				$date = $_POST['date'];
				$sql_fl = "DELETE FROM employee_financial_list WHERE employee_id = '$employee_id' AND date = '$date'";
				$conn->query($sql_fl);

		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}
	echo $id;
	header('location: attendance.php');
?>