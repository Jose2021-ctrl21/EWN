<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, employees.id as empid,
		position.id AS posID
		FROM employees
		LEFT JOIN position ON position.id=employees.position_id
		LEFT JOIN reg_rel ON employees.reg_rel_id = reg_rel.id
		WHERE employees.id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>