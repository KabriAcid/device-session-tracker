<?php
session_start();
require 'db.php';

$userId = $_SESSION['user_id'];
$thresholdDays = 180;

$stmt = $pdo->prepare("
  SELECT id, device, browser, os, ip, last_active
  FROM user_sessions
  WHERE user_id = ? AND last_active < NOW() - INTERVAL ? DAY
");
$stmt->execute([$userId, $thresholdDays]);
$oldSessions = $stmt->fetchAll();

echo "<h2>Old Device Sessions</h2>";
if (empty($oldSessions)) {
    echo "✅ No old sessions found.";
} else {
    echo "<ul>";
    foreach ($oldSessions as $s) {
        echo "<li>
      {$s['device']} – {$s['browser']} on {$s['os']} from {$s['ip']}
      (Last seen: {$s['last_active']})
      <a href=\"logout_session.php?id={$s['id']}\">Sign Out</a>
    </li>";
    }
    echo "</ul>";
}
