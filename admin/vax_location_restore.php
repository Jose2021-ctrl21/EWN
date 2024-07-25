<?php
	include 'includes/session.php';

	if(isset($_POST['restore'])){
		$locid = $_POST['id'];

		$sql = "UPDATE location SET location_archive = 'no' WHERE id = '$locid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Position restored successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select Position to restore';
	}
	header('location: archive_vax_location.php');
?>