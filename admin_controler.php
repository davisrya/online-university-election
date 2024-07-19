<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php'); // Redirect to admin login page
    exit();
}

// Database connection
include '../includes/dbh.inc.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $position = $_POST['position'];
    $image = $_FILES['image']['name'];
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            try {
                $stmt = $conn->prepare("INSERT INTO candidates (name, age, course, year, position, image) VALUES (:name, :age, :course, :year, :position, :image)");
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':age', $age);
                $stmt->bindParam(':course', $course);
                $stmt->bindParam(':year', $year);
                $stmt->bindParam(':position', $position);
                $stmt->bindParam(':image', $image);
                
                if ($stmt->execute()) {
                    $_SESSION['message'] = "Candidate inserted successfully";
                } else {
                    $_SESSION['message'] = "Error inserting candidate";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            $_SESSION['message'] = "Sorry, there was an error uploading your file.";
        }
    } else {
        $_SESSION['message'] = "File is not an image.";
    }

    header("Location: adminHome.php");
    exit();
}
?>
