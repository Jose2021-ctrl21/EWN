<?php
include 'includes/session.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if username is set in session
    if (!isset($_SESSION['username'])) {
        echo json_encode(['result' => false]);
        exit;
    }
    
    $username = $_SESSION['username'];
    $inputPassword = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('ss', $username, $inputPassword);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode(['result' => true]);
    } else {
        echo json_encode(['result' => false]);
    }
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['result' => false]);
}
?>
