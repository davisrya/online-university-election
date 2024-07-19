<?php
    include 'view_result.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin - Vote Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view_votes.css">
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
    <div class="container">
        <div class="header">
            <h1>Admin - View Votes</h1>
        </div>
    <div class="table-container">
        <h2>Vote Results for President</h2>
    <table>
        <thead>
            <tr>
                <th>Candidate</th>
                <th>Votes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidates as $candidate): ?>
                <tr>
                    <td><?= htmlspecialchars($candidate['name']) ?></td>
                    <td><?= $candidate['vote_count'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>

    <div class="table-container">
        <h2>Vote Results for Vice-President</h2>
        <table>
            <thead>
                <tr>
                    <th>Candidate</th>
                    <th>Votes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vpCandidates as $candidate): ?>
                    <tr>
                        <td><?= htmlspecialchars($candidate['name']) ?></td>
                        <td><?= $candidate['vote_count'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="table-container">
        <h2>Vote Results for Chairperson</h2>
        <table>
            <thead>
                <tr>
                    <th>Candidate</th>
                    <th>Votes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($chairCandidates as $candidate): ?>
                    <tr>
                        <td><?= htmlspecialchars($candidate['name']) ?></td>
                        <td><?= $candidate['vote_count'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
</body>
</html>
