<?php

    include '../handler/handle_register.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Register</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet'  href='registration.css'>
    <link rel="shortcut icon" type="x-icon" href="../images/logo_ud.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head>
<body>
<nav>
        <img src="../images/logo_ud.png" class="logo">
        <ul>
            <li><a href="../home.php">HOME</a></li>
            <li><a href="">ABOUT</a></li>
        </ul>
    </nav>
    <div class="container">
        <header>Registration Form</header>

        <form  method="POST" autocomplete="off">
            <div class="form first">
                <div class="details personal">
                    <span class="title" style="color: green; text-decoration:underline;">Personal Details</span>

                    <div class="fields">
                        <div class="input-fields">
                            <label>Full Name <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Enter Your Name" name="username" id="username" oninput="convertToUppercase()" >
                            <p class="error" style="color: red;" ><?php if(!empty($username_error)) { echo $username_error; }?></p>
                        </div>
                        <div class="input-fields">
                            <label>Email <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Enter Your Email" name="email">
                            <p class="error" style="color: red;" ><?php if(!empty($email_error)) { echo $email_error; }?></p>
                        </div>
                        <div class="input-fields">
                            <label>Mobile Number <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Enter Mobile No." name="mobileNo"  id="phone_number">
                            <p class="error" style="color: red;" ><?php if(!empty($mobile_error)) { echo $mobile_error; }?></p>
                        </div>
                        <div class="input-fields">
                            <label>Gender<span style="color:red;">*</span></label>
                            <select name="gender"  class="gender" >
                            <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <p class="error" style="color: red;"><?php if (!empty($gender_error)) { echo $gender_error; }?></p>
                        </div>
                        <!--<div class="input-fields">
                            <label>National Identification No. <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Enter NIN No." name="nationalId" >
                            <p class="error" style="color: red;" ></p>
                        </div>-->
                    </div>
                </div>

                <div class="details ID">
                    <span class="title" style="color: green; text-decoration:underline;">Identity Details</span>

                    <div class="fields">
                        <div class="input-fields">
                            <label>Registration NO <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Enter Registration No." maxlength="14" name="registerNo">
                            <p class="error" style="color: red;" ><?php if(!empty($registerNo_error)) { echo $registerNo_error; }?></p>
                        </div>
                        <div class="input-fields">
                            <label for="college">Choose College:</label>
                            <div class="select-wrapper">
                                <select name="college" class="styled-select">
                                    <option value="">Select College</option>
                                    <option value="coict">College of Information and Communication Technologies (CoICT)</option>
                                    <option value="coet">College of Engineering and Technology (CoET)</option>
                                    <option value="coss">College of Social Science (CoSS)</option>
                                    <option value="cohu">College of Humanities (CoHU)</option>
                                    <option value="conas">College of Natural and Applied Science (CoNAS)</option>
                                    <option value="duce">Dar es Salaam University College of Education (DUCE)</option>
                                </select>
                                <p class="error" style="color: red;" ><?php if(!empty($college_error)) { echo $college_error; }?></p>
                        </div>
                        </div>
                        <div class="input-fields">
                            <label for="program">Choose Program:</label>
                            <div class="select-wrapper">
                                <select name="program" class="styled-select">
                                    <option value="">Select Program</option>
                                    <option value="Computer Science.">BSc in Computer Science.</option>
                                    <option value="Archeology">BA in Archeology</option>
                                    <option value="Electrical Engineering">BSc in Electrical Engineering.</option>
                                    <option value="Education in Science">Bachelor of Education in Science.</option>
                                    <option value="Psychology">	BA in Psychology</option>
                                    <option value="Petroleum Geology">Bachelor of Science in Petroleum Geology </option>
                                </select>
                                <p class="error" style="color: red;" ><?php if(!empty($program_error)) { echo $program_error; }?></p>
                        </div>
                        </div>
                        <div class="input-fields">
                            <label for="studyYear">Study Year:</label>
                            <div class="select-wrapper">
                                <select name="year" class="styled-select">
                                    <option value="">Select Year of Study</option>
                                    <option value="1 year">1 Year</option>
                                    <option value="2 year">2 Year</option>
                                    <option value="3 year">3 Year</option>
                                    <option value="4 year">4 Year</option>
                                </select>
                                <p class="error" style="color: red;" ><?php if(!empty($study_error)) { echo $study_error; }?></p>
                        </div>
                        </div>
                        <div class="input-fields">
                            <label>Create Password <span style="color: red;">*</span></label>
                            <input type="password" placeholder="Create Password" name="pwd" id="create-password" >
                            <p class="error" style="color: red;" ><?php if(!empty($pwd_error)) { echo $pwd_error; }?></p>
                            <i class="fas fa-eye toggle-password" data-target="create-password" style="position: absolute; right: 630px; top: 75%; color: #ccc; transform: translateY(-40%); cursor: pointer;" ></i>
                        </div>
                        <div class="input-fields">
                            <label>Confirm Password <span style="color: red;">*</span></label>
                            <input type="password" placeholder="Confirm Password"  id="confirm-password" name="cpwd">
                            <p class="error" style="color: red;" ><?php if(!empty($cpwd_error)) { echo $cpwd_error; }?></p>
                            <i class="fas fa-eye toggle-password" data-target="confirm-password" style="position: absolute; right: 260px; top: 75%; color: #ccc; transform: translateY(-40%); cursor: pointer;"></i>
                        </div>
                    </div>
                    <button type="submit" class="submit" name="submit">Submit</button>
                    <div class="load" style="font-size: 16px; margin: 10px; ">
                    Already have account?<a  style="color: #007FFF; font-size: 20px; font-weight: bold; " href="login.php">Login</a>
                    </div>
                    <div class="error" style="color: red;"><?php if(!empty($msg)) { echo $msg; }?></div>
                </div>

            </div>
        </form>
    </div>
    
    <script src="../javascript/register.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
