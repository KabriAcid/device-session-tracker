<?php
$daysOld = 180; // 6 months
$stmt = $pdo->prepare("SELECT * FROM user_sessions WHERE user_id = ? AND last_active < NOW() - INTERVAL ? DAY");
$stmt->execute([$userId, $daysOld]);
$oldSessions = $stmt->fetchAll();

foreach ($oldSessions as $session) {
    echo "Old session from: {$session['device_name']} ({$session['ip_address']})";
    echo "<a href='signout_session.php?id={$session['id']}'>Sign Out</a><br>";
}
