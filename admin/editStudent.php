<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editStudent</title>
</head>
<body>
<form action="./editStudent.php" method="post">
    Roll no : <input type="text" name="rolln" required> <br>
    Name : <input type="text" name="name"> <br>
    Date of Birth : <input type="date" name="dob"> <br>
    Year : <select name="year">
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

$rolln=$_POST['rolln'];

$que ="SELECT * FROM `students_list` WHERE `Roll_no` = '$rolln'";
$exe = mysqli_query($con,$que);
if ( mysqli_num_rows($exe)>0) {
    $row = mysqli_fetch_array($exe);
}
else {
    echo "<script>alert('Id not found');window.location.href='./admin.php';</script>";
}
$name=($_POST['name'])!=''?$_POST['name']:$row['Name'];
$dob=($_POST['dob'])!=''?$_POST['dob']:$row['Dob'];
$year=($_POST['year'])!=''?$_POST['year']:$row['Year'];

$que = "UPDATE `students_list` SET `Name`='$name',`Dob`='$dob',`Year`='$year' WHERE `Roll_no` = '$rolln';";
$exe = mysqli_query($con,$que);

if($exe) {
    echo "<script>alert('Student Profile Updated Succesfully');window.location.href='./admin.php';</script>";
} else {
    echo "<script>alert('Process Incompleted...');</script>";
}

?>