<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$amount = $_POST['amount'];
		$employee_id = $_POST['employee_id'];
		$balance = $_POST['balance'];
		$pay = $_POST['edit-pay-per-cut-off'];
		
		$sql = "INSERT INTO cashadvance (amount, pay_per_cut_off, employee_id, balance, date_advance) VALUES ('$amount', '$pay', '$employee_id', '$balance', CURDATE())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Cash advance updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:cashadvance.php');

?>
