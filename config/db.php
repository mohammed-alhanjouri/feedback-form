<?php
/*
 
Now we want to connect to the Database
There is two main ways (APIs) to connect to databases with Vanilla PHP: 
    - MySQLi (MySQL Improved): 
        * Works only with MySQL databases.
        * Easier for beginners and supports both procedural and OOP styles.
    - PDO (PHP Data Objects): 
        * More flexible, can work with multiple database types.
        * Preferred for advanced features.

*/

// Database Configuration
// Define constants for database connection
define ('DB_HOST', 'localhost');
define ('DB_USER', 'Moha');
define ('DB_PASS', '01001101');
define ('DB_NAME', 'feedback_db');

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


?>
