<?php
require_once 'db.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name'] ?? '');
    $location = $conn->real_escape_string($_POST['location'] ?? '');
    $rating = intval($_POST['rating'] ?? 5);
    $feedback = $conn->real_escape_string($_POST['feedback'] ?? '');
    $created_at = date('Y-m-d H:i:s');

    if (!$name || !$location || !$rating || !$feedback) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit;
    }

    $sql = "INSERT INTO testimonials (name, location, rating, feedback, created_at) VALUES ('$name', '$location', $rating, '$feedback', '$created_at')";
    if ($conn->query($sql)) {
        echo json_encode(['success' => true, 'message' => 'Thank you for your review!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
