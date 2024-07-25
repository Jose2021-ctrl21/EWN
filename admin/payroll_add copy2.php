<?php
	include 'includes/session.php';
	if(isset($_POST['addPayroll'])){

        $dateFrom="";
        $dateTo="";
        $cutOff =  $_POST['cut-off'];
        $month =  $_POST['month'];
        $year =  $_POST['year'];

        //First cutoff
        if($cutOff==1){
            $dateFrom = "$year-$month-01";
            $dateTo = "$year-$month-15";
        }else if($cutOff==2){
            //2nd cutoff
            if ($month == 2) {
                $dateFrom = "$year-$month-16";
                $dateTo = "$year-$month-28";
            } else if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
                $dateFrom = "$year-$month-16";
                $dateTo = "$year-$month-30";
            } else if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) {
                $dateFrom = "$year-$month-16";
                $dateTo = "$year-$month-31";
            }
        }

        $dateRange = '['.$dateFrom.'] - ['.$dateTo.']';
        // $_SESSION['success'] = 'Date range:'.$dateRange;

        //GET THE HIGHEST COUNT
        $checkDays_sql = "SELECT COUNT(DISTINCT date) AS maxDaysOfWork 
              FROM employee_financial_list AS efl
              LEFT JOIN employees ON employees.employee_id = efl.employee_id
              WHERE efl.date BETWEEN '$dateFrom' AND '$dateTo' AND employees.archive = 'no'";

            $checkDays_query = $conn->query($checkDays_sql);

            if ($checkDays_query->num_rows < 1) {
            $_SESSION['error'] = 'No rows found';
            } else {
            $checkDays_row = $checkDays_query->fetch_assoc();
            $greater_num_days_of_work = (int)$checkDays_row["maxDaysOfWork"];
            }

            // echo "$greater_num_days_of_work";
            // exit();

                    



            // query for employee payroll
            $sql2 = "SELECT SUM(CAST(efl.meal_allowance AS DECIMAL(10,2))) AS meal_allowance,
                SUM(CAST(efl.adjustments AS DECIMAL(10,2))) AS adjustments,
                SUM(CAST(efl.transportation AS DECIMAL(10,2))) AS transportation,
                SUM(CAST(efl.incentives_value AS DECIMAL(10,2))) AS incentives_value,
                CAST(efl.base_pay AS DECIMAL(10,2)) AS base_pay,
                CAST(efl.salary AS DECIMAL(10,2)) AS rate,
                CAST(efl.leave_credits AS DECIMAL(10,2)) AS leave_credits,
                COUNT(DISTINCT efl.date) AS days_of_work,
                efl.employee_id AS employee_id,
                efl.sss_emp AS sss_emp,
                efl.pagibig_emp AS pagibig_emp,
                efl.philhealth_emp AS philhealth_emp,
                efl.sss_emp AS sss_employeer,
                efl.pagibig_emp AS pagibig_employeer,
                efl.philhealth_emp AS philhealth__employeer
                FROM employee_financial_list AS efl
                LEFT JOIN cashadvance ON cashadvance.employee_id = efl.employee_id
                LEFT JOIN employees ON employees.employee_id = efl.employee_id
                WHERE efl.date BETWEEN '$dateFrom' AND '$dateTo' AND employees.archive = 'no'
                GROUP BY efl.employee_id
                ";
    
    
                $query2 = $conn->query($sql2);
                if($query2->num_rows < 1){
                    $_SESSION['error'] = 'No rows found';
                }else{
                        // $test[] ='';
                        while($row2 = $query2->fetch_assoc()){
                        $addEmployee = $row2['employee_id'];
                        $date = date('Y-m-d');
                        
                        $mealAllowance = (float)$row2["meal_allowance"];
                        $adjustments = (float)$row2["adjustments"];
                        $transportation = (float)$row2["transportation"];
                        $salary = 0;
                        $base_pay = (float)$row2["base_pay"]/2;
                        $tempBase_pay = $base_pay;
                        $rate = (float)$row2["rate"];
                        $leave_credits = (float)$row2["leave_credits"];
                        $incentivesValue = (float)$row2["incentives_value"];
 
                        $daysOfWork = (float)$row2["days_of_work"];
                        $numOfAbsent = 0;
                        
                        if($greater_num_days_of_work > $daysOfWork){
                            $numOfAbsent = $greater_num_days_of_work - $daysOfWork;
                            if($numOfAbsent > 0){
                                $incentivesValue = 0;
                                $leave_credits -= $numOfAbsent;
                                if($leave_credits < 0){
                                    $x = $numOfAbsent + $leave_credits;
                                    $base_pay -= ($x * $rate);
                                    $salary = $base_pay;

                                    //set to zero not to diplay negative
                                    $leave_credits = 0;
                                }else{
                                    $salary = $base_pay;
                                }
                            }
                        }else{
                            $salary = $base_pay;
                        }

                    // echo "
                    // Incentives value: $incentivesValue<br>
                    // employee days worked: $daysOfWork<br>
                    // Number of work days: $greater_num_days_of_work<br>
                    // ";
                    //     exit();
                    

                        // $_SESSION['success'] = "mealAllowance:  $mealAllowance\n
                            // adjustments:  $adjustments\n
                            // transportation:  $transportation\n
                            // Incentives value:  $incentivesValue\n";

                        //EmployeeR contribution
                        $sssEmployeer = !empty((float)$row2["sss_employeer"]) ? $row2["sss_employeer"] : 1;
                        // $tinEmployeer = !empty((float)$row2["tin_employeer"]) ? $row2["tin_employeer"] : 0;
                        $philhealthEmployeer = !empty((float)$row2["philhealth_employeer"]) ? $row2["philhealth_employeer"] : 1;
                        $pagibigEmployeer = !empty((float)$row2["pagibig_employeer"]) ? $row2["pagibig_employeer"] : 0;
                        
                        //TEST employeer contribution
                            // $_SESSION['success'] = "sss_employeer:  $sssEmployeer\n
                            // tin_employeer:  $tinEmployeer\n
                            // philhealth_employeer:  $philhealthEmployeer\n
                            // pagibig_employeer:  $pagibigEmployeer\n";

                        //EmployeE contribution
                        $sssEmp = !empty((float)$row2["sss_emp"]) ? $row2["sss_emp"] : 1;
                        // $tinEmp = !empty((float)$row2["tin_emp"]) ? $row2["tin_emp"] : 0;
                        $philhealthEmp = !empty((float)$row2["philhealth_emp"]) ? $row2["philhealth_emp"] : 1;
                        $pagibigEmp = !empty((float)$row2["pagibig_emp"]) ? $row2["pagibig_emp"] : 0;                    
                
                        // TEST emp contribution
                            //$_SESSION['success'] = "
                            //sss_employeer:  $sssEmployeer\n
                            //tin_employeer:  $tinEmployeer\n
                            //philhealth_employeer:  $philhealthEmployeer\n
                            //pagibig_employeer:  $pagibigEmployeer\n
                            //sss_emp:  $sssEmp\n
                            //tin_emp:  $tinEmp\n
                            //philhealth_emp:  $philhealthEmp\n
                            //pagibig_emp:  $pagibigEmp\n
                            //";

                        $grossEarnings = $mealAllowance + $adjustments + $transportation + $incentivesValue + $salary;
                        //creeate temp to pass the gross earning value
                        $tempGross = $grossEarnings;

                          // Query for income tax
                          $incomeTax = 0;
                            $sql_tin = "SELECT * FROM income_tax";
                            $query_tin = $conn->query($sql_tin);
                            while($row_tin = $query_tin->fetch_assoc()){
                                $firstBracket = $row_tin['first_bracket'];
                                $secondBracket = $row_tin['second_bracket'];
                                // $taxRate = $row_tin['tax_rate'];
                                $taxRate = !empty($row_tin['tax_rate']) ? (float)$row_tin['tax_rate'] : 1;
                                $id = $row_tin['id'];
                                }
                               

                                $currentDate = date('Y-m-d');
                                // Check if the current date is December 31st
                                if (date('m-d', strtotime($currentDate)) == '12-31') {
                                        $incomeTax = (float)$taxRate*(float)$tempBase_pay;
                                        if($id && $tempBase_pay>=$firstBracket || $tempBase_pay<=$secondBracket){
                                            echo $incomeTax."<br/>";
                                        // $test = "
                                            // FirstBracket: $firstBracket<br>
                                            // SecondBracket: $secondBracket<br/>
                                            // TaxRate: $taxRate<br>
                                            // ";
                                            // echo $test;
                                        }
                                } else {
                                    // If it's not December 31st, do something else or skip tax computation
                                    echo "Not December 31st. No tax computation needed.\n";
                                }
                        
                        //after income tax computation pass the original value of gross earnings to compute sss,pagibig, and phil.
                        $grossEarnings = $tempGross;

                        //Initialize
                        $cashAdvance = 0;
                        $payPerCutOff = 0;
                        $balance = 0;

                        $sql_ca = "SELECT * FROM cashadvance WHERE employee_id = '$addEmployee' ORDER BY id DESC LIMIT 1";
                        $query_ca = $conn->query($sql_ca);

                        if ($query_ca->num_rows > 0) {
                            $row_ca = $query_ca->fetch_assoc();

                            $cashAdvance = (float)$row_ca["amount"];
                            $payPerCutOff = (float)$row_ca["pay_per_cut_off"];
                            $balance = (float)$row_ca["balance"];
                           
                        }
                        //  TEST cash advance
                        //cash advance computation
                        if($balance>0){
                            $balance-=$payPerCutOff;
                            if($balance<0){
                                $balance = 0;
                                // INSERTION FOR CASHADVANCE SUMMARY
                                $sql = "INSERT INTO cashadvance (employee_id, date_advance, amount, pay_per_cut_off, balance) VALUES ('$addEmployee', CURDATE(), '$cashAdvance', '$payPerCutOff', '$balance')";
                                $conn->query($sql);
                            }else{
                                // INSERTION FOR CASHADVANCE SUMMARY
                                $sql = "INSERT INTO cashadvance (employee_id, date_advance, amount, pay_per_cut_off, balance) VALUES ('$addEmployee', CURDATE(), '$cashAdvance', '$payPerCutOff', '$balance')";
                                $conn->query($sql);
                            }

                            //  $test = "
                            //     cash advacne: ".$row_ca["id"]."<br>
                            //     cash advacne: $cashAdvance<br>
                            //     pay per cut off: $payPerCutOff<br>
                            //     balance: $balance<br>
                            //     ";
                            //     echo $test;
                            //     exit();
                        }
                        
                        //SSS employee contribution
                        $sssEmpContribution = ($sssEmp * $tempBase_pay);
                        //SSS employeerrr contribution
                        $sssEmployeerContribution = ($sssEmployeer * $tempBase_pay);

                        //Philhealth employee contribution
                        $philhealthEmpContribution = ($philhealthEmp * $tempBase_pay);
                        //Philhealth employeeRR contribution
                        $philhealthEmployeerContribution = ($philhealthEmployeer * $tempBase_pay);

                        //pagibig employee contribution
                        $pagibigEmpContribution = ($pagibigEmp);
                        //pagibig employeeRR contribution
                        $pagibigEmployeerContribution = ($pagibigEmployeer);

                        // $test = "<br>
                            // basepay:$tempBase_pay<br>
                            // ssemployee: $sssEmpContribution($sssEmp)<br>
                            // ssemployeeR: $sssEmployeerContribution($sssEmployeer)<br>
                            // philhealthemployee: $philhealthEmpContribution($philhealthEmp)<br>
                            // philhealthemployeRR: $philhealthEmployeerContribution($philhealthEmployeer)<br>
                            // pagibigemployee: $pagibigEmpContribution($philhealthEmp)<br>
                            // pagibigemployeRR: $pagibigEmployeerContribution($pagibigEmployeer)<br>
                            // ";
                            // echo $test;
                         // exit();
                        //total deductions
                        $totalDeduction = 0;
                        
                        //mimimum wage
                        $sql_wage = "SELECT current_wage FROM wage";
                        $query_wage = $conn->query($sql_wage);
                        $row_wage = $query_wage->fetch_assoc();

                        $wage = (float)$row_wage['current_wage'];
                        
                        //Check where to apply deduction based on cut off
                        if($cutOff==1){
                            //first cutoff only deduct sss
                            $totalDeduction = $pagibigEmpContribution;
                            $sssEmpContribution = 0;
                            $philhealthEmpContribution = 0;
                        }else{
                            //2nd cut off deducts sss and philhealth
                            $totalDeduction = $sssEmpContribution + $philhealthEmpContribution;
                            $pagibigEmpContribution = 0;
                        }

                        //apply deduction when rate is  above minimum wage
                        if($rate>$wage){
                            $totalDeduction += $payPerCutOff;
                        }else{
                            $sssEmpContribution = 0;
                            $philhealthEmpContribution = 0;
                            $pagibigEmpContribution = 0;
                        }

                        $netSalary = $grossEarnings - $totalDeduction;
                        $grossEarnings = $tempGross;


                        //TEST CONTRIBUTIONS
                            // $test = "
                            // GROSS:  $grossEarnings<br>
                            // sss_Contribution:  $sssEmpContribution<br>
                            // tin_Contribution:  $philhealthEmpContribution<br>
                            // philhealth_Contribution:  $philhealthEmpContribution<br>
                            // Total Deduction:  $totalDeduction<br>
                            // Net salary:  $netSalary<br>
                            // Wage:  $wage<br>";
                            // echo $test;

                        //13th month pay
                        // $sql_13th = "INSERT INTO _13th_pay (date_range, employee_id, date) VALUES('$dateRange','$addEmployee',CURDATE())";
                        // $conn->query($sql_13th);
 
                        //INSERTION FOR PAYSLIP
                        $sql = "INSERT INTO payroll_employee (employee_id, date_range, salary, meal_allowance, incentives, adjustments, transportation,sss,sss_employeer,pagibig,pagibig_employeer,tin,philhealth,philhealth_employeer,cashadvance,pay_per_cut_off,cashadvance_balance,total_deduction,gross,net_salary,num_days_work, workdays_total, num_of_absent, remaining_credits, created_on) VALUES ('$addEmployee', '$dateRange', '$salary','$mealAllowance','$incentivesValue','$adjustments','$transportation','$sssEmpContribution', '$sssEmployeerContribution', '$pagibigEmpContribution','$pagibigEmployeerContribution','$incomeTax','$philhealthEmpContribution','$philhealthEmployeerContribution','$cashAdvance','$payPerCutOff','$balance','$totalDeduction','$grossEarnings','$netSalary','$daysOfWork','$greater_num_days_of_work','$numOfAbsent', '$leave_credits','$date')";
                        if($conn->query($sql)){
                            $success = true;
                        }
                        else{
                            $error = false;
                            break;
                        }
                        // $_SESSION['success'] = 'Employee attendance date found its match on salary calculation'.$test;
                    }//end while
                    if($success){
                    	$_SESSION['success'] = 'payroll added successfully';
                    }else if($error){
                        $_SESSION['error'] = $conn->error;
                    }
            }
            // exit();

            //end sql2, query2
		// $_SESSION['success'] = 'Employee found';
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}
    header('location: financial_statement.php');
?>