<?php

include 'handle_president.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Candidate for President</title>
    <link rel="stylesheet" href="president.css">
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
        justify-content: center; /* Center horizontally */
        align-items: center; /* Center vertically */
    }

    .popup-content {
        background-color: #fefefe;
        border: 1px solid #888;
        width: 350px; 
        padding: 40px;
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

</head>
<body>
    <nav>
        <img src="../images/logo.png" class="logo" width="75" >
        <ul>
            <li><a href="voting.php">Candidates</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Select Your Candidate for President</h1>
    </div>
    <form action="president_vote.php" method="post" class="candidate-form">
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

    <?php if (isset($_SESSION['vote_status'])): ?>
        <div id="popup" class="popup">
            <div class="popup-content">
                <?php if ($_SESSION['vote_status'] == 'success'): ?>
                    <p class="success">Vote submitted successfully!</p>
                <?php elseif ($_SESSION['vote_status'] == 'already_voted'): ?>
                    <p class="error">You have already voted for this position.</p>
                <?php else: ?>
                    <p class="error">An error occurred. Please try again later.</p>
                <?php endif; ?>
                <button class="done-button" onclick="closePopup()">Done</button>
            </div>
        </div>
        <?php unset($_SESSION['vote_status']); ?>
    <?php endif; ?>

    <script>
        window.onload = function() {
            var popup = document.getElementById("popup");
            if (popup) {
                popup.style.display = "block";
            }
        }

        function closePopup() {
            var popup = document.getElementById("popup");
            if (popup) {
                popup.style.display = "none";
            }
        }
    </script>
</body>
</html>
