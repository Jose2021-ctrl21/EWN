<?php
include 'includes/session.php';

if(isset($_GET['return'])){
    $return = $_GET['return'];
} else {
    $return = 'home.php';
}

if(isset($_POST['save'])){
    $curr_password = $_POST['curr_password'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $photo = $_FILES['photo']['name'];

    // Fetch user data from the database
    $sql = "SELECT * FROM admin WHERE id = '".$user['id']."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Check if current password matches
    if($curr_password == $row['password']){
        // Check if photo is uploaded
        if(!empty($photo)){
            // File upload handling
            $targetDir = '../images/';
            $targetPath = $targetDir . basename($photo);
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath)){
                $filename = $photo;    
            } else {
                $_SESSION['error'] = 'Error uploading file';
                header('Location:'.$return);
                exit();
            }
        } else {
            $filename = $row['photo'];
        }

        // Update password if changed
        // if($password != $row['password']){
        //     $password = password_hash($password, PASSWORD_DEFAULT);
        // }

        // Update user profile
        $sql = "UPDATE admin SET username = ?, password = ?, firstname = ?, lastname = ?, photo = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $username, $password, $firstname, $lastname, $filename, $user['id']);

        if($stmt->execute()){
            $_SESSION['success'] = 'Admin profile updated successfully';
            // Adding audit trail
			$user = $_SESSION['username'];
			$audit_description = "Password updated by: $user. Name: $firstname $lastname";
			$audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
			$conn->query($audit_sql);
			// Adding audit trail
        } else {
            $_SESSION['error'] = 'Error updating profile: ' . $conn->error;
        }
        
    } else {
        $_SESSION['error'] = 'Incorrect password';
    }
} else {
    $_SESSION['error'] = 'Fill up required details first';
}

header('Location:'.$return);
exit();
// echo $_SESSION['success'];
?>
