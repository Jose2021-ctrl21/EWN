<?php
session_start();
include 'conn.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize username to prevent SQL injection
    $username = $conn->real_escape_string($username);

    // Query for admin
    $sql1 = "SELECT * FROM admin WHERE username = '$username' AND activation = 'Active'";
    $result_admin = $conn->query($sql1);


    if($result_admin->num_rows > 0) {
        $row = $result_admin->fetch_assoc();
        if($password == $row['password']) {
            $_SESSION['user'] = $row['id'];
            $_SESSION['username'] = $row['username']; 
            $_SESSION['user_id'] = $row['id'];
            header('Location: ../admin/home.php');
            exit();
            // echo $row['access_role_1'];
            // echo $row['username'];
            // echo $row['id'];
        } else {
            $_SESSION['error'] = 'Incorrect username or password';
        }
    } 
    else {
        $_SESSION['error'] = 'No user found';
    }
} else {
    $_SESSION['error'] = 'Please input user credentials first';
}
header('Location: index.php');
echo $_SESSION['error'];
?>
