<?php
session_start(); 

include '../includes/dbh.inc.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    // Error flag
    $error = 0;

    if (empty($email)) {
        $email_error = "Please enter Email";
        $error = 1;
    }

    if (empty($pwd)) {
        $pwd_error = "Please enter Password";
        $error = 1; 
    }

    if (!$error) {
        try {
            $query = "SELECT * FROM admin WHERE email = :email";
            $stmt = $conn->prepare($query);
            $stmt->execute(['email' => $email]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin) {

                if (password_verify($pwd, $admin['pwd'])) {
                    // Password is correct, set session variables and redirect
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['adminName'] = $admin['username'];
                    header('Location: adminhome.php');
                    exit();
                } else {
                    // Invalid login, show error message
                    $msg = "Invalid Email or password";
                }
            } else {
                // No user found
                $msg = "Invalid Email or password";
            }
        } catch (PDOException $e) {
            $msg = "Database error: " . $e->getMessage();
        }
    }
}
