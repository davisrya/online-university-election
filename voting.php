<?php
session_start();
include '../includes/dbh.inc.php'; // Include your database connection

// Check if the user is logged in as an admin
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to admin login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election</title>
    <link rel="stylesheet" href="voting.css">
    <link rel="shortcut icon" type="x-icon" href="../images/logo_ud.png">
</head>

<body>
    <nav>
        <img src="../images/logo.png" class="logo">
        <ul>
            <li><a href="../index.php">HOME</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Hello, <span  style="color: orangered;" ><?php echo htmlspecialchars($_SESSION['username']); ?>,</span></h1> 
        <h2>Select Your Candidates</h2>
    </div>
    <div class="main-content">
        <section class="election-section">
            <h2>Election for President</h2>
            <img src="../images/1.webp" alt="">
            <p class="p1">PRESIDENT</p>
            <p class="pc">The Student Body President represents the interests of the student body, serves as a liaison between
                students and university administration, and leads student government initiatives. They play a vital role
                in advocating for student needs, organizing campus events, and fostering a sense of community among
                students</p>
            <a href="president.php" class="election-link">Vote</a>
        </section>
        <section class="election-section">

            <h2>Election for Vice President</h2>
            <img src="../images/1.jpeg" alt="picture">
            <p class="p1">VICE.PRESIDENT</p>
            <p class="pc">The Vice President of Academic Affairs oversees academic policies and initiatives, advocates for student
                interests in matters related to curriculum and instruction, and works to enhance the overall academic
                experience for students. They collaborate with faculty and administration to address academic concerns
                and promote student success.</p>
            <a href="vice.php" class="election-link">vote</a>

        </section>

        <section class="election-section">
            <h2>election for chairman</h2>
            <img src="../images/1.png" alt="">
            <p class="p1">CHAIRMAN</p>
            <p class="pc">The Chairman of Student Senate leads the student legislative body, oversees meetings, and facilitates
                discussions on campus policies and issues affecting the student community. They play a crucial role in
                representing student interests, advocating for change, and ensuring that student voices are heard in
                university decision-making processes.</p>
            <a href="chair.php" class="election-link">vote</a>
        </section>
    </div>
    </div>

</body>

</html>