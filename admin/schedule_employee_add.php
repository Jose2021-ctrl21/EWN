<?php
// error_reporting(E_ALL);
	include 'includes/session.php';
	include 'includes/conn.php';
	if(isset($_POST['add'])){
        $addEmployeeId = $_POST['employee-id'];

		//check for exisiting employee
		$sql = "SELECT ass_employee_id FROM ass_sched_fin WHERE ass_employee_id_sc = '$addEmployeeId'";
		$query = $conn->query($sql);
		if($query->num_rows > 0){
			$_SESSION['error'] = 'There is an existing assigned employee. Please delete or edit it instead';
			header('location: schedule_employee.php');
			exit();
		}
		//Get ids
		$sql_id = "SELECT employees.id AS empid,
		position.id AS position_id
		FROM employees
		LEFT JOIN position ON employees.position_id = position.id
		WHERE employees.employee_id = '$addEmployeeId'";
		$query_id = $conn->query($sql_id);
		if($query_id->num_rows > 0){
			// Assuming $query_id is a valid MySQLi or PDO query result
			while ($row_id = $query_id->fetch_assoc()) {
				$empid = $row_id['empid'];
				$positionId = $row_id['position_id'];
				// var_dump($row_id);

				echo "$empid, --- $positionId";
			}
		}
		$time = date('H:i');
		$day = date('D');		
		$assignedLocation = $_POST['add-location'];
		$schedule = $_POST['add-schedule'];
		$assMealAllowance = $_POST['add-meal-allowance'];
		$assAdjustments = $_POST['add-adjustments'];
		$assTranspo = $_POST['add-transpo'];

		if(!isset($assignedLocation) && !isset($schedule)){
			$_SESSION['error'] = "Include assigning of location and schedule";
			header('location: schedule_employee.php');
			exit();
		}


		$sql = "INSERT INTO ass_sched_fin (ass_employee_id, ass_employee_id_sc, ass_location, ass_meal_allowance, ass_adjustments, ass_transpo, ass_position, ass_schedule, date_created, time, day) 
		VALUES ('$empid', '$addEmployeeId','$assignedLocation', '$assMealAllowance', '$assAdjustments', '$assTranspo','$positionId','$schedule',CURDATE(), '$time', '$day')";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Added successfully - '.$empid.' - '.$addEmployeeId;
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

		echo $addEmployeeId;
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: schedule_employee.php');
?>