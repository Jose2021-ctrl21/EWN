<?php
include 'includes/session.php';

if(isset($_POST['dateRange'])){
    $dateRange = $_POST['dateRange'];
    
    // Query to fetch attendance data within the specified date range
    $sql = "SELECT CONCAT(pe.created_on, pe.id) AS payslip_number,
    pe.employee_id AS employee_id,
    pe.num_days_work AS num_days_work,
    pe.total_deduction As total_deduction,
    pe.gross AS gross,
    pe.net_salary AS net_salary,
    pe.created_on AS created_on
    FROM payroll_employee AS pe
    LEFT JOIN employees ON employees.employee_id = pe.employee_id
    WHERE employees.archive = 'no' AND pe.date_range = '$dateRange'
    ";
    $result = $conn->query($sql);
    
    
    // Check if any rows are returned
    if ($result->num_rows > 0) {
        $fincialData = array();
        while ($row = $result->fetch_assoc()) {
            // Add fetched rows to the array
            $fincialData[] = $row;
        }
        // Return the fetched data as JSON
        echo json_encode($fincialData);
    } else {
        // No data found within the specified date range
        echo json_encode(array());
    }
} else {
    // Invalid request, dateFrom and dateTo parameters not set
    echo json_encode(array('error' => 'Invalid request'));
}
?>
