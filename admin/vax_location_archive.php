<?php
	include 'includes/session.php';

	if(isset($_POST['archive'])){
		$locid = $_POST['id'];

		$sql = "UPDATE location SET location_archive = 'yes' WHERE id = '$locid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Position archived successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select Position to archive';
	}
	header('location: vax_location.php');
?>