<?php
session_start();
include '../includes/dbh.inc.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$candidate_id = $_POST['candidate'];
$position = 'chairperson';

try {
    $stmt = $conn->prepare("INSERT INTO votes (user_id, candidate_id, position) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $candidate_id, $position]);

    $_SESSION['vote_status'] = 'success';
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        $_SESSION['vote_status'] = 'already_voted';
    } else {
        $_SESSION['vote_status'] = 'error';
    }
}

header("Location: president.php");
exit();
