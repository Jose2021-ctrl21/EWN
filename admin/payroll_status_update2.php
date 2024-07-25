<?php
include 'includes/session.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the action parameter is set and valid
    if (isset($_POST['action']) && $_POST['action'] == 'approve') {
        $selectedValue = 2;
        $date_range = $_POST['date_range'];

        // Validate the input
        if (!is_numeric($selectedValue)) {
            $response['status'] = "error";
            $response['message'] = "Invalid input.";
        } else {
            // Update the status in the database
            $updateSql = "UPDATE payroll_employee SET status = $selectedValue WHERE date_range = '$date_range'";

            if (mysqli_query($conn, $updateSql)) {
                $response['status'] = "success";
                $response['message'] = "Status updated";
            } else {
                // Error updating status
                $response['status'] = "error";
                $response['message'] = "Error updating status: " . mysqli_error($conn);
            }
        }
    } else {
        $response['status'] = "error";
        $response['message'] = "Invalid action.";
    }

    mysqli_close($conn);
} else {
    $response['status'] = "error";
    $response['message'] = "Invalid request";
}

// Send response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
