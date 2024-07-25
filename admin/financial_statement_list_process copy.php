<?php
$sql2 = "SELECT *,
employees.employee_id AS employee_id,
location.assigned_location AS assigned_location,
position.description AS position,
philhealth.employeer_contribution AS ph_employeer_con,
philhealth.employee_contribution AS ph_emp_con,
pagibig.employeer_contribution AS pg_employeer_con,
pagibig.employee_contribution AS pg_emp_con,
sss.employeer_contribution AS ss_employeer_con,
sss.employee_contribution AS ss_emp_con,
tin.employeer_contribution AS tn_employeer_con,
tin.employee_contribution AS tn_emp_con,
position.rate AS salary,
ass_sched_fin.ass_meal_allowance AS ass_meal_allowance,
ass_sched_fin.ass_adjustments AS ass_adjustments,
ass_sched_fin.ass_transpo AS ass_transpo,
location.doc AS doc,
location.incentives AS incentives,
COUNT(ass_sched_fin.ass_employee_id) AS numberOfCrew
FROM ass_sched_fin
LEFT JOIN employees ON ass_sched_fin.ass_employee_id = employees.id
LEFT JOIN location ON ass_sched_fin.ass_location = location.id
LEFT JOIN position ON ass_sched_fin.ass_position = position.id
LEFT JOIN deductions AS sss ON employees.sss_deduction = sss.id
LEFT JOIN deductions AS tin ON employees.tin_deduction = tin.id
LEFT JOIN deductions AS philhealth ON employees.philhealth_deduction = philhealth.id
LEFT JOIN deductions AS pagibig ON employees.pagibig_deduction = pagibig.id";

$query2 = $conn->query($sql2);

if ($query2->num_rows > 0) {
while ($row = $query2->fetch_assoc()) {
    //Employee id
    $employeeId = $row['employee_id'];

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
    $tinEmployeer = $row['tn_employeer_con'];
    $tinEmp = $row['tn_emp_con'];

    //TEST
    //Pagibig contribution
    // $output['message'] = "
    // PG-Employeer: $pagibigEmployeer>>
    // PG-Emp: $pagibigEmp>>";
    //Philhealth contribution
    // $output['message'] = "
    // PH-Employeer: $philhealthEmployeer>>
    // PH-Emp: $philhealthEmp";
    // SSS contribution
    // $output['message'] = "
    // SSS-Employeer: $sssEmployeer>>
    // SSS-Emp: $sssEmp";
    // TIN contribution
    // $output['message'] = "
    // TIN-Employeer: $tinEmployeer>>
    // TIN-Emp: $tinEmp";

    $salary = (float)$row['salary'];
    $assMealAllowance = (float)$row['ass_meal_allowance'];
    $assAdjustments = (float)$row['ass_adjustments'];
    $assTranspo = (float)$row['ass_transpo'];
    $doc = (float)$row['doc'];
    $incentives = (float)$row['incentives'];
    $numberOfCrew = (int)$row['numberOfCrew'];

    $incentivesRate = $doc * $incentives;
    $incentivesValue = $incentivesRate/$numberOfCrew;


    $output['message'] = "
    assMealAllowance: $assMealAllowance>>assAdjustments: $assAdjustments>>assTranspo: $assTranspo>>doc: $doc>>TotalCrew: $numberOfCrew>>incentives: $incentives>>incentivesValue: $incentivesValue>>";

    // $sql3 = "INSERT INTO employee_financial_list (employee_id, salary, meal_allowance, incentives, adjustments, transportation, ) VALUE()";

}
} else {
}
?>
