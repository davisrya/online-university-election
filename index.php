<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet'  href='home.css'>
    <link rel="shortcut icon" type="x-icon" href="images/logo_ud.png">                 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <nav>
        <img src="images/logo_ud.png" class="logo">
        <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="about.php">ABOUT</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="text-box">
            <i class="fa-solid fa-graduation-cap"></i>
            <h2>Student You can Register Yourself</h2>
            <p>You can Register here Yourself for Apply for University Education</p>
            <p>Make sure you submit correct information</p>
            <div class="login">
                <button class="login-btn">LOGIN</button>
                <div class="dropdown">
                    <button class="dropdown-btn" onclick="window.location.href='register/login.php'">Student</button>
                    <button class="dropdown-btn" onclick="window.location.href='admin/admin_login.php'">Admin</button>
                </div>
            </div>
            
        </div>
        <div class="image">
            <img src="images/nkrumah hall.jpg" alt="Image" class="hall">
        </div>
    </div>

   

    <script src="javascript/script.js"></script>
</body>
</html>