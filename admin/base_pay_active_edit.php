<?php
	include 'includes/session.php';

	if(isset($_POST['id'])){
        $sql_reset = "UPDATE base_pay SET active = 'no'";
		$conn->query($sql_reset);

        $id = $_POST['id'];
		$sql_update = "UPDATE base_pay SET active = 'yes' WHERE id = '$id'";
		if ($conn->query($sql_update) === TRUE) {
			$response = array('success' => true);
		} else {
			$response = array('success' => false);
		}
		$conn->close();
		header('Content-Type: application/json');
		echo json_encode($response);

	}

	header('location:base_pay.php');

?>