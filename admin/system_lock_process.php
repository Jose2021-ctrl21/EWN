<?php
include 'includes/session.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sysLock = $_POST['sysLock'];

    // Use prepared statement to update database
    $updateSql = "UPDATE system_lock SET status = ? WHERE id = 12345";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param('s', $sysLock); // Bind parameter
    if ($stmt->execute()) {
        echo json_encode(['result' => true]);
    } else {
        echo json_encode(['result' => false, 'message' => $conn->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['result' => false, 'message' => 'Invalid request']);
}
?>
