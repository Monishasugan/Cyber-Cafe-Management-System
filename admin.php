<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

echo "<h1>Admin Panel</h1>";

$result = $conn->query("SELECT u.username, s.start_time, s.end_time 
                        FROM sessions s
                        JOIN users u ON s.user_id = u.id
                        ORDER BY s.start_time DESC");

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Username</th><th>Start Time</th><th>End Time</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['username']}</td>
                <td>{$row['start_time']}</td>
                <td>{$row['end_time']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No sessions found.";
}
?>
