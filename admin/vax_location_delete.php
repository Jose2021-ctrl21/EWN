<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$delLocid = $_POST['id'];
		$sql = "DELETE FROM location WHERE id = '$delLocid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: vax_location.php');
	
?>