<?php
	include 'includes/session.php';

	if($_SERVER['REQUEST_METHOD']==='POST'){
		$sesh = $_POST['sesh'];

		$sql = "UPDATE _session SET sesh = '$sesh' WHERE id = 1";

		if($conn->query($sql)){
			$_SESSION['success'] = 'session updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select session to edit first';
	}
	header('location: session_config.php');
?>