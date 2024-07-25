<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$province = ucwords(strtolower($_POST['province']));
		$municipality = ucwords(strtolower($_POST['municipality']));
		// $addLoc = $province.' '.$municiplaity;
		$addInc = $_POST['add-incentives'];
		$addDoc = $_POST['add-doc'];

		//CHECK IF THERE IS AN EXISITNG PROVICE AND MINICIPALITY
		$sql_loca = "SELECT * FROM location WHERE LOWER(province) = ? AND LOWER(municipality) = ?";
		$stmt = $conn->prepare($sql_loca);
		$stmt->bind_param("ss", $province, $municipality);
		$stmt->execute();
		$result = $stmt->get_result();
		if ($result->num_rows > 0) {
			$_SESSION['error'] = 'It will not be saved because there is an existing row with the same province and municipality';
			header('location: vax_location.php');
			exit();
		}


		// INsert 
		$sql = "INSERT INTO location (province, municipality, incentives, doc, date) VALUES ('$province','$municipality','$addInc','$addDoc',CURDATE())";
		if($conn->query($sql)){
			$status = 1;
			$date = date('Y-m-d');
			$sql_stat = "UPDATE location SET status = $status, date = '$date'";
			if($conn->query($sql_stat)){
				$_SESSION['success'] = 'Schedule Added successfully';
				// Adding audit trail
				$user = $_SESSION['username'];
				$audit_description = "Position variable added by: $user. Province: $province. Municipality: $municipality";
				$audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
				$conn->query($audit_sql);
				// Adding audit trail
			}else{
				$_SESSION['error'] = $conn->error;
			}
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: vax_location.php');
?>