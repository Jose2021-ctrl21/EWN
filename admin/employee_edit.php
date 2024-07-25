<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$nickname = $_POST['nickname'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$fb = $_POST['fb'];
		$birthdate = $_POST['birthdate'];
		$bloodType = $_POST['blood-type'];
		$gender = $_POST['gender'];
		$civilStatus = $_POST['civil-status'];
		$sss = $_POST['sss'];
		$tin = $_POST['tin'];
		$pagibig = $_POST['pagibig'];
		$philhealth = $_POST['philhealth'];
		$contactPerson = $_POST['contact-person'];
		$contactPersonAddress = $_POST['contact-person-address'];
		$contactPersonNumber = $_POST['contact-person-number'];
		$bankName = $_POST['bank-name'];
		$bankServices = $_POST['bank-services'];
		$bankAccount = $_POST['bank-account'];
		$gcash = $_POST['gcash'];
		$address = $_POST['address'];
		$editEmployeePosition = $_POST['edit-employee-position'];
		$regRel = $_POST['edit-reg-rel'];
		
		$sql = "UPDATE employees SET 
		firstname = '$firstname', 
		lastname = '$lastname', 
		nickname = '$nickname', 
		contact_info = '$contact', 
		email = '$email', 
		fb = '$fb', 
		birthdate = '$birthdate', 
		bloodtype = '$bloodType', 
		gender = '$gender', 
		civil_status = '$civilStatus', 
		sss = '$sss',
		tin = '$tin',
		pagibig = '$pagibig',
		philhealth = '$philhealth',
		contact_person = '$contactPerson', 
		contact_person_address = '$contactPersonAddress', 
		contact_person_number = '$contactPersonNumber',
		bank_name = '$bankName', 
		bank_services = '$bankServices', 
		bank_account = '$bankAccount', 
		gcash = '$gcash', 
		address = '$address',
		position_id = '$editEmployeePosition',
		reg_rel_id = '$regRel'
		WHERE id = '$empid'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Employee updated successfully';
			// Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "Employee edited by: $user. Name: $firstname".' '."$lastname. ID: $empid";
			$audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
			$conn->query($audit_sql);
			// Adding audit trail
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select employee to edit first';
	}

	header('location: employee.php');
?>