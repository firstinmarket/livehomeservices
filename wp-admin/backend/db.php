<?php
// Database connection for livehome
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'livehome';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
