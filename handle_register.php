<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../includes/dbh.inc.php';

$error = 0;
$msg = '';

try {
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $mobileNo = $_POST['mobileNo'];
        $gender = $_POST['gender'];
        /*$nationalId = $_POST['nationalId'];*/
        $registerNo = $_POST['registerNo'];
        $college = $_POST['college'];
        $program = $_POST['program'];
        $studyYear = $_POST['year'];
        $pwd = $_POST['pwd'];
        $cpwd = $_POST['cpwd'];

        if (empty($username)) {
            $username_error = "Please enter Name";
            $error = 1;
        } else if (!preg_match("/^[a-zA-Z ]*$/", $username)) {
            $username_error = "Only letters allowed";
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

        if(empty($gender)) {
            $gender_error = "Please select Your gender";
            $error = 1; 
        }

        /*if(empty($nationalId)) {
            $national_error = "Please enter National Identity Number";
            $error = 1; 
        }*/
    
        if(empty($registerNo)) {
            $registerNo_error = "Please enter Registration Number";
            $error = 1; 
        }

        if(empty($college)) {
            $college_error = "Please Select your College";
            $error = 1; 
        }

        if(empty($program)) {
            $program_error = "Please Select Your Program";
            $error = 1; 
        }
    
        if(empty($studyYear)) {
            $study_error = "Please Select Your Year of Study";
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

            $stmt = $conn->prepare("INSERT INTO student (username, email, mobileNo, gender, registerNo, college, program, studyYear, pwd) 
                                    VALUES (:username, :email, :mobileNo, :gender, :registerNo, :college, :program, :studyYear, :pwd)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mobileNo', $mobileNo);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':registerNo', $registerNo);
            $stmt->bindParam(':college', $college);
            $stmt->bindParam(':program', $program);
            $stmt->bindParam(':studyYear', $studyYear);
            $stmt->bindParam(':pwd', $hashedPwd);

            if ($stmt->execute()) {
                $msg = "Registration Successful";
                header("Location: login_succesful.php?msg=success");
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
?>