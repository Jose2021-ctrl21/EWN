<?php
	include 'includes/session.php';
	include '../timezone.php';

	if(isset($_POST['add'])){
		$employee = $_POST['employee'];
		$date = $_POST['date'];
		$currentDate = date('Y-m-d');
		$time = date('h:i A');

		
		// Check if employee exists
		$stmt = $conn->prepare("SELECT * FROM employees WHERE employee_id = ?");
		$stmt->bind_param("s", $employee);
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows < 1){
			$_SESSION['error'] = 'There is no existing employee';
			header('location: attendance.php');
			exit();
		}

		  //check for exisiting employee
		  $sql_sc = "SELECT * FROM ass_sched_fin WHERE ass_employee_id_sc = '$employee' AND ass_schedule = '$date'";
		  $query_sc = $conn->query($sql_sc);
		  if($query_sc->num_rows < 1){
			  $_SESSION['error'] = 'Employee is not yet assigned for this date. Go to: <a href="schedule_employee.php">Assignment</a>';
			  header('location: attendance.php');
			  exit();
		  }else{

			//check if schedule date is ahead than the current date
			if($currentDate<$date){
				$_SESSION['error'] = 'Invalid to take attendance ahead of the current date';
				header('location: attendance.php');
				exit();
			}

				$row_sc = $query_sc->fetch_assoc();
				// $id = $row_sc['ass_employee_id'];
				  // Check if the employee has already timed in for today
				  $sql1 = "SELECT * FROM attendance WHERE employee_id = '$employee' AND date = '$date' AND time_in IS NOT NULL";
				  $query1 = $conn->query($sql1);
	  
				  if(!$query1) {
					  $_SESSION['error'] = 'Error checking existing attendance: ' . $conn->error;
				  } else {
				  // Check if any rows are returned by the query
					  if($query1->num_rows > 0){
						  $row1 = $query1->fetch_assoc();
		
						  $_SESSION['error'] = 'Employee have timed in for today';
					  }else if($query1->num_rows == 0){
						  $sql = "INSERT INTO attendance (employee_id, date, time_in) VALUES ('$employee', '$date', '$time')";
						  if($conn->query($sql)){
							$_SESSION['success'] = "Employee have successfully signed in";
							include "financial_statement_list_process_manual.php";
						  }
						  else {
							  $_SESSION['error'] = 'Error inserting attendance record: ' . $conn->error;
						  }
					  }
					  else {
						  $_SESSION['error'] = 'Employee not found';
					  }
				  }
			  }//end ass_sched_fin query
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
	header('location: attendance.php');
?>
