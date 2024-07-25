<?php
include 'includes/session.php';

// Allow from any origin
header("Access-Control-Allow-Origin: *");

// Allow specific methods
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

// Allow specific headers
header("Access-Control-Allow-Headers: Content-Type");

// If this is an OPTIONS request, end the script here
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

if (isset($_POST['contribution']) && isset($_POST['payroll'])) {
    $cont = !empty($_POST['contribution']) ? $_POST['contribution'] : null;
    $payroll = trim($_POST['payroll']);

    // Verify valid contribution type
    $validContributions = ['sss', 'philhealth', 'pagibig', 'income tax'];
    if (!in_array($cont, $validContributions)) {
        echo json_encode(array('error' => 'Invalid contribution type'));
        exit();
    }

    // Prepare SQL query based on contribution type
    switch ($cont) {
        case 'sss':
            $sql = "SELECT CONCAT(em.firstname, ' ', em.lastname) AS name,
                    pe.employee_id,
                    pe.sss,
                    pe.sss_employeer,
                    (CAST(pe.sss AS DECIMAL(10,2)) + CAST(pe.sss_employeer AS DECIMAL(10,2))) AS total
                    FROM payroll_employee AS pe
                    LEFT JOIN employees AS em ON em.employee_id = pe.employee_id
                    WHERE date_range = '$payroll'
                    ORDER BY pe.id DESC";
            break;
        case 'philhealth':
            $sql = "SELECT CONCAT(em.firstname, ' ', em.lastname) AS name,
                    pe.employee_id,
                    pe.philhealth,
                    pe.philhealth_employeer,
                    (CAST(pe.philhealth AS DECIMAL(10,2))) AS total
                    FROM payroll_employee AS pe
                    LEFT JOIN employees AS em ON em.employee_id = pe.employee_id
                    WHERE date_range = '$payroll'
                    ORDER BY pe.id DESC";
            break;
        case 'pagibig':
            $sql = "SELECT CONCAT(em.firstname, ' ', em.lastname) AS name,
                    pe.employee_id,
                    pe.pagibig,
                    pe.pagibig_employeer,
                    (CAST(pe.pagibig AS DECIMAL(10,2))) AS total
                    FROM payroll_employee AS pe
                    LEFT JOIN employees AS em ON em.employee_id = pe.employee_id
                    WHERE date_range = '$payroll'
                    ORDER BY pe.id DESC";
            break;
        case 'income tax':
            $sql = "SELECT CONCAT(em.firstname, ' ', em.lastname) AS name,
                    pe.employee_id,
                    pe.tin,
                    (CAST(pe.tin AS DECIMAL(10,2))) AS total
                    FROM payroll_employee AS pe
                    LEFT JOIN employees AS em ON em.employee_id = pe.employee_id
                    WHERE date_range = '$payroll'
                    ORDER BY pe.id DESC";
            break;
    }

    // Execute query and fetch results
    if ($stmt = $conn->prepare($sql)) {
        $stmt->execute();
        $result = $stmt->get_result();
        
        $financialData = array();
        while ($row = $result->fetch_assoc()) {
            $financialData[] = $row;
        }
        
        echo json_encode($financialData);
    } else {
        echo json_encode(array('error' => 'Database query failed'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request'));
}
?>
