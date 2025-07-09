<?php
session_start();
require 'db.php';
require 'includes/deviceInfo.php';

// Assuming user is authenticated
$userId = /* fetched user id */;
$_SESSION['user_id'] = $userId;

$info = getDeviceInfo();
$now = date('Y-m-d H:i:s');
$stmt = $pdo->prepare("
  INSERT INTO user_sessions (user_id, device, browser, os, ip, last_active)
  VALUES (?, ?, ?, ?, ?, ?)
");
$stmt->execute([$userId, $info['device'], $info['browser'], $info['os'], $info['ip'], $now]);

header('Location: dashboard.php');
exit;
