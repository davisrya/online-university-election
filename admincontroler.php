<?php
    include 'admin_controler.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Candidate Information</title>
    <link rel="stylesheet" href="controler.css">
    <link rel="shortcut icon" type="x-icon" href="../images/logo_ud.png">
</head>
<body>
<header>
<nav>
        <img src="../images/logo_ud.png" class="logo">
        <ul>
            <li><a href="adminHome.php">HOME</a></li>
            <li><a href="admincontroler.php">Add Candidates</a></li>
            <li><a href="view_votes.php">View-Result</a></li>
            <li><a href="adminHome.php">View-Voters</a></li>
            <li><a href="overview.php">Overview</a></li>
            <li><a href="logout_admin.php">Logout</a></li>
        </ul>
    </nav>
    </header>

    <div class="load">
    <div class="container">
        <h1>Insert Candidate</h1>
        <form method="post" enctype="multipart/form-data">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            
            <label for="age">Age</label>
            <input type="number" id="age" name="age" required>
            
            <label for="course">Course</label>
            <input type="text" id="course" name="course" required>
            
            <label for="year">Year</label>
            <input type="number" id="year" name="year" required>
            
            <label for="position">Position</label>
            <select id="position" name="position" required>
                <option value="president">President</option>
                <option value="vice-president">Vice-President</option>
                <option value="chairperson">Chairperson</option>
            </select>
            
            <label for="image">Image</label>
            <input type="file" id="image" name="image" accept="image/*" required>
            
            <button type="submit" name="submit" >Submit</button>
        </form>
        <a href="adminHome.php">Back to Dashboard</a>
    </div>
    </div>
</body>
</html>
