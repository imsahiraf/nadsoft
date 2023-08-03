<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'nad';

// Connect to the database using PDO
try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
