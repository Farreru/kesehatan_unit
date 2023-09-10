<?php
// Database connection settings
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_kesehatan_unit';

// Output file path and name
$backupFileName = 'database_backup_' . date('Y-m-d_H-i-s') . '.sql';

// Determine the environment (Laragon or XAMPP)
$environment = '';

// Check if Laragon path exists
if (file_exists('C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin\mysqldump.exe')) {
    $environment = 'laragon';
    $fullPathToMysqldump = 'C:\laragon\bin\mysql\mysql-8.0.30-winx64\bin\mysqldump.exe';
} elseif (file_exists('C:\xampp\mysql\bin\mysqldump.exe')) {
    $environment = 'xampp';
    $fullPathToMysqldump = 'C:\xampp\mysql\bin\mysqldump.exe'; // Replace with the actual full path for XAMPP
}

// If the environment is not recognized, exit
if (empty($environment)) {
    echo "Unknown environment. Please check your setup.";
    exit;
}

// Create a command to execute the mysqldump utility
$command = "{$fullPathToMysqldump} --user={$username} --password={$password} --host={$host} {$database} 2>&1 > {$backupFileName}";

// Execute the command using the shell_exec function
$output = shell_exec($command);

// Check if the backup was successful
if ($output === null) {
    echo "Backup failed. Please check your settings and try again.";
} else {
    echo "Backup completed successfully in the {$environment} environment. The SQL dump has been saved to: {$backupFileName}";
}
