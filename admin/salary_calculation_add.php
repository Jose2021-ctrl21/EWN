<?php
 $sql = "SELECT *,
 COUNT(DISTINCT efl.employee_id) AS crews,
 SUM(efl.meal_allowance) AS meal_allowance,
 SUM(efl.adjustments) AS adjustments,
 SUM(efl.transportation) AS transportation,
 location.doc AS doc,
 efl.incentives_value AS incentives_value,
 efl.date AS date
 FROM employee_financial_list AS efl
 LEFT JOIN attendance.date ON efl.date = attendance.date
 LEFT JOIN location ON efl.location_id = location.id
 WHERE efl.location_id = efl.location_id = location.id AND 
 GROUP BY efl.location_id, efl.date";

$query2 = $conn->query($sql2);

if ($query2->num_rows > 0) {
    while ($row = $query2->fetch_assoc()) {
      

        $salary = (float)$row['salary'];
        $assMealAllowance = (float)$row['ass_meal_allowance'];
        $assAdjustments = (float)$row['ass_adjustments'];
        $assTranspo = (float)$row['ass_transpo'];
        $doc = (float)$row['doc'];
        $incentives = (float)$row['incentives'];
        $numberOfCrew = (int)$row['numberOfCrew'];

        
    }//end while
        $incentivesRate = $doc * $incentives;
        $incentivesValue = $incentivesRate/$numberOfCrew;
        $total_cost = $doc + $assMealAllowance;


        $output['message'] = "
        assMealAllowance: $assMealAllowance>>assAdjustments: $assAdjustments>>assTranspo: $assTranspo>>doc: $doc>>TotalCrew: $numberOfCrew>>incentives: $incentives>>incentivesValue: $incentivesValue>>";

        // INSERT FOR FINANCIAL_STATEMENT_LIST_EMP
        // $sql3 = "INSERT INTO salary_calculation (date_hatch, total_doc, incentives, incentives_value, xtmeal_allowance, meal_allowance, crew,total_cost, location_id) VALUE('$dateHatched', '$doc','$incentives','$incentivesValue','$assAdjustments','$assMealAllowance','$numberOfCrew','$total_cost',$locationId)";
        // if($conn->query($sql3)){
            $output['message'] = "You have successfully signed in";
        // }
        // else{
        //     $output['message'] = "Error: ".$conn->error;
        // }
} else {
    $output['message'] = "Error: ".$conn->error;
}
?>
