<?php
session_start();
include '../includes/dbh.inc.php';

// Fetch candidates and their votes for each position
$positions = ['president', 'vice-president', 'chairperson'];
$results = [];

foreach ($positions as $position) {
    $stmt = $conn->prepare("SELECT candidates.id, candidates.name, COUNT(votes.id) as total_votes
                            FROM candidates
                            LEFT JOIN votes ON candidates.id = votes.candidate_id AND votes.position = ?
                            WHERE candidates.position = ?
                            GROUP BY candidates.id, candidates.name");
    $stmt->execute([$position, $position]);
    $results[$position] = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Determine the winners
$winners = [];
foreach ($results as $position => $candidates) {
    $winner = null;
    foreach ($candidates as $candidate) {
        if (!$winner || $candidate['total_votes'] > $winner['total_votes']) {
            $winner = $candidate;
        }
    }
    $winners[$position] = $winner;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overview of Votes</title>
    <link rel="stylesheet" href="overview.css">
    <link rel="shortcut icon" type="x-icon" href="../images/logo_ud.png">
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
            text-align: center;
        }
        .position {
            margin-top: 20px;
        }
        .position h2 {
            color: #333;
        }
        .candidate {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f9f9f9;
            font-size: 20px;
        }
        .winner {
            color: green;
            font-weight: bold;
            font-size: 22px;
        }

        nav{
    width: 94%;
    margin: auto;
    padding: 10px 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

nav ul {
    text-align: right;
}

nav ul li {
    display: inline-block;
    list-style: none;
    margin: 10px 10px;
}

nav ul li a {
    text-decoration: none;
    color: black;
    background-color: black;
    padding: 10px 18px;
    font-size: 15px;
    color: white;
    margin: 10px 0;
    border-radius: 5px;
}



.logo {
    width: 70px;
    cursor: pointer;

}


    </style>
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
</div>
    <div class="container">
        <h1 style="text-decoration: underline;" >Overview of Votes</h1>
        <?php foreach ($positions as $position): ?>
            <div class="position">
                <h2><?= ucfirst($position) ?> Candidates</h2>
                <?php foreach ($results[$position] as $candidate): ?>
                    <div class="candidate">
                        <?= htmlspecialchars($candidate['name']) ?>: <?= $candidate['total_votes'] ?> votes
                    </div>
                <?php endforeach; ?>
                <div class="winner">
                    Winner: <?= htmlspecialchars($winners[$position]['name']) ?> with <?= $winners[$position]['total_votes'] ?> votes
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
