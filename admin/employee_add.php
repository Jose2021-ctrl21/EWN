<?php
include 'includes/session.php';

if(isset($_POST['add'])){
    $firstname = $_POST['add-firstname'];
    $lastname = $_POST['add-lastname'];
    $nickname = $_POST['nickname'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $fb = $_POST['fb'];
    $birthdate = $_POST['birthdate'];
    // if($birthdate > date('Y-m-d')){
    //     $_SESSION['error'] = 'Future date for birthday is not ';
    //     header('location: employee.php');
    // }
    $bloodType = $_POST['blood-type'];
    $gender = $_POST['gender'];
    $civilStatus = $_POST['civil-status'];
    //
    //SSS
    $sss = $_POST['sss'];
    $sssDeduction = !empty($sss) ? $_POST['sss-deduction'] : null;

    //TIN
    $tin = $_POST['tin'];
    $tinDeduction = !empty($tin) ? $_POST['tin-deduction'] : null;

    //PAGIBIG
    $pagibig = $_POST['pagibig'];
    $pagibigDeduction = !empty($pagibig) ? $_POST['pagibig-deduction'] : null;

    //PHILHEALTH
    $philhealth = $_POST['philhealth'];
    $philhealthDeduction = !empty($philhealth) ? $_POST['philhealth-deduction'] : null;

    
    //-------------
    $contactPerson = $_POST['contact-person'];
    $contactPersonAddress = $_POST['contact-person-address'];
    $contactPersonNumber = $_POST['contact-person-number'];
    $bankName = $_POST['bank-name'];
    $bankServices = $_POST['bank-services'];
    $bankAccount = $_POST['bank-account'];
    $gcash = $_POST['gcash'];
    $address = $_POST['address'];
    $positionId = $_POST['add-employee-position'];
    $regRel = $_POST['add-reg-rel'];
    $filename = $_FILES['add-photo']['name'];
    // $_SESSION['success'] = "$sss>>$pagibig>>$philhealth>>$tin $sssDeduction>>$pagibigDeduction>>$philhealthDeduction>>$tinDeduction";


    if(!empty($filename)){
        move_uploaded_file($_FILES['add-photo']['tmp_name'], '../images/'.$filename);   
    }

    // Retrieve the current year
    $year = date('Y');

    // Retrieve the current maximum employee number for the year
    $sql_max_employee_number = "SELECT MAX(CAST(SUBSTRING(employee_id, 9) AS UNSIGNED)) AS max_employee_number FROM employees WHERE employee_id LIKE 'VC:$year%'";
    $result_max_employee_number = $conn->query($sql_max_employee_number);
    $row_max_employee_number = $result_max_employee_number->fetch_assoc();
    $max_employee_number = (int)$row_max_employee_number['max_employee_number'];

    // Increment the current maximum employee number by 1
    $next_employee_number = $max_employee_number + 1;

    // Format the employee ID
    $next_employee_number_padded = str_pad($next_employee_number, 3, '0', STR_PAD_LEFT);
    $employee_id = "VC:$year-$next_employee_number_padded";


    // Insert the employee record into the database
    $sql = "INSERT INTO employees (employee_id, firstname, lastname, nickname, contact_info, email, fb, birthdate, bloodtype, gender, civil_status, sss, sss_deduction, tin, tin_deduction, pagibig, pagibig_deduction, philhealth, philhealth_deduction, contact_person, contact_person_address, contact_person_number, bank_name, bank_services, bank_account, gcash, address,position_id,photo, created_on, reg_rel_id) 
            VALUES ('$employee_id', '$firstname', '$lastname', '$nickname', '$contact', '$email', '$fb', '$birthdate', '$bloodType', '$gender', '$civilStatus', '$sss','$sssDeduction', '$tin', '$tinDeduction','$pagibig','$pagibigDeduction', '$philhealth', '$philhealthDeduction', '$contactPerson', '$contactPersonAddress', '$contactPersonNumber', '$bankName', '$bankServices', '$bankAccount', '$gcash', '$address', '$positionId', '$filename', NOW(), '$regRel')";

    if($conn->query($sql)){
        $_SESSION['success'] = 'Employee added successfully';
        //audit trail
        $user = $_SESSION['username'];
        $audit_description = "Employee added by: $user. Employee id: $employee_id. Employee name: $firstname $lastname";
        $audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
        $conn->query($audit_sql);
        //audit trail
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
}
else{
    $_SESSION['error'] = 'Fill up add form first';
}

header('location: employee.php');
?>
