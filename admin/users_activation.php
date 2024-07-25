<?php
include 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employeeId = $_POST['employeeId'];
    $selectedValue = $_POST['selectedValue'];

    // Validate the input
    if (!is_numeric($employeeId)) {
        $response['status'] = "error";
        $response['message'] = "Invalid input.";
    } else {
        // Update the status in the database
        $updateSql = "UPDATE admin SET activation = '$selectedValue' WHERE id = $employeeId";
        
        if (mysqli_query($conn, $updateSql)) {
            $response['status'] = "success";
            $response['message'] = "Status updated";
        } else {
            // Error updating status
            $response['status'] = "error";
            $response['message'] = "Error updating status: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
} else {
    $response['status'] = "error";
    $response['message'] = "Invalid request";
}

// Send response as JSON
echo json_encode($response);
?>
