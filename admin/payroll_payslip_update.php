<?php
	include 'includes/session.php';
	if(isset($_POST['update-payslip'])){
    
        $id = $_POST['slip-id'];
        $addEmployee = $_POST['employee-id'];
        $sss = (float)$_POST['sss'];
        $philhealth = (float)$_POST['philhealth'];
        $pagibig = (float)$_POST['pagibig'];
        $tin = (float)$_POST['tin'];
        $payPerCutOffHidden = (float)$_POST['hidden_pay_per_cut_off'];
        $payPerCutOff = isset($_POST['pay_per_cut_off']) ? (float)$_POST['pay_per_cut_off'] : 0;
        $balance = (float)$_POST['remaining-balance'];
        $amount = (float)$_POST['amount'];
        $number_of_cutoffs = (int)$_POST['number_of_cutoffs'];

        $previousNetSalary = (float)$_POST['previous_netSalary'];

        $meal_allowance = (float)$_POST['meal-allowance'];
        $adjustments = (float)$_POST['adjustments'];
        $transportation = (float)$_POST['transportation'];
        
        $temp_meal_allowance = (float)$_POST['temp-meal-allowance'] != $meal_allowance ? $meal_allowance : 0;
        $temp_adjustments = (float)$_POST['temp-adjustments'] != $adjustments ? $adjustments : 0;
        $temp_transportation = (float)$_POST['temp-transportation'] != $transportation ? $transportation : 0;

         
        if($payPerCutOff == 0){
          $balance += $payPerCutOffHidden;
          $payPerCutOff = 0;
          $number_of_cutoffs += 1;
          
        }

        // Recalculate cashadvance
        if($amount<$balance){
          $_SESSION['error'] = 'Invalid calculation: Cash advance balance should not be greater than amount';
          header('location: payroll_payslip.php?id='.$id);
          exit();
        }
       
        // echo "paypercutoff: $payPerCutOff, balance: $balance, paypercutoffHidden: $payPerCutOffHidden";
        // exit();
        // echo "
        // $temp_meal_allowance<br>
        // $temp_adjustments<br>
        // $temp_transportation<br>";
        // exit();
        //13th mthpay and bonuses
        // $sql_13 = "SELECT * FROM payroll_employee WHERE date"
        $_13th = isset($_POST['_13th']) ? (float)$_POST['_13th'] : 0;

        $bonus = isset($_POST['bonus']) ? (float)$_POST['bonus'] : 0;

        // $bonus = (float)$_POST['bonus'];
        // $netSalary = (float)$_POST['net-salary'];
        $gross = (float)$_POST['gross'];

        // if not equal
        $reimbursement =  $temp_meal_allowance + $temp_adjustments + $temp_transportation;
        $gross += $reimbursement;


        if($temp_meal_allowance == 0){
          $temp_meal_allowance = $meal_allowance;
        }
        if($temp_adjustments == 0){
          $temp_adjustments = $adjustments;
        }
        if($temp_transportation == 0){
          $temp_transportation = $transportation;
        }
        // echo "
        //   $id<br>
        //   $sss<br>
        //   $philhealth<br>
        //   $tin<br>
        //   $payPerCutOff<br>
        //   $addEmployee<br>
        //   $gross<br>
        //   $_13th<br>
        //   $bonus<br>
        // ";

        //check if inserted value in cashadvance is less than 0
        if((float)$payPerCutOff<0){
          $_SESSION['error'] = 'Inserted value cannot be negative';
          header('location: payroll_payslip.php?id='.$id);
          exit();
        }

         //check if the inserted balance is not greater than the balance
         $sql_advance ="SELECT * FROM cashadvance WHERE employee_id = '$addEmployee' AND balance>='$payPerCutOff'";
         $query_advance = $conn->query($sql_advance);
         if($query_advance->num_rows < 0){
           $_SESSION['error'] = 'Inserted value is greater than employee balance';
             header('location: payroll_payslip.php?id='.$id);
             exit();
           }

        $deduction = $sss+$tin+$pagibig+$philhealth+$payPerCutOff;
        $netSalary = $_13th + $bonus;
        $netSalary += ($gross - $deduction);

        // Update payroll_employee
          $sql = "UPDATE payroll_employee SET meal_allowance = '$temp_meal_allowance', adjustments = '$temp_adjustments', transportation = '$temp_transportation', sss = '$sss', philhealth = '$philhealth', pagibig = '$pagibig', tin = '$tin', tin = '$tin', net_salary = '$netSalary', net_salary_after = '$previousNetSalary', pay_per_cut_off = '$payPerCutOff', _13th = '$_13th', bonus = '$bonus', cashadvance_balance = '$balance', pay_per_cut_off = '$payPerCutOff' WHERE id = '$id'";
          if($conn->query($sql)){

              // INSERTION FOR CASHADVANCE SUMMARY
              if($balance>0){
                $sql_cash_summary = "INSERT INTO cashadvance (amount, number_of_cutoffs, pay_per_cut_off, balance, employee_id, date_advance) VALUES ('$amount', '$number_of_cutoffs','$payPerCutOffHidden', '$balance', '$addEmployee', CURDATE())";
                $conn->query($sql_cash_summary);
              }elseif($balance<0){
                $balance = 0;
                $sql_cash_summary = "INSERT INTO cashadvance (amount, number_of_cutoffs, pay_per_cut_off, balance, employee_id, date_advance) VALUES ('$amount', '$number_of_cutoffs', '$payPerCutOffHidden', '$balance', '$addEmployee', CURDATE())";
                $conn->query($sql_cash_summary);
              }

              // Adding audit trail
                $user = $_SESSION['username'];
                $audit_description = "Payslip variable edited by: $user. Employee: $addEmployee.";
                $audit_sql = "INSERT INTO audit_logs (date_and_time, user, description) VALUES (NOW(), '$user', '$audit_description')";
                $conn->query($audit_sql);
              // Adding audit trail

              $_SESSION['success'] = 'Payslip updated successfully';

          }
          else{
            $_SESSION['error'] = $conn->error;
          }
    }
    else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: payroll_payslip.php?id='.$id);

?>