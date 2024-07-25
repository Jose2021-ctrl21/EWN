<?php
    include 'includes/session.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $sssDeduction = isset($_POST['sss-deduction']) ? $_POST['sss-deduction'] : 0;
        $tinDeduction = isset($_POST['tin-deduction']) ? $_POST['tin-deduction'] : 0;
        $philhealthDeduction = isset($_POST['philhealth-deduction']) ? $_POST['philhealth-deduction'] : 0;
        $pagibigDeduction = isset($_POST['pagibig-deduction']) ? $_POST['pagibig-deduction'] : 0;

        $sss = $_POST['sss'];
        $tin = $_POST['tin'];
        $pagibig = $_POST['pagibig'];
        $philhealth = $_POST['philhealth'];

        // Convert checkbox values to '1' if checked
        $sssDeduction = $sssDeduction ? '1' : '0';
        $tinDeduction = $tinDeduction ? '4' : '0';
        $philhealthDeduction = $philhealthDeduction ? '3' : '0';
        $pagibigDeduction = $pagibigDeduction ? '2' : '0';

        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "UPDATE employees SET sss_deduction = '$sssDeduction', tin_deduction = '$tinDeduction', philhealth_deduction = '$philhealthDeduction', pagibig_deduction = '$pagibigDeduction', sss = '$sss', tin = '$tin', philhealth = '$philhealth', pagibig = '$pagibig' WHERE id = $id";

        if($conn->query($sql)){
            $_SESSION['success'] = 'Employee membership updated successfully';

            // Adding audit trail
            $user = $_SESSION['username'];
            $audit_description = "Employee membership edited by: $user. Employee id: $id";
            $audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
            $conn->query($audit_sql);
            // End of adding audit trail
        }
        else{
            $_SESSION['error'] = $conn->error;
        }

        $conn->close();
    }
    else{
        $_SESSION['error'] = 'Fill up edit form first';
    }

    header('location:membership_ids.php');
?>
