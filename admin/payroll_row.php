<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "SELECT *,
		payroll_employee.sss AS sss, 
		payroll_employee.tin AS tin, 
		payroll_employee.pagibig AS pagibig, 
		payroll_employee.philhealth AS philhealth
		FROM payroll_employee
        LEFT JOIN employees ON payroll_employee.employee_id = employees.employee_id
		WHERE payroll_employee.employee_id = '$id'";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>