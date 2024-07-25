<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$employee = $_POST['employee'];
		$amount = $_POST['amount'];
		$numberOffCutoffs = $_POST['number-of-cutoffs'];
		// $payPerCutOff = $_POST['pay-per-cut-off'];

		$sql = "SELECT * FROM employees WHERE employee_id = '$employee' AND archive='no'";
		$query = $conn->query($sql);
		if($query->num_rows < 1){
			$_SESSION['error'] = 'Employee not found';
			header('location: cashadvance.php');
			exit();
		}
		else{
			// $sql_cash = "SELECT *, cashadvance.id AS caid, employees.employee_id AS empid 
			// FROM cashadvance 
			// LEFT JOIN employees ON employees.id=cashadvance.empid
			// WHERE cashadvance.employee_id = '$employee' AND cashadvance.balance != '0' AND employees.archive = 'no'
			// ORDER BY date_advance DESC";
			// $query_cash = $conn->query($sql_cash);
			// if($query_cash->num_rows > 0){
			// 	$_SESSION['error'] = 'Invalid. Cannot be duplicated';
			// 	header('location: cashadvance.php');
			// 	exit();
			// }
			$lastCashAdvance = 0.0;
			$lastNumberOfCutoffs = 0;
			$payPerCutOff = 0;
			$sql_cash = "SELECT * FROM cashadvance 
			LEFT JOIN employees ON employees.employee_id = cashadvance.employee_id
			WHERE cashadvance.employee_id = '$employee' AND cashadvance.balance != '0' AND employees.archive = 'no' ORDER BY cashadvance.id DESC";
			$query_cash = $conn->query($sql_cash);
			if($query_cash->num_rows > 0){
				$row_cash = $query_cash->fetch_assoc();
				$lastCashAdvance = (float)$row_cash['amount'];
				$lastNumberOfCutoffs = (int)$row_cash['number_of_cutoffs'];
			}
			$amount += $lastCashAdvance;
			$numberOffCutoffs += $lastNumberOfCutoffs;
			$payPerCutOff = $amount/$numberOffCutoffs;

			// echo $amount;
			// exit();
			$row = $query->fetch_assoc();
			$employee_id = $row['id'];
			$sql = "INSERT INTO cashadvance (employee_id, date_advance, amount, balance, number_of_cutoffs, pay_per_cut_off) VALUES ('$employee', CURDATE(), '$amount', '$amount','$numberOffCutoffs','$payPerCutOff')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Cash Advance added successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: cashadvance.php');

?>