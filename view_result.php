<?php
session_start();
include '../includes/dbh.inc.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php'); // Redirect to admin login page
    exit();
}

try {
$stmt = $conn->prepare("SELECT c.name, COUNT(v.id) as vote_count 
                        FROM candidates c 
                        LEFT JOIN votes v ON c.id = v.candidate_id 
                        WHERE c.position = 'president' 
                        GROUP BY c.id");
$stmt->execute();
$candidates = $stmt->fetchAll(PDO::FETCH_ASSOC);

 // Fetch votes for Vice-President
 $stmt = $conn->prepare("SELECT c.name, COUNT(v.id) as vote_count 
                        FROM candidates c 
                        LEFT JOIN votes v ON c.id = v.candidate_id 
                        WHERE c.position = 'vice-president' 
                        GROUP BY c.id");
$stmt->execute();
$vpCandidates = $stmt->fetchAll(PDO::FETCH_ASSOC);

 // Fetch votes for Chairperson
 $stmt = $conn->prepare("SELECT c.name, COUNT(v.id) as vote_count 
 FROM candidates c 
 LEFT JOIN votes v ON c.id = v.candidate_id 
 WHERE c.position = 'chairperson' 
 GROUP BY c.id");
$stmt->execute();
$chairCandidates = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
