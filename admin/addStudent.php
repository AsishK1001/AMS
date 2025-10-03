<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addStudent</title>
</head>
<body>
<form action="./addStudent.php" method="post">
    Name : <input type="text" name="name" required> <br>
    Roll no : <input type="text" name="rolln" required> <br>
    Date of Birth : <input type="date" name="dob" required> <br>
    Year : <select name="year" required>
        <option value="null">--Select--</option>
        <option value="1">BCA 1st Year</option>
        <option value="2">BCA 2nd Year</option>
        <option value="3">BCA 3rd Year</option>
    </select> <br><button type="submit" name="submit">Add</button>
</form> 
</body>
</html>-->
<?php 

$server = "localhost";
$user = "root";
$passw = "";
$db = "ams";

$con = mysqli_connect($server,$user,$passw,$db);

if (!$con) {
    echo "Database Not Connected.";
}
$name = $_POST['name'];
$rolln = $_POST['rolln'];
$dob = $_POST['dob'];
$year = $_POST['year'];

$que = "SELECT * FROM `students_list` WHERE `Roll_no` = '$rolln'";
$exe = mysqli_query($con,$que);
if ( mysqli_num_rows($exe)>0) {
    echo "<script>alert('Student Rollno already Exists.');window.location.href='./admin.php';</script>";
}
$que= "INSERT INTO `students_list`(`Name`, `Roll_no`, `Dob`, `Year`) VALUES ('$name','$rolln','$dob','$year')";
$exe = mysqli_query($con,$que);

$que1= "INSERT INTO `date`(`Roll_no`) VALUES ('$rolln')";
$exe1 = mysqli_query($con,$que1);

if ($exe){
    echo "<script>alert('Student Added Succesfully');window.location.href='./admin.php';</script>";
} else {
    echo "<script>alert('Process Incomplete...');</script>";
}
?>