<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['user']) || trim($_SESSION['user']) == ''){
		header('location: ../login/index.php');
	}

	$sql = "SELECT admin.*, user.access_role AS role,
	admin.access_role_1 AS access_role_1 FROM admin 
	LEFT JOIN user ON user.id = admin.access_role_1
	WHERE admin.id = '".$_SESSION['user']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	$_SESSION['user_id'] = $user['id'];
	$_SESSION['name'] = $user['firstname']." ".$user['lastname'];
	$_SESSION['username'] = $user['username'];
	$_SESSION['role'] = $user['role'];
	$_SESSION['access_role_1'] = $user['access_role_1'];

//SESSION EXPIRATION
	$sql_sesh = "SELECT * FROM _session";
	$query_sesh = $conn->query($sql_sesh);
	$session = $query_sesh->fetch_assoc();
	$session_timeout = (INT)$session['sesh'];
	if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)) {
		session_unset();     
		session_destroy();  
		header("Location: ../login/index.php");
		exit();
	} else {
		// Update last activity time stamp
		$_SESSION['last_activity'] = time();
	}
?>
