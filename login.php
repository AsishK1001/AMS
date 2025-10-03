<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "ams";

$con = mysqli_connect($server,$user,$pass,$db);

if (!$con) {
    echo "Database Not Connected.";
}

session_start();

$id = $_POST['userid'];
$passw = $_POST['pass'];

$que = "SELECT * FROM `admin` WHERE ( `userid` = '$id' AND `pass` = '$passw' )";
$ans = mysqli_query($con,$que);

if (mysqli_num_rows($ans) > 0) {
    $row = mysqli_fetch_array($ans);
    $lev = $row['level'];
    $_SESSION['id']=$row['userid'];
    $_SESSION['name']=$row['Name'];
    if ($lev == 'X') {
        echo "<script>window.location.href = './admin/admin.php'</script>";
    } elseif ($lev == 'A') {
        echo "<script>window.location.href = './teacher/teacher.php';</script>";
    } else {
        echo "<script>alert('Permission Denied..');window.location.href = './login.html';</script>";
    }
} else {
    echo "<script>alert('Invalid UserId or Password');window.location.href = './login.html';</script>";
}

?>