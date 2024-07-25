<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$date = $_POST['edit_date'];

		$sql = "UPDATE attendance SET date = '$date' WHERE employee_id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Attendance updated successfully';

			$sql = "SELECT * FROM attendance 
        LEFT JOIN employees 
        ON employees.id = attendance.employee_id  
        WHERE attendance.employee_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		$employeeID = $row['employee_id'];
		$name = $row['firstname'] . ' ' . $row['lastname']; // Concatenate first name and last name with a space

		// Adding audit trail
		$user = $name; // Using the concatenated name as the user
		$audit_description = "Signed in: $name. Employee id: $employeeID";
		$audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
		$conn->query($audit_sql);
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:attendance.php');

?>