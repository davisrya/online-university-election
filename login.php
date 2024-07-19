<?php
    include '../handler/handle_login.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>LogIn</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css'  href='userlogin.css'>
    <link rel="shortcut icon" type="x-icon" href="../images/logo_ud.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

</head>
<div id="nav">
<nav>
        <img src="../images/logo_ud.png" class="logo">
        <ul>
            <li><a href="../index.php">HOME</a></li>
        </ul>
    </nav>
</div>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <form  method="post">
                <div class="field input">
                    <label for="registerNo">Registration No.</label>
                    <input type="text" name="registerNo" id="registerNo" autocomplete="off">
                    <p class="error" style="color: red;"><?php if(!empty($registerNo_error)) { echo $registerNo_error; }?></p>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="pwd" id="password" autocomplete="off" >
                    <i class="fas fa-eye toggle-password"></i>
                    <p class="error" style="color: red;"><?php if(!empty($pwd_error)) { echo $pwd_error; }?></p>
                </div>
                <div class="field">
                    <input type="submit" class="btn"  name="login" value="Login">
                    <div class="error" style="color: red;"><?php if(!empty($msg)) { echo $msg; }?></div>
                </div>
                <div class="links">
                    Don't have account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
    </div>

    <script src="../javascript/show-hide.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
