<?php
	include 'includes/session.php';
	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$contactPersonName = $_POST['contact-person-name'];
		$contactPersonAddress = $_POST['contact-person-address'];
		$contactPersonNumber = $_POST['contact-person-number'];
		
		$sql = "UPDATE employees SET contact_person = '$contactPersonName',contact_person_address = '$contactPersonAddress', contact_person_number = '$contactPersonNumber' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Contact person updated successfully';
						  // Adding audit trail
						  $user = $_SESSION['username'];
						  $audit_description = "Contact person added by: $user. Name: $contactPersonName. Address: $contactPersonAddress. Contact number: $contactPersonNumber ";
						  $audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
						  $conn->query($audit_sql);
						  // Adding audit trail
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:contact_person.php');
?>