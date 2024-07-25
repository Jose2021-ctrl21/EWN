<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['delete-id'];
		$sql = "DELETE FROM income_tax WHERE id = $id";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: deduction.php');
?>