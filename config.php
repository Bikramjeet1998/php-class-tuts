<?php
$server = "localhost";
$database = "bikramjeet";
$username = "root";
$password = "";
try {
    $conn = new pdo("mysql: host =$server;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection failed" . $e->getMessage();
}
