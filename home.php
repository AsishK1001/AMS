<?php 
include './database.php' 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<device-width>, initial-scale=1.0">
    <title>AMS</title>
    <link rel="stylesheet" href="./css/home.css">
    <link rel="icon" href="./img/logo.jpg">
</head>
<body>
    <div class="top">
        <div class="logo">
            <img src="./img/logo.jpg" height="90px" width="90px">
        </div>
        <div class="main">
            Attendance Management System
        </div>
        <div class="nav">
            <div style="border-bottom: 3px solid black;border-right: 3px solid black;"><a href="./home.php">Home</a></div>
            <div><a href="./feedback.html">Feedback</a></div>
            <div><a href="./student.php">Student</a></div>
            <div><a href="./login.html">Admin</a></div>
        </div>
    </div>
    <div class="obj">
        <div class="para">
            <p>This page is dedicated to managing student attendance. It is designed so that teachers have the authority to update student's attendance while students can only track their own attendance by selecting their year of study, entering their registered date of birth and roll number assigned by the college administration. Here admin has the authority to manage the functionality of this site. The main ambition of this site is to ensure a well organized, efficient attendance tracking process while minimizing manual errors and simplifying record-keeping for all users.
            </p><div class="image"><img src="./img/logo.jpg" alt="AMS.logo"></div>
        </div>
        
    </div>
    <footer>
        <div class="visit">
            <div><a href="https://github.com/" target="_new"><img src="./img/github.png"></a></div>
            <div><a href="https://www.instagram.com/accounts/login/?hl=en" target="_new"><img src="./img/instagram.jpg"></a></div>
            <div><a href="https://www.google.co.in/" target="_new"><img src="./img/google.png"></a></div>
            <div><a href="https://in.linkedin.com/" target="_new"><img src="./img/linkedin.png"></a></div>
            <div><a href="https://www.youtube.com/" target="_new"><img src="./img/youtube.png"></a></div>
        </div>
    </footer>
</body>
</html>