<?php

include 'handle_admin.php';

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
            <li><a href="home.php">HOME</a></li>
            <li><a href="">ABOUT</a></li>
        </ul>
    </nav>
<div class="container">
        <div class="box form-box">
        
            <header>Login</header>
            <form  method="post">
            <div class="field input">
                    <label for="name">Full Name</label>
                    <input type="text" name="username" id="name" autocomplete="off">
                </div>
                    <p class="error" style="color: red;" ><?php if(!empty($username_error)) { echo $username_error; }?></p>
                <div class="field input">
                    <label for="registerNo">Register No.</label>
                    <input type="text" name="registerNo" id="registerNo" autocomplete="off">
                </div>
                    <p class="error" style="color: red;" ><?php if(!empty($registerNo_error)) { echo $registerNo_error; }?></p>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" >
                </div>
                    <p class="error" style="color: red;" ><?php if(!empty($email_error)) { echo $email_error; }?></p>
                <div class="field input">
                    <label for="phoneNo">Phone No.</label>
                    <input type="text" name="mobileNo" id="mobileNo" autocomplete="off" >
                </div>
                <p class="error" style="color: red;" ><?php if(!empty($mobile_error)) { echo $mobile_error; }?></p>
                <div class="field input">
                    <label for="password">Create Password</label>
                    <input type="password" name="pwd" id="create-password" autocomplete="off" >
                </div>
                    <p class="error" style="color: red;" ><?php if(!empty($pwd_error)) { echo $pwd_error; }?></p>
                    <i class="fas fa-eye toggle-password" data-target="create-password" style="position: absolute; right: 35%; top: 70.5%; color: #ccc; transform: translateY(-40%); cursor: pointer;" ></i>
                <div class="field input">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" name="cpwd" id="confirm-password"  autocomplete="off" >
                </div>
                    <p class="error" style="color: red;" ><?php if(!empty($cpwd_error)) { echo $cpwd_error; }?></p>
                    <i class="fas fa-eye toggle-password" data-target="confirm-password" style="position: absolute; right: 35%; top: 81%; color: #ccc;  transform: translateY(-40%); cursor: pointer;"></i>
                <div class="field">
                    <input type="submit" class="btn"  name="submit" value="Submit">
                </div>
                <div class="links">
                    Arleady have account?<a style="text-decoration: none; font-size: 25px; color: #007bff;" href="admin_login.php">Login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="../javascript/register.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
