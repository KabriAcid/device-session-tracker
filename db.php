<?php
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// create a database 'tracker'
$pdo->exec("CREATE DATABASE IF NOT EXISTS tracker");
$pdo->exec("USE tracker");
$pdo->exec("CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE,
    password_hash VARCHAR(255)
);

CREATE TABLE user_sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    device_name VARCHAR(255),
    browser VARCHAR(255),
    os VARCHAR(255),
    ip_address VARCHAR(50),
    last_active DATETIME,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);");