<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['reimbursement_id'];
		$mealAllowanceEdit = (float)$_POST['meal-allowance-edit'];
		$adjustmentsEdit = (float)$_POST['adjustments-edit'];
		$transpoEdit = (float)$_POST['transpo-edit'];
		$mealAllowanceEditAdditional = (float)$_POST['meal-allowance-edit-additional'];
		// $adjustmentsEditAdditional = $_POST['adjustments-edit-additional'];
		$transpoEditAdditional = (float)$_POST['transpo-edit-additional'];

		$mealAllowanceEdit += $mealAllowanceEditAdditional;
		$adjustmentsEdit += $adjustmentsEditAdditional;
		$transpoEdit += $transpoEditAdditional;
	
		$sql = "UPDATE employee_financial_list SET adjustments = '$adjustmentsEdit', transportation = '$transpoEdit', meal_allowance = '$mealAllowanceEdit', transportation_additional = '$transpoEditAdditional', meal_allowance_additional = '$mealAllowanceEditAdditional'
		WHERE id = '$id'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Reimbursement updated successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "Reimbursement edited by: $user. id: $id. Meal allowance: $mealAllowanceEdit adjustment: $adjustmentsEdit Transportation: $transpoEdit ";
			$audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
			$conn->query($audit_sql);
			// Adding audit trail
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select Reimbursement to edit first';
	}
	header('location: reimbursement.php');
?>