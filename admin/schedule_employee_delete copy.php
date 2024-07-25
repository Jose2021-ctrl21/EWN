<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['employees'];
		// $sql = "DELETE FROM ass_sched_fin WHERE ass_employee_id = '$id'";
		// if($conn->query($sql)){
		// 		// Update assigned_status in employees table
		// 		$sql_status = "UPDATE employees SET assigned_status='0' WHERE id=?";
		// 		$stmt_status = $conn->prepare($sql_status);
		// 		$stmt_status->bind_param("i", $id);
		// 		$result_status = $stmt_status->execute();
		// 		if ($result_status === false) {
		// 			$success = false;
		// 			// Log error message
		// 			error_log("Error updating assigned_status for employee ID $id: " . $stmt_status->error);
		// 			$_SESSION['error'] =  $stmt_status->error;
		// 			header('location: schedule_employee.php');
		// 			exit();
        //    		 }
		// 		$_SESSION['success'] = 'Employee unassigned';
		// }
		// else{
		// 	$_SESSION['error'] = $conn->error;
		// }
		$_SESSION['error'] = 'THIS ID IS WORKING:'.$id;
echo $id;
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	// header('location: schedule_employee.php');
	
?>