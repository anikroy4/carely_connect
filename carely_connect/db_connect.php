<?php
// db_connect.php
$host = 'localhost';  // Or your MySQL host
$dbname = 'carely_connect';
$username = 'root';   // Your MySQL username
$password = '';       // Your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optional: Enable query logging for debugging
    // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Example usage in another file (e.g., events.php):
// require_once 'db_connect.php';
// $stmt = $pdo->query("SELECT * FROM events");
// $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
// foreach ($events as $event) { echo $event['title']; }
?>