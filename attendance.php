<?php
// Enable reporting of all PHP errors
error_reporting(E_ALL);

// Initialize output variable
$output = array('error' => false);

// Check if the 'employee' parameter is set in the POST request
if(isset($_POST['employee'])){
    include 'conn.php';
    include 'timezone.php'; 
    $employee = $_POST['employee'];
	$time = date('h:i A');
    $sql = "SELECT * FROM employees WHERE employee_id = '$employee'";
    $query = $conn->query($sql);
    if($query->num_rows < 1){
        $output['error'] = true;
        $output['message'] = 'ID does not exists';
    }
    else{
        $row = $query->fetch_assoc();
        $id = $row['id'];
        $date_now = date('Y-m-d');

        //check for exisiting employee
        $sql_sc = "SELECT ass_employee_id FROM ass_sched_fin WHERE ass_employee_id_sc = '$employee' AND ass_schedule = CURDATE()";
        $query_sc = $conn->query($sql_sc);
        if($query_sc->num_rows < 1){
            $output['error'] = true;
            $output['message'] = 'You are not assigned yet. Please contact admin';
        }else{
            // Check if the employee has already timed in for today
            $sql1 = "SELECT * FROM attendance WHERE employee_id = '$id' AND date = '$date_now' AND time_in IS NOT NULL";
            $query1 = $conn->query($sql1);

            if(!$query1) {
                $output['error'] = true;
                $output['message'] = 'Error checking existing attendance: ' . $conn->error;
            } else {
            // Check if any rows are returned by the query
                if($query1->num_rows > 0){
                    $row1 = $query1->fetch_assoc();
                    $output['error'] = true;
                    $output['message'] = 'You have timed in for today';
                }else if($query1->num_rows == 0){
                    $sql = "INSERT INTO attendance (employee_id, date, time_in) VALUES ('$id', '$date_now', '$time')";
                    if($conn->query($sql)){
                        include "admin/financial_statement_list_process_emp.php";
                        // include "admin/salary_calculation_add.php";
                        // $output['message'] = "You have successfully signed in";
                        
                    }
                    else {
                        $output['error'] = true;
                        $output['message'] = 'Error inserting attendance record: ' . $conn->error;
                    }
                }
                else {
                    $output['error'] = false;
                    $output['message'] = 'Employee not found';
                }
            }
        }//end ass_sched_fin query
    }//end largest else
} 
// else {
//     $output['error'] = true;
//     $output['message'] = 'No employee ID provided.';
// }

// Encode the output data as JSON and send it back to the client-side JavaScript
echo json_encode($output);
?>
