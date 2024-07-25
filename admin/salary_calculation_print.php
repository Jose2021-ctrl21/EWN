<?php 
	include 'includes/session.php';

	if(isset($_POST['print'])){
        $i = $_POST['sal_id'];
        $dateFrom = $_POST['dateFrom'];
        $dateTo = $_POST['dateTo'];

        $sql = "SELECT *,
        COUNT(*) AS numOfrows,
        COUNT(DISTINCT efl.employee_id) AS crews,
        SUM(efl.meal_allowance) AS meal_allowance,
        SUM(efl.adjustments) AS adjustments,
        SUM(efl.transportation) AS transportation,
        location.doc AS doc,
        efl.incentives_value AS incentives_value,
        efl.date AS date
        FROM employee_financial_list AS efl
        LEFT JOIN location ON efl.location_id = location.id
        WHERE efl.location_id = '$i' AND efl.date BETWEEN $dateFrom AND $dateTo
        GROUP BY efl.date";
         $query = $conn->query($sql);

         // Initialize an array to store row data
         $rows = array();
         while($row = $query->fetch_assoc()){
             // Store each row's data in the $rows array
             $rows[] = $row;
         }
         var_dump($rows);
	}
?>