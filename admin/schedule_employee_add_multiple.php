<?php
error_reporting(E_ALL);
include 'includes/session.php';
include 'includes/conn.php';

// Check if the data is received via POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the JSON data from the request body
    $json_data = file_get_contents('php://input');

    // Decode JSON data into PHP associative array
    $data = json_decode($json_data, true);

    // Check if decoding was successful
    if ($data === null) {
        // Respond with an error status if JSON decoding failed
        http_response_code(400); // Bad Request
        exit;
    }

    // Retrieve the checked employee IDs and empid values
    $checkedEmployees = isset($data['checkedEmployees']) ? $data['checkedEmployees'] : [];
    $checkedEmpIds = isset($data['checkedEmpIds']) ? $data['checkedEmpIds'] : [];
    $checkedPositions = isset($data['checkedPositions']) ? $data['checkedPositions'] : [];

    // Retrieve additional data
    $location = isset($data['location']) ? $data['location'] : '';
    $schedule = isset($data['schedule']) ? $data['schedule'] : '';
    $mealAllowance = isset($data['mealAllowance']) ? $data['mealAllowance'] : '';
    $adjustments = isset($data['adjustments']) ? $data['adjustments'] : '';
    $transpo = isset($data['transpo']) ? $data['transpo'] : '';
    $date = date('m-d-Y');
    $time = date('H:i');
	$day = date('D');	
    if($location==='' || $schedule===''){
        exit();
    }


    // Insert the data into the database
    $success = true;
    foreach ($checkedEmployees as $key => $employee_id) {
        $empid = $checkedEmpIds[$key]; // Get the corresponding empid value
        $position_id = $checkedPositions[$key]; // Get the corresponding position value
        

            // $sql_status = "UPDATE employees SET assigned_status='1' WHERE id=?";
            // $stmt_status = $conn->prepare($sql_status);
            // $stmt_status->bind_param("i", $empid);
            // $result_status = $stmt_status->execute();
            // if ($result_status === false) {
            //     $success = false;
            //     error_log("Error updating assigned_status for employee ID $empid: " . $stmt_status->error);
            //     break;
            // }


        // Prepare the SQL query
        $sql = "INSERT INTO ass_sched_fin (ass_employee_id, ass_employee_id_sc, ass_location, ass_meal_allowance, ass_adjustments, ass_transpo, ass_position, ass_schedule, date_created, time, day) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Bind parameters and execute the SQL query
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssss", $empid, $employee_id, $location, $mealAllowance, $adjustments, $transpo, $position_id, $schedule, $date, $time, $day);
        $result = $stmt->execute();
        
        // Check for errors
        if ($result === false) {
            $success = false;
            // Log error message
            error_log("Error inserting data into database: " . $stmt->error);
            break; // Exit loop if there's an error
        }
    }

    if ($success) {
        echo $success;
    } else {
        http_response_code(500); // Internal Server Error
    }

} else {
    // Respond with an error status if the request method is not POST
    http_response_code(405); // Method Not Allowed
}
?>
