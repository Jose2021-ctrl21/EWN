<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$locid = $_POST['id'];
		$editProvince = ucwords(strtolower($_POST['edit-province']));
		$editMunicipality = ucwords(strtolower($_POST['edit-municipality']));
		$editProvinceHidden = ucwords(strtolower($_POST['hidden-province']));
		$editMunicipalityHidden = ucwords(strtolower($_POST['hidden-municipality']));

		$editProvince = !empty($editProvince) ? $editProvince : $editProvinceHidden;
		$editMunicipality = !empty($editMunicipality) ? $editMunicipality : $editMunicipalityHidden;

		$editIncentives = $_POST['edit-incentives'];
		$editDoc = $_POST['edit-doc'];
		$editId = $_POST['edit-id'];

		echo $editProvince."__".$editMunicipality;
		//CHECK IF THERE IS AN EXISITNG PROVICE AND MINICIPALITY
		$sql_loca = "SELECT * FROM location WHERE LOWER(province) = ? AND LOWER(municipality) = ? AND id != ?";
		$stmt = $conn->prepare($sql_loca);
		$stmt->bind_param("ssi", $editProvince, $editMunicipality, $locid);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if ($result->num_rows > 0) {
			$_SESSION['error'] = 'It will not be saved because there is an existing row with the same province and municipality';
			header('location: vax_location.php');
			exit();
		}


		
		$sql = "UPDATE location SET id = '$editId', province = '$editProvince', municipality = '$editMunicipality', incentives = '$editIncentives', doc = '$editDoc'  WHERE id = '$locid'";
		if($conn->query($sql)){
			$status = 1;
			// $date = date('Y-m-d');
			$sql_stat = "UPDATE location SET status = $status, date = CURDATE()";
			if($conn->query($sql_stat)){
				$_SESSION['success'] = 'Schedule Updated successfully';
			}else{
				$_SESSION['error'] = $conn->error;
			}
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select schedule to edit first';
	}

	header('location: vax_location.php');
?>