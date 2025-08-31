<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name'] ?? '');
    $phone = $conn->real_escape_string($_POST['phone'] ?? '');
    $appliance = $conn->real_escape_string($_POST['appliance'] ?? '');
    $issue = $conn->real_escape_string($_POST['issue'] ?? '');
    $created_at = date('Y-m-d H:i:s');

    $sql = "INSERT INTO service_requests (name,phone, appliance, issue, request_date, status) VALUES ('$name','$phone', '$appliance', '$issue', '$created_at', 'New')";
    if ($conn->query($sql)) {
        echo json_encode(['success' => true, 'message' => 'Request submitted successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
