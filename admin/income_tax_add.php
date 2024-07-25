<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$firstBracket = $_POST['first-bracket'];
		$secondBracket = $_POST['second-bracket'];
		$taxRate = $_POST['tax-rate'];

			$sql = "INSERT INTO income_tax (first_bracket, second_bracket, tax_rate) VALUES ('$firstBracket','$secondBracket', '$taxRate')";
			if($conn->query($sql)){
				$_SESSION['success'] = 'Tax range added successfully';
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}

	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: deduction.php');

?>