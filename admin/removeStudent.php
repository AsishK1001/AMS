<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>removeStudent</title>
</head>
<body>
<form action="./removeStudent.php" method="post">
    Roll no : <input type="text" name="rolln" required> <br>
    <button type="submit" name="submit">Remove</button>
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

$que = "SELECT * FROM `students_list` WHERE `Roll_no` = '$rolln'";
$exe = mysqli_query($con,$que);
if(mysqli_fetch_array($exe) > 0) {
    $que = "DELETE FROM `students_list` WHERE `Roll_no` = '$rolln' ;";
    $exe = mysqli_query($con,$que);
    $que1 = "DELETE FROM `date` WHERE `Roll_no` = '$rolln' ;";
    $exe1 = mysqli_query($con,$que1);
    if($exe) {
        echo "<script>alert('Student removed Succesfully');window.location.href='./admin.php';</script>";
    } else {
        echo "<script>alert('Process Incompleted...');window.location.href='./admin.php';</script>";
    }
}
else {
    echo "<script>alert('Id not found');window.location.href='./admin.php';</script>";
}
?>