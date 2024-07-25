<?php 
	include 'includes/session.php';
	if(isset($_POST['id'])){
		$id = $_POST['id'];
        $sql = "SELECT *, employees.id AS empid,
        efl.transportation AS transportation,
        efl.transportation_additional AS transportation_additional,
        efl.adjustments AS adjustments,
        efl.adjustments_additional AS adjustments_additional,
        efl.meal_allowance AS meal_allowance,
        efl.meal_allowance_additional AS meal_allowance_additional,
        efl.date AS date,
        efl.sss_emp AS sss,
        efl.pagibig_emp AS pagibig,
        efl.philhealth_emp AS philhealth,
        efl.tin_emp AS tin,
        efl.id AS id,
        efl.employee_id AS employee_id,
        efl.reimbursement_proof
        FROM employees 
                LEFT JOIN position ON position.id = employees.position_id
                LEFT JOIN employee_financial_list AS efl ON efl.employee_id = employees.employee_id
                WHERE archive = 'no' AND efl.id = $id
                ORDER BY efl.id DESC";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();
		echo json_encode($row);
	}
?>
