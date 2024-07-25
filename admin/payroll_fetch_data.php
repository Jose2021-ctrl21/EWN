<?php
include 'includes/session.php';

if(isset($_POST['dateFrom']) && isset($_POST['dateTo'])){
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    
    // Query to fetch attendance data within the specified date range
    $sql = "SELECT * FROM payroll_employee WHERE DATE(created_on) >= '$dateFrom' AND DATE(created_on) <= '$dateTo'
    ";
    $result = $conn->query($sql);
    
    
    // Check if any rows are returned
    if ($result->num_rows > 0) {
        $payrollData = array();
        while ($row = $result->fetch_assoc()) {
            // Add fetched rows to the array
            $payrollData[] = $row;
        }
        // Return the fetched data as JSON
        echo json_encode($payrollData);
    } else {
        // No data found within the specified date range
        echo json_encode(array());
    }
} else {
    // Invalid request, dateFrom and dateTo parameters not set
    echo json_encode(array('error' => 'Invalid request'));
}
?>
