<?php 

$server = "localhost";
$user = "root";
$passw = "";
$db = "ams";
echo '<link rel="stylesheet" href="./admin3.css">';
$con = mysqli_connect($server,$user,$passw,$db);

if (!$con) {
    echo "Database Not Connected.";
}

$que1 = "SELECT * FROM `feedback`";
$res1 = mysqli_query($con,$que1);

$num1 = mysqli_num_rows($res1);
if($num1 > 0) {
    echo "<table><tr><th>Name</th><th>Email</th><th>Feedback</th><th>Date & Time</th></tr>";
    while($row = mysqli_fetch_array($res1)) {
        echo "<tr><td>".$row['Name']."</td><td>".$row['Mail']."</td><td>".$row['Message']."</td><td>".$row['D&T']."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No Record Found";
}
