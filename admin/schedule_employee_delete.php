<?php
include 'includes/session.php';

if(isset($_POST['employees'])){
    $employeeIds = $_POST['employees'];
	// if(empty($employeeIds) == true){
	// 	$_SESSION['error'] =  "NOT WOKTINGINNGINGIGNG";
	// 	header('location: schedule_employee.php');
	// 	exit();
	// }

    foreach ($employeeIds as $id) {
        $sql = "DELETE FROM ass_sched_fin WHERE id = $id";
		if($conn->query($sql)){
				// Update assigned_status in employees table
				// $sql_status = "UPDATE employees SET assigned_status='0' WHERE id=?";
				// $stmt_status = $conn->prepare($sql_status);
				// $stmt_status->bind_param("i", $id);
				// $result_status = $stmt_status->execute();
				// if ($result_status === false) {
				// 	$success = false;
				// 	error_log("Error updating assigned_status for employee ID $id: " . $stmt_status->error);
				// 	$_SESSION['error'] =  $stmt_status->error;
				// 	header('location: schedule_employee.php');
				// 	exit();
           		//  }
				$result = 'Employee unassigned';
		}
		else{
			$result = $conn->error;
		}
    }
} else {
    $result = "No employee IDs received";
}
echo $result;
?>
