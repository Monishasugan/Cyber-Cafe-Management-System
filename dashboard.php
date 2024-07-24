<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SESSION['role'] == 'admin') {
    echo "<a href='admin.php'>Admin Panel</a><br>";
}

echo "<a href='start_session.php'>Start Session</a><br>";
echo "<a href='end_session.php'>End Session</a><br>";
echo "<a href='logout.php'>Logout</a><br>";
?>
