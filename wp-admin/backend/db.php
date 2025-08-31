<?php


// $host = 'localhost';
// $user = 'root';
// $password = '';
// $dbname = 'livehome';

$host = 'localhost';
$user = 'vattava2_livehome';
$password = 'vattava2_livehome';
$dbname = 'vattava2_livehome';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
