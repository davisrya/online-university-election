<?php
session_start(); 


include '../includes/dbh.inc.php'; // Include your database connection

if (isset($_POST['login'])) {
    $registerNo = $_POST['registerNo'];
    $pwd = $_POST['pwd'];

    // Error flag
    $error = 0;

    if (empty($registerNo)) {
        $registerNo_error = "Please enter Registration Number";
        $error = 1; 
    }

    if (empty($pwd)) {
        $pwd_error = "Please enter Password";
        $error = 1; 
    }

    if (!$error) {
        try {
            $query = "SELECT * FROM student WHERE registerNo = :registerNo";
            $stmt = $conn->prepare($query);
            $stmt->execute(['registerNo' => $registerNo]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {

                if (password_verify($pwd, $user['pwd'])) {
                    // Password is correct, set session variables and redirect
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    header('Location: ../voting/voting.php');
                    exit();
                } else {
                    // Invalid login, show error message
                    $msg = "Invalid registration number or password";
                }
            } else {
                // No user found
                $msg = "Invalid registration number or password";
            }
        } catch (PDOException $e) {
            $msg = "Database error: " . $e->getMessage();
        }
    }
}

