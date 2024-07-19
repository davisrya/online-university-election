<?php
session_start();

include '../includes/dbh.inc.php';
// Check if the user is logged in as an admin
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php'); 
    exit();
}

$error = 0;
$msg = '';

try {
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $registerNo = $_POST['registerNo'];
        $email = $_POST['email'];
        $mobileNo = $_POST['mobileNo'];
        $pwd = $_POST['pwd'];
        $cpwd = $_POST['cpwd'];

        if (empty($username)) {
            $username_error = "Please enter Name";
            $error = 1;
        } else if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
            $username_error = "Only letters allowed";
            $error = 1;
        }

        if(empty($registerNo)) {
            $registerNo_error = "Please enter Registration Number";
            $error = 1; 
        }

        if (empty($email)) {
            $email_error = "Please enter Email";
            $error = 1;
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid Email Format";
            $error = 1;
        }

        if (empty($mobileNo)) {
            $mobile_error = "Please enter Mobile Number";
            $error = 1;
        }

        if(empty($pwd)) {
            $pwd_error = "Please enter Password for Security";
            $error = 1; 
        } else if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $_POST['pwd'])) {
            $pwd_error = "Password must be at least 8 characters long and contain at least one number, one uppercase, and one lowercase letter.";
            $error = 1;
        }
    
        // Match passwords
        if ($_POST['pwd'] !== $_POST['cpwd']) {
            $cpwd_error = "Passwords do not match.";
            $error = 1;
        }
    
        if ($error == 0) {  
            $options = [
                'cost' => 12
            ];
        
            $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

            $stmt = $conn->prepare("INSERT INTO admin (username, registerNo,  email, mobileNo, pwd) 
                                    VALUES (:username, :registerNo, :email, :mobileNo, :pwd)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':registerNo', $registerNo);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mobileNo', $mobileNo);
            $stmt->bindParam(':pwd', $hashedPwd);

            if ($stmt->execute()) {
                $msg = "Registration Successful";
                header("Location: admin_login.php?msg=success");
                exit(); 
            } else {
                $msg = "Error in registration.";
            } 
        } else {
            $msg = "Please fill all the fields";
        }
    } 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

