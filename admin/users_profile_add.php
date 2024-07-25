<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
		$accessRole = $_POST['user-access'];
		$userUsername = $_POST['user-username'];
		$userPassword = $_POST['user-password'];
		$userFirstname = $_POST['user-firstname'];
		$userLastname = $_POST['user-lastname'];
		$userPhoto = isset($_POST['user-photo']) ? $_POST['user-photo'] : '' ;

		echo "$userPhoto";
		$sql = "INSERT INTO admin (access_role_1, photo, firstname, lastname, username, password, created_on) VALUES ('$accessRole','$userPhoto','$userFirstname','$userLastname', '$userUsername', '$userPassword',CURDATE())";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Location added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: users.php');
?>