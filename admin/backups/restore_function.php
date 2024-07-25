<?php
 
 function restore($server, $username, $password, $dbname, $location){
    // Connection
    $conn = new mysqli($server, $username, $password, $dbname); 
 
    // Variable to store queries from our SQL file
    $sql = '';
 
    // Get our SQL file
    $lines = file($location);

 
    // Drop existing tables
    $dropTablesQuery = "SHOW TABLES";
    $result = $conn->query($dropTablesQuery);
    while($row = $result->fetch_array()){
        $tableName = $row[0];
        $dropQuery = "DROP TABLE IF EXISTS $tableName";
        $conn->query($dropQuery);
    }
 
    // Loop through each line of our SQL file
    foreach ($lines as $line){
        // Skip comments and empty lines
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
 
        // Add each line to our query
        $sql .= $line;
 
        // Check if it's the end of the line due to semicolon
        if (substr(trim($line), -1, 1) == ';'){
            // Perform our query
            $query = $conn->query($sql);
            if(!$query){
                $_SESSION['error'] = $conn->error;
                break;
            }
            else{
                $output='Database restored successfully';
                $_SESSION['success'] = $output;
            }
 
            // Reset our query variable
            $sql = '';
        }
    }
   // Header redirect if needed
header('location:../database_restore.php');
}

?>