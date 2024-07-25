<?php
include "includes/session.php";
	session_start();
	             // Adding audit trail
				 $user = $_SESSION['username'];
				 $audit_description = "User logged out: $user";
				 $audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
				 $conn->query($audit_sql);
				 // Adding audit trail
				 session_unset(); 
				 session_destroy();

	header('location: ../login/index.php');
?>