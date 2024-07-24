<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("UPDATE sessions SET end_time = NOW() WHERE user_id = ? AND end_time IS NULL");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    echo "Session ended!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
?>
