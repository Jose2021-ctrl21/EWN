<?php
session_start();
include 'conn.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize username to prevent SQL injection
    $username = $conn->real_escape_string($username);

    // Query for admin
    $sql1 = "SELECT * FROM admin WHERE username = '$username'";
    $result_admin = $conn->query($sql1);

    // Query for staff
    $sql2 = "SELECT * FROM staff WHERE username = '$username'";
    $result_staff = $conn->query($sql2);

    if($result_admin->num_rows > 0) {
        $row = $result_admin->fetch_assoc();
        if($password == $row['password'] && $row['access_role_1']==1) {
            $_SESSION['admin'] = $row['id'];
            $_SESSION['username'] = $row['username']; // Store username in session
            header('Location: ../admin/home.php');
            exit();
        } else {
            $_SESSION['error'] = 'Incorrect username or password';
        }
    } elseif($result_staff->num_rows > 0) {
        $row = $result_staff->fetch_assoc();
        if($password == $row['password'] && $row['access_role_id']==2) {
            $_SESSION['staff'] = $row['id'];
            $_SESSION['username'] = $row['username']; // Store username in session
            header('Location: ../staff/home_staff.php');
            exit();
        } else {
            $_SESSION['error'] = 'Incorrect username or password';
        }
    } else {
        $_SESSION['error'] = 'Cannot find account with the username';
    }
} else {
    $_SESSION['error'] = 'Please input admin credentials first';
}
header('Location: index.php');
echo $_SESSION['error'];
?>
