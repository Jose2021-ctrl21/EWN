<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['employee-id-id'];

		$sched_id = $_POST['schedule-edit'];
		$editLocation = $_POST['location-edit'];
		$mealAllowanceEdit = $_POST['meal-allowance-edit'];
		$adjustmentsEdit = $_POST['adjustments-edit'];
		$transpoEdit = $_POST['transpo-edit'];


		$sql = "UPDATE ass_sched_fin SET ass_schedule = '$sched_id', ass_location = '$editLocation' , ass_meal_allowance = '$mealAllowanceEdit', ass_adjustments = '$adjustmentsEdit', ass_transpo = '$transpoEdit'
		WHERE ass_employee_id = '$empid' AND ass_schedule = '$sched_id'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select schedule to edit first';
	}
	header('location: schedule_employee.php');
?>