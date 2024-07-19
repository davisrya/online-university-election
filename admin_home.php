<?php
session_start();
include '../includes/dbh.inc.php'; 

// Check if the user is logged in as an admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php'); 
    exit();
}

// Fetch student data
$query = "SELECT * FROM student";
$stmt = $conn->prepare($query);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
