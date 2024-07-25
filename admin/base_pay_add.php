<?php
	include 'includes/session.php';

	if(isset($_POST['add_bp'])){
		$base_pay = $_POST['base_pay'];

		// Prepare and execute statement to check for existing position and base_pay
		$sql_base = "SELECT * FROM base_pay WHERE base_pay = ?";
		$stmt = $conn->prepare($sql_base);
		$stmt->bind_param("s", $base_pay);
		$stmt->execute();
		$result = $stmt->get_result();

		// Check if there is a matching position and rate
		if ($result->num_rows > 0) {
			$_SESSION['error'] = 'It will not be saved because there is an existing row with the same base pay';
			header('location: position.php');
			exit();
		}


		$sql = "INSERT INTO base_pay (base_pay) VALUES ('$base_pay')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'base_pay added successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "base_pay variable added by: $user. Basepay: $base_pay";
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