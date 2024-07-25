<?php 
include 'includes/session.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $sql = "SELECT *, ass_sched_fin.ass_employee_id AS empid FROM ass_sched_fin
    LEFT JOIN location ON ass_sched_fin.ass_location = location.id
    LEFT JOIN schedules ON ass_sched_fin.ass_schedule = schedules.id
    LEFT JOIN employees ON ass_sched_fin.ass_employee_id = employees.id
    WHERE ass_sched_fin.id = '$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();
    echo json_encode($row);
}
?>
