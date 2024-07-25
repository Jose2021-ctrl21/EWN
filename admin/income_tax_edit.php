<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['tax-id'];
		$editFirstBracket = $_POST['edit-first-bracket'];
		$editSecondBracket = $_POST['edit-second-bracket'];
		$taxRate = $_POST['edit-tax-rate'];
		
		$sql = "UPDATE income_tax SET first_bracket = '$editFirstBracket', second_bracket = '$editSecondBracket', tax_rate = '$taxRate' WHERE id = $id";
		if($conn->query($sql)){
			$_SESSION['success'] = 'updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:deduction.php');

?>