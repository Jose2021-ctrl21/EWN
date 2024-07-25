<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['employee-id-id'];

		$sql = "UPDATE ass_sched_fin SET ass_schedule = '$sched_id', ass_location = '$editLocation' , ass_meal_allowance = '$mealAllowanceEdit', ass_adjustments = '$adjustmentsEdit', ass_transpo = '$transpoEdit'
		WHERE ass_employee_id = '$empid'";

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
	header('location: salary_calculation.php');
?>