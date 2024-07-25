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
		  $sql_sc = "SELECT ass_employee_id_sc FROM ass_sched_fin WHERE ass_employee_id_sc = '$employee' AND ass_schedule = '$date'";
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


			// $cutOff = $_POST['cut-off'];
				// $year = date('Y');
				// $month = date('m');
				// if($cutOff==1){
				// 	if($date > $year.'-'.$month.'-15'){
				// 		$_SESSION['error'] = 'Invalid to take attendance after cut off';
				// 		header('location: attendance.php');
				// 		exit();
				// 	}
				// }else if($cutOff==2){
				// 		//check cutoff 15
				// 		if($month == 2) {
				// 			//check cutoff 28
				// 			if($date > $year.'-'.$month.'-28'){
				// 				$_SESSION['error'] = 'Invalid to take attendance after cut off';
				// 				header('location: attendance.php');
				// 				exit();
				// 			}
				// 		} else if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
				// 			//check cutoff 30
				// 			if($date > $year.'-'.$month.'-30'){
				// 				$_SESSION['error'] = 'Invalid to take attendance after cut off';
				// 				header('location: attendance.php');
				// 				exit();
				// 			}
				// 		} else if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) {
				// 			//check cutoff 31
				// 			if($date > $year.'-'.$month.'-31'){
				// 				$_SESSION['error'] = 'Invalid to take attendance after cut off';
				// 				header('location: attendance.php');
				// 				exit();
				// 			}
				// 		}
			// 	}


				$row_sc = $query_sc->fetch_assoc();
				$id = $row_sc['ass_employee_id_sc'];
				  // Check if the employee has already timed in for today
				  $sql1 = "SELECT * FROM attendance WHERE employee_id = $id AND date = '$date' AND time_in IS NOT NULL";
				  $query1 = $conn->query($sql1);
	  
				  if(!$query1) {
					  $_SESSION['error'] = 'Error checking existing attendance: ' . $conn->error;
				  } else {
				  // Check if any rows are returned by the query
					  if($query1->num_rows > 0){
						  $row1 = $query1->fetch_assoc();
		
						  $_SESSION['error'] = 'Employee have timed in for today';
					  }else if($query1->num_rows == 0){
						  $sql = "INSERT INTO attendance (employee_id, date, time_in) VALUES ($id, '$date', NOW())";
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
