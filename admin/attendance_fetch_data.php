<?php
include 'includes/session.php';

if(isset($_POST['dateFrom']) && isset($_POST['dateTo'])){
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    
    // Query to fetch attendance data within the specified date range
    $sql = "SELECT *, attendance.employee_id AS attid, 
    attendance.date AS date, attendance.time_in AS time_in,
    CONCAT(employees.firstname, ' ',employees.lastname) AS name
            FROM attendance 
            LEFT JOIN employees ON employees.employee_id = attendance.employee_id 
            WHERE attendance.date BETWEEN '$dateFrom' AND '$dateTo'";
    
    $result = $conn->query($sql);
    
    // Check if any rows are returned
    if ($result->num_rows > 0) {
        $attendanceData = array();
        while ($row = $result->fetch_assoc()) {
            // Add fetched rows to the array
            $attendanceData[] = $row;
        }
        // Return the fetched data as JSON
        echo json_encode($attendanceData);
    } else {
        // No data found within the specified date range
        echo json_encode(array());
    }
} else {
    // Invalid request, dateFrom and dateTo parameters not set
    echo json_encode(array('error' => 'Invalid request'));
}
?>
