<?php
    include 'handle_chair.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Candidate for President</title>
    <link rel="stylesheet" href="president.css">
</head>
<style>
    .popup {
        display: flex;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        justify-content: center; 
        align-items: center; 
    }

    .popup-content {
        background-color: #fefefe;
        border: 1px solid #888;
        width: 330px; 
        padding: 30px;
        text-align: center;
        border-radius: 10px; 
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        margin-left: 580px;
        margin-top: 250px;
    }

    .popup-content p.success {
        color: green;
        font-size: 18px; 
        margin: 100px 0;  
    }

    .popup-content p.error {
        color: red;
        font-size: 18px; 
        margin: 10px 0;  
    }

    .popup-content .done-button {
        margin-top: 20px;
        padding: 10px 20px; 
        background-color:  #4070f4;
        color: white;
        border: none;
        border-radius: 5px; 
        cursor: pointer;
        font-size: 16px; 
    }
</style>

<body>
    <nav>
        <img src="../images/logo.png" class="logo" width="75" >
        <ul>
            <li><a href="voting.php">Candidates</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Select Your Candidate for Chairperson</h1>
    </div>
    <form action="chair_vote.php" method="post" class="candidate-form">
        <?php foreach ($candidates as $candidate): ?>
            <div class="candidate">
                <label>
                    <h3><?= htmlspecialchars($candidate['name']) ?></h3>
                    <div class="slide-content">
                        <div class="card-wrapper">
                            <div class="card">
                                <div class="image-content">
                                    <div class="overlay">
                                        <div class="card-image">
                                            <img src="../uploads/<?= htmlspecialchars($candidate['image']) ?>" alt="" class="card-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p>
                                        Name: <?= htmlspecialchars($candidate['name']) ?><br>
                                        Age: <?= htmlspecialchars($candidate['age']) ?><br>
                                        Course: <?= htmlspecialchars($candidate['course']) ?><br>
                                        Year: <?= htmlspecialchars($candidate['year']) ?><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="radio" name="candidate" value="<?= $candidate['id'] ?>" required>
                    Vote
                </label>
            </div>
            <?php endforeach; ?>
            <button type="submit" name="submit" class="submit-button">Submit</button>
    </form>
</body>
</html>
