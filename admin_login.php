<?php
    include 'login_admin.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login-Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="admin.css">
    <link rel="shortcut icon" type="x-icon" href="../images/logo_ud.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

</head>
<body>
<nav>
        <img src="../images/logo_ud.png" class="logo">
        <ul>
            <li><a href="../index.php">HOME</a></li>
        </ul>
    </nav>
<div class="container">
        <div class="box form-box">
        
            <header>Login</header>
            <form  method="post">
            <div class="field input">
                    <label for="email">Email </label>
                    <input type="text" name="email" id="email" autocomplete="off">
                </div>
                <p class="error" style="color: red;" ><?php if(!empty($email_error)) { echo $email_error; }?></p>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="pwd" id="password" autocomplete="off" >
                    <i class="fas fa-eye toggle-password" data-target="confirm-password" style="position: absolute; right: 540px; top: 58%; color: #ccc; transform: translateY(-40%); cursor: pointer;"></i>
                </div>
                <p class="error" style="color: red;" ><?php if(!empty($pwd_error)) { echo $pwd_error; }?></p>
                <div class="error" style="color: red;"><?php if(!empty($msg)) { echo $msg; }?></div>
                <div class="field">
                    <input type="submit" class="btn"  name="login" value="Login">
                </div>
               <!-- <div class="links">
                    Don't have account?<a style="text-decoration: none; font-size: 25px; color: #007bff;" href="admin.php">Create Account</a>
                </div>
-->
            </form>
        </div>
    </div>

    <script src="../javascript/show-hide.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
