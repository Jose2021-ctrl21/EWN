<?php
include 'includes/session.php';

if(isset($_POST['dateFrom']) && isset($_POST['dateTo'])){
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    
    // Query to fetch attendance data within the specified date range
    $sql = "SELECT *, employees.id AS empid FROM employees 
    LEFT JOIN position ON position.id=employees.position_id
    WHERE archive = 'no' AND DATE(efl.date) >= '$dateFrom' AND DATE(efl.date) <= '$dateTo'
    ORDER BY employees.id DESC";
    $result = $conn->query($sql);
    
    
    // Check if any rows are returned
    if ($result->num_rows > 0) {
        $employeeData = array();
        while ($row = $result->fetch_assoc()) {
            // Add fetched rows to the array
            $employeeData[] = $row;
        }
        // Return the fetched data as JSON
        echo json_encode($employeeData);
    } else {
        // No data found within the specified date range
        echo json_encode(array());
    }
} else {
    // Invalid request, dateFrom and dateTo parameters not set
    echo json_encode(array('error' => 'Invalid request'));
}
?>
