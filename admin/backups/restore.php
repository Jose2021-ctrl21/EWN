<?php
session_start();

// Include our function
include 'restore_function.php';

if (isset($_POST['restore'])) {

    // Get post data
    $server = $_POST['server'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $dbname = $_POST['dbname'];
    $filename = $_POST['sql'];

    // Create upload folder if it doesn't exist
    $uploadDir = 'upload/';
    // if (!file_exists($uploadDir)) {
    //     mkdir($uploadDir, 0777, true);
    // }

    // Moving the uploaded sql file
    // $filename = $_FILES['sql']['name'];
    // move_uploaded_file($_FILES['sql']['tmp_name'], $uploadDir . $filename);
    $file_location = $uploadDir . $filename;

    // Restore database using our function
    $restore = restore($server, $username, $password, $dbname, $file_location);

    // if ($restore['error']) {
    //     $_SESSION['error'] = $restore['message'];
    // } else {
    //     $_SESSION['success'] = $restore['message'];
    // }
} else {
    $_SESSION['error'] = 'Fill up credentials first';
}
?>
