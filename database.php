<?php
$server="localhost";
$user="root";
$pass= "";
$db="ams";

$conn=mysqli_connect($server,$user,$pass);

if(!$conn){
    exit();
}

$result = mysqli_query($conn, "SHOW DATABASES LIKE '$db'");
if (mysqli_num_rows($result) == 0) {
  $sql= "CREATE DATABASE $db";
  if(!mysqli_query($conn,$sql)){
    echo "Error";
  }
  mysqli_close($conn);

  $conn=mysqli_connect($server,$user,$pass,$db);
  if(!$conn){
    echo "Database not connected";
    exit();
  }

  $tables =[
  "CREATE TABLE IF NOT EXISTS `admin` (
    `Name` varchar(30) NOT NULL,
    `userid` varchar(10) NOT NULL PRIMARY KEY,
    `pass` varchar(8) NOT NULL,
    `level` enum('X','A','D') NOT NULL
  )",

  "CREATE TABLE IF NOT EXISTS `students_list` (
    `Name` varchar(30) NOT NULL,
    `Roll_no` varchar(10) NOT NULL PRIMARY KEY,
    `Dob` date NOT NULL,
    `Year` enum('1','2','3') NOT NULL,
    `1` int(3) NOT NULL DEFAULT 0,
    `2` int(3) NOT NULL DEFAULT 0,
    `3` int(3) NOT NULL DEFAULT 0,
    `4` int(3) NOT NULL DEFAULT 0,
    `5` int(3) NOT NULL DEFAULT 0,
    `6` int(3) NOT NULL DEFAULT 0,
    `7` int(3) NOT NULL DEFAULT 0,
    `8` int(3) NOT NULL DEFAULT 0,
    `9` int(3) NOT NULL DEFAULT 0,
    `10` int(3) NOT NULL DEFAULT 0,
    `11` int(3) NOT NULL DEFAULT 0,
    `12` int(3) NOT NULL DEFAULT 0
  )",

  "CREATE TABLE IF NOT EXISTS `date` (
    `Roll_no` varchar(50) NOT NULL PRIMARY KEY,
    `1` int(1) NOT NULL DEFAULT 0,
    `2` int(1) NOT NULL DEFAULT 0,
    `3` int(1) NOT NULL DEFAULT 0,
    `4` int(1) NOT NULL DEFAULT 0,
    `5` int(1) NOT NULL DEFAULT 0,
    `6` int(1) NOT NULL DEFAULT 0,
    `7` int(1) NOT NULL DEFAULT 0,
    `8` int(1) NOT NULL DEFAULT 0,
    `9` int(1) NOT NULL DEFAULT 0,
    `10` int(1) NOT NULL DEFAULT 0,
    `11` int(1) NOT NULL DEFAULT 0,
    `12` int(1) NOT NULL DEFAULT 0,
    `13` int(1) NOT NULL DEFAULT 0,
    `14` int(1) NOT NULL DEFAULT 0,
    `15` int(1) NOT NULL DEFAULT 0,
    `16` int(1) NOT NULL DEFAULT 0,
    `17` int(1) NOT NULL DEFAULT 0,
    `18` int(1) NOT NULL DEFAULT 0,
    `19` int(1) NOT NULL DEFAULT 0,
    `20` int(1) NOT NULL DEFAULT 0,
    `21` int(1) NOT NULL DEFAULT 0,
    `22` int(1) NOT NULL DEFAULT 0,
    `23` int(1) NOT NULL DEFAULT 0,
    `24` int(1) NOT NULL DEFAULT 0,
    `25` int(1) NOT NULL DEFAULT 0,
    `26` int(1) NOT NULL DEFAULT 0,
    `27` int(1) NOT NULL DEFAULT 0,
    `28` int(1) NOT NULL DEFAULT 0,
    `29` int(1) NOT NULL DEFAULT 0,
    `30` int(1) NOT NULL DEFAULT 0,
    `31` int(1) NOT NULL DEFAULT 0,
    `t` int(2) NOT NULL DEFAULT 0,
    `remark` text NOT NULL
  )",

  "CREATE TABLE IF NOT EXISTS `feedback` (
    `Name` varchar(30) NOT NULL,
    `Mail` varchar(25) NOT NULL,
    `Message` text NOT NULL,
    `D&T` datetime NOT NULL DEFAULT current_timestamp()
  )",

  "ALTER TABLE `date`
    ADD CONSTRAINT `fk_roll_no` 
    FOREIGN KEY (`Roll_no`) 
    REFERENCES `students_list`(`Roll_no`) 
    ON DELETE CASCADE ON UPDATE CASCADE;"

  ];

  foreach($tables as $que){
    mysqli_query($conn, $que);
  }

  $insert=[
  "INSERT INTO `admin` (`Name`, `userid`, `pass`, `level`) VALUES
  ('Admin', 'admin', '123', 'X'),
  ('Chinmayee Kumari', 'cli', 'cc11', 'A'),
  ('Ajit Kumar Mahapatra', 'exm', 'cc04', 'A'),
  ('Himansu', 'h2004', 'aman', 'D'),
  ('Biren Debata', 'hod', 'cc01', 'A'),
  ('Asish', 'K1001', '1001', 'D'),
  ('Sabhaya', 'nicks99', 'N9297', 'D'),
  ('Sunil', 's123', '123', 'D'),
  ('temp', 'temp', 'temp', 'A'),
  ('Swetalina Panda', 'vpr', 'cc05', 'A');",


  "INSERT INTO `students_list` (`Name`, `Roll_no`, `Dob`, `Year`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`) VALUES
  ('Ashutosh Bisoyi', 'RMIB144123', '2004-11-06', '2', 21, 23, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Asish Kumar Sahu', 'RMIB144223', '2004-10-26', '3', 22, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Asutosh Majhee', 'RMIB144323', '2005-07-07', '2', 11, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Bibek Dash', 'RMIB145123', '2004-08-23', '3', 11, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Bikram Nayak', 'RMIB145323', '2005-12-04', '1', 20, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Chintu Bishoyi', 'RMIB146223', '2005-06-01', '3', 29, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('D Madhusudan Pradhan', 'RMIB146423', '2004-07-07', '2', 15, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Deepak Swain ', 'RMIB147323', '2004-11-16', '2', 21, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Himansu Shekhar Acharjya', 'RMIB148823', '2004-10-07', '1', 6, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Pintu Bishoyi', 'RMIB153223', '2003-06-05', '1', 9, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Sabhaya Bisoyi', 'RMIB155223', '2004-06-09', '3', 11, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Sameer Kumar Sahu', 'RMIB155623', '2004-07-25', '3', 10, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Saumya Ranjan Bhuyan', 'RMIB156123', '2004-07-31', '2', 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Sunil Sahu ', 'RMIB158023', '2004-06-29', '1', 21, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('Tapan Kumar Swain ', 'RMIB158823', '2004-09-20', '1', 23, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);",

  "INSERT INTO `date` (`Roll_no`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `t`) VALUES
  ('RMIB144123', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB144223', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB144323', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB145123', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB145323', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB146223', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB146423', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB147323', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB148823', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB153223', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB155223', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB155623', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB156123', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB158023', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
  ('RMIB158823', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);",

  "INSERT INTO `feedback` (`Name`, `Mail`, `Message`, `D&T`) VALUES
  ('Asish', 'meet2asishkumar@mail.com', 'Sample Feedback', '2025-03-01 00:02:39'),
  ('Kumar', 'meet2kumarasish@mail.com', 'Sample Feedback 2', '2025-03-01 00:02:59');"

  ];

  foreach($insert as $que){
    mysqli_query($conn, $que);
  }


  mysqli_close($conn);
}