<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "ams";

$con = mysqli_connect($server,$user,$pass,$db);

if (!$con) {
    echo "Database Not Connected.";
}

$name = $_POST['name'];
$mail = $_POST['email'];
$msg = $_POST['message'];

$que = "INSERT INTO `feedback`(`Name`, `Mail`, `Message` ) VALUES ('$name','$mail','$msg')";
$exe = mysqli_query($con,$que);

if (!$exe) {
    echo "<script>
    alert('Not Submitted');
    window.location.href = './feedback.html';
</script>";
} else {
    echo "<script>
    alert('Submitted');
    window.location.href ='./home.php';
</script>";
}

?>