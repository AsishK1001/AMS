<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addTeacher</title>
</head>
<body>
    <form action="" method="post">
        Name : <input type="text" name="name" required> <br>
        User id : <input type="text" name="id" required> <br>
        Password : <input type="text" name="pass" required> <br>
        <button type="submit" name="submit">Add</button>
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

$name=$_POST['name'];
$id=$_POST['id'];
$pass=$_POST['pass'];

$que = "SELECT * FROM `admin` WHERE `userid` = '$id'";
$exe = mysqli_query($con,$que);
if(mysqli_num_rows($exe)>0) {
    echo "<script>alert('User Id already Exists.');window.location.href='./admin.php';</script>";
}

$que = "INSERT INTO `admin`(`Name`, `userid`, `pass`, `level`) VALUES ('$name','$id','$pass','A')";
$exe = mysqli_query($con,$que);

if($exe) {
    echo "<script>alert('Teacher Added Succesfully');window.location.href='./admin.php';</script>";
} else {
    echo "<script>alert('Process Incompleted...');</script>";
}

?>