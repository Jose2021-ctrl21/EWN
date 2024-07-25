<?php
session_start();
function backDb($host, $user, $pass, $dbname, $tables = '*') {
    try {
        // Make database connection
        $conn = new mysqli($host, $user, $pass, $dbname);
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        // Initialize output SQL
        $outsql = '';

        // Get all tables or specified tables
        if ($tables == '*') {
            $tables = array();
            $sql = "SHOW TABLES";
            $query = $conn->query($sql);
            if (!$query) {
                throw new Exception("Error fetching tables: " . $conn->error);
            }
            while ($row = $query->fetch_row()) {
                $tables[] = $row[0];
            }
        } else {
            $tables = is_array($tables) ? $tables : explode(',', $tables);
        }

        // Backup each table
        foreach ($tables as $table) {
            // Get table structure
            $sql = "SHOW CREATE TABLE $table";
            $query = $conn->query($sql);
            if (!$query) {
                throw new Exception("Error fetching table structure for table '$table': " . $conn->error);
            }
            $row = $query->fetch_row();
            $outsql .= "\n\n" . $row[1] . ";\n\n";

            // Get table data
            $sql = "SELECT * FROM $table";
            $query = $conn->query($sql);
            if (!$query) {
                throw new Exception("Error fetching data for table '$table': " . $conn->error);
            }
            $columnCount = $query->field_count;

            while ($row = $query->fetch_row()) {
                $outsql .= "INSERT INTO $table VALUES(";
                for ($i = 0; $i < $columnCount; $i++) {
                    $row[$i] = $conn->real_escape_string($row[$i]); // Sanitize input
                    $outsql .= '"' . $row[$i] . '"';
                    if ($i < ($columnCount - 1)) {
                        $outsql .= ',';
                    }
                }
                $outsql .= ");\n";
            }
            $outsql .= "\n";
        }

        // Specify the directory where the backup file will be saved
        $backup_directory = 'upload/';
        if (!is_dir($backup_directory)) {
            mkdir($backup_directory, 0777, true); // Create the directory if it doesn't exist
        }

        // Save SQL script to a backup file
        $backup_file_name = $backup_directory . $dbname . '_backup_' . date('Ymd_His') . '.sql';
        $fileHandler = fopen($backup_file_name, 'w+');
        if (!$fileHandler) {
            throw new Exception("Error opening backup file '$backup_file_name' for writing.");
        }
        fwrite($fileHandler, $outsql);
        fclose($fileHandler);

        // Optionally, provide a download link or message
        $message =  "Backup completed successfully. The backup file is saved at: $backup_file_name";
        $_SESSION['success'] = $message;
        header("Location: ../database_backup.php");

    } catch (mysqli_sql_exception $e) {
        $_SESSION['error'] = "MySQLi Error: " . $e->getMessage();
        header("Location: ../database_backup.php"); // Redirect to your form page
        exit();
    } catch (Exception $e) {
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: ../database_backup.php"); // Redirect to your form page
        exit();
    }
}
?>
