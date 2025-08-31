<?php
// backend/delete_testimonial.php
require_once 'db.php';
header('Content-Type: application/json');
$id = intval($_POST['id'] ?? 0);
if ($id > 0) {
    $sql = "DELETE FROM testimonials WHERE id = $id";
    if ($conn->query($sql)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid ID']);
}
?>
