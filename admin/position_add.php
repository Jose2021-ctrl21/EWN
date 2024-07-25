<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$title = strtolower($_POST['title']);
		$base_pay = strtolower($_POST['base_pay']);
		$leave_credits = strtolower($_POST['leave_credits']);
		$rate = strtolower($_POST['rate']);

		// Prepare and execute statement to check for existing position and rate
		$sql_pos = "SELECT * FROM position WHERE rate = ? AND description = ?";
		$stmt = $conn->prepare($sql_pos);
		$stmt->bind_param("ss", $rate, $title);
		$stmt->execute();
		$result = $stmt->get_result();

		// Check if there is a matching position and rate
		if ($result->num_rows > 0) {
			$_SESSION['error'] = 'It will not be saved because there is an existing row with the same position and rate';
			header('location: position.php');
			exit();
		}

		$sql = "INSERT INTO position (description, base_pay, leave_credits, rate) VALUES ('$title', '$base_pay', '$leave_credits', '$rate')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Position added successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "Position variable added by: $user. Position: $title. Salary: $rate";
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

	header('location: position.php');

?>