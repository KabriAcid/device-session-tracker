<?php
$pdo = new PDO('mysql:host=localhost;dbname=tracker', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);