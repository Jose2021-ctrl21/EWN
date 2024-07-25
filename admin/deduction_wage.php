<?php
include 'includes/session.php';

$response = array('success' => false, 'message' => '');

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $wage = $_POST['wage'];

    $sql = "UPDATE wage SET current_wage = '$wage' WHERE id = $id";
    if($conn->query($sql)) {
        // Editing audit trail
        $user = $_SESSION['username'];
        $audit_description = "Wage edited by user: $user. id: $id Wage: $wage";
        $audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
        $conn->query($audit_sql);
        // Editing audit trail

        $response['success'] = true;
    } else {
        $response['message'] = $conn->error;
    }
} else {
    $response['message'] = 'Invalid request method';
}

echo json_encode($response);
?>
