<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("INSERT INTO sessions (user_id, start_time) VALUES (?, NOW())");
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    echo "Session started!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
?>
