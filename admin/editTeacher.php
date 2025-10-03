<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addTeacher</title>
</head>
<body>
   <form action="./editTeacher.php" method="post">
    User id : <input type="text" name="id" required> <br>
    Name : <input type="text" name="name"> <br>
    Password : <input type="text" name="pass"> <br>
    Grant Access : <select name="lev">
        <option value="null"></option>
        <option value="A">YES</option>
        <option value="D">NO</option></select> <br>
        <button type="submit" name="submit">Submit</button>
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
if(mysqli_num_rows($exe)>0) {
    $row=mysqli_fetch_array($exe);
}
else {
    echo "<script>alert('Id not found');window.location.href='./admin.php';</script>";
}
$name=($_POST['name']) != ''?$_POST['name']:$row['Name'];
$pass=($_POST['pass']) != ''?$_POST['pass']:$row['pass'];
$lev=($_POST['lev']) != ''?$_POST['lev']:$row['level'];

$que = "UPDATE `admin` SET `Name`='$name',`pass`='$pass',`level`='$lev' WHERE `userid` = '$id'";
$exe = mysqli_query($con,$que);

if($exe) {
    echo "<script>alert('Teacher Id Updated Succesfully');window.location.href='./admin.php';</script>";
} else {
    echo "<script>alert('Process Incompleted...');</script>";
}

?>