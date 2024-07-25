<?php
	include 'includes/session.php';

	if(isset($_POST['reset'])){
		$id = $_POST['reset-id'];
		$username = $_POST['reset-user-name'];
		$password = $_POST['reset-staff-password'];

		
		$sql = "UPDATE staff SET username = '$username', password = '$password' WHERE id = $id";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Staff updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select Staff to edit first';
	}

	header('location: users.php');
?>