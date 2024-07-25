<?php



$time = date('H:i');
$day = date('D');		
$assignedLocation = $addLocation;
$schedule = $date;
$assMealAllowance = $addMealAllowance;
$assAdjustments = $addAdjustments;
$assTranspo = $addTranspo;

$sql_ass = "INSERT INTO ass_sched_fin (ass_employee_id, ass_employee_id_sc, ass_location, ass_meal_allowance, ass_adjustments, ass_transpo, ass_position, ass_schedule, date_created, time, day) 
VALUES ('$id', '$employee','$assignedLocation', '$assMealAllowance', '$assAdjustments', '$assTranspo','$positionId','$schedule',CURDATE(), '$time', '$day')";
$conn->query($sql_ass);


$sql2 = "SELECT *,
employees.employee_id AS employee_id,
position.description AS position,
philhealth.employeer_contribution AS ph_employeer_con,
philhealth.employee_contribution AS ph_emp_con,
pagibig.employeer_contribution AS pg_employeer_con,
pagibig.employee_contribution AS pg_emp_con,
sss.employeer_contribution AS ss_employeer_con,
sss.employee_contribution AS ss_emp_con,
position.rate AS salary,
ass_sched_fin.ass_meal_allowance AS ass_meal_allowance,
ass_sched_fin.ass_adjustments AS ass_adjustments,
ass_sched_fin.ass_transpo AS ass_transpo,
ass_sched_fin.date_created AS date_hatched,
ass_sched_fin.ass_location AS location_id,
ass_sched_fin.date_created AS ass_date,
MAX(ass_sched_fin.id) AS last_row,
location.doc AS doc,
location.incentives AS incentives,
COUNT(ass_sched_fin.ass_employee_id) AS numberOfCrew
FROM ass_sched_fin
LEFT JOIN employees ON ass_sched_fin.ass_employee_id = employees.id
LEFT JOIN location ON ass_sched_fin.ass_location = location.id
LEFT JOIN position ON ass_sched_fin.ass_position = position.id
LEFT JOIN deductions AS sss ON employees.sss_deduction = sss.id
LEFT JOIN deductions AS philhealth ON employees.philhealth_deduction = philhealth.id
LEFT JOIN deductions AS pagibig ON employees.pagibig_deduction = pagibig.id
WHERE employees.employee_id = '$employee' AND employees.archive='no'";

$query2 = $conn->query($sql2);
if ($query2->num_rows > 0) {
    $lastRow = 0;
    while ($row = $query2->fetch_assoc()) {
        //Employee id
        $employeeId = $row['employee_id'];
        $locationId = $row['location_id'];
        $assDate = $row['ass_date'];

        //Date hatched
        $dateHatched = $row['date_hatched'];

        //Pagibig contribution
        $pagibigEmployeer = $row['pg_employeer_con'];
        $pagibigEmp = $row['pg_emp_con'];
        //Philhealth contribution
        $philhealthEmployeer = $row['ph_employeer_con'];
        $philhealthEmp = $row['ph_emp_con'];
        //SSS contribution
        $sssEmployeer = $row['ss_employeer_con'];
        $sssEmp = $row['ss_emp_con'];
        //TIN contribution

        //TEST
        // Pagibig contribution
        $_SESSION['success'] = "
        PG-Employeer: $pagibigEmployeer>>
        PG-Emp: $pagibigEmp>>";
        // Philhealth contribution
        $_SESSION['success'] = "
        PH-Employeer: $philhealthEmployeer>>
        PH-Emp: $philhealthEmp";
        // SSS contribution
        $_SESSION['success'] = "
        SSS-Employeer: $sssEmployeer>>
        SSS-Emp: $sssEmp";

        $salary = (float)$row['salary'];
        $assMealAllowance = (float)$row['ass_meal_allowance'];
        $assAdjustments = (float)$row['ass_adjustments'];
        $assTranspo = (float)$row['ass_transpo'];
        $doc = (float)$row['doc'];
        $incentives = (float)$row['incentives'];
        $numberOfCrew = (int)$row['numberOfCrew'];

        

        $_SESSION['success'] = "
        assMealAllowance: $assMealAllowance<br/>assAdjustments: $assAdjustments<br/>assTranspo: $assTranspo<br/>doc: $doc<br/>TotalCrew: $numberOfCrew<br/>incentives: $incentives<br/>incentivesValue: $incentivesValue<br/>";
    $lastRow = $row['last_row'];
    }//end while
        $incentivesRate = $doc * $incentives;
        $incentivesValue = $incentivesRate/$numberOfCrew;


        // $sql3 = "INSERT INTO employee_financial_list (employee_id, date, salary, meal_allowance, incentives_value, adjustments, transportation, sss_employeer,sss_emp, philhealth_employeer,philhealth_emp, pagibig_employeer,pagibig_emp,location_id, ass_sched_fin_date) VALUE('$employeeId', '$date', '$salary','$assMealAllowance','$incentivesValue','$assAdjustments','$assTranspo','$sssEmployeer','$sssEmp','$philhealthEmployeer','$philhealthEmp','$pagibigEmployeer','$pagibigEmp', '$locationId', '$assDate')";
        // if($conn->query($sql3)){
        //     $_SESSION['success'] = "An employee have successfully signed in";

        // }
        // else{
        //     $_SESSION['error'] = "Error: ".$conn->error;
        // }

$sql_sched_delete = "DELETE FROM ass_sched_fin WHERE id =  $lastRow";
$conn->query($sql_sched_delete);
} else {
    $_SESSION['error'] = "Error: ".$conn->error;
}
?>
