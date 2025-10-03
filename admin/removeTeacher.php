<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addTeacher</title>
</head>
<body>
    <form action="./removeTeacher.php" method="post">
        User id : <input type="text" name="id" required> <br>
        <button type="submit" name="submit">Remove</button>
    </form>
</body>
</html> -->

<?php 

$server = "localhost";
$user = "root";
$passw = "";
$db = "ams";

$con = mysqli_connect($server,$user,$passw,$db);

if (!$con) {
    echo "Database Not Connected.";
}

$id=$_POST['id'];

$que = "SELECT * FROM `admin` WHERE `userid` = '$id'";
$exe = mysqli_query($con,$que);
if(mysqli_fetch_array($exe) > 0) {
    $que = "DELETE FROM `admin` WHERE `userid` = '$id' ;";
    $exe = mysqli_query($con,$que);
    if($exe) {
        echo "<script>alert('Teacher removed Succesfully');window.location.href='./admin.php';</script>";
    } else {
        echo "<script>alert('Process Incompleted...');window.location.href='./admin.php';</script>";
    }
}
else {
    echo "<script>alert('Id not found');window.location.href='./admin.php';</script>";
}

?>