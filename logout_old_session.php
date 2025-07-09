<?php
session_start();
require 'db.php';

$id = intval($_GET['id']);
$pdo->prepare("DELETE FROM user_sessions WHERE id = ?")
    ->execute([$id]);

header("Location: dashboard.php");
exit;
