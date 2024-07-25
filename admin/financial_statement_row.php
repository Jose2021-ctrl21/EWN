<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *, approval.status AS status FROM employee_financial_list AS efl
		LEFT JOIN approval ON approval.id = efl.status
        WHERE efl.id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>