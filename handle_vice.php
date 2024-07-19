<?php
session_start();
include '../includes/dbh.inc.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

try {
    $stmt = $conn->prepare("SELECT * FROM candidates WHERE position = ?");
    $stmt->execute(['vice-president']);
    $candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
