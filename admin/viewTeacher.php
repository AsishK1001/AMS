<?php 

$server = "localhost";
$user = "root";
$passw = "";
$db = "ams";

$con = mysqli_connect($server,$user,$passw,$db);

if (!$con) {
    echo "Database Not Connected.";
}

$que = "SELECT * FROM `admin`";
$res = mysqli_query($con,$que);

$num = mysqli_num_rows($res);
if($num > 0) {
    echo "<table><th>Name</th><tr><th>Id</th><th>Password</th><th>Access</th></tr>";
    while($row = mysqli_fetch_array($res)) {
        echo "<tr><td>".$row['Name']."</td><td>".$row['userid']."</td><td>".$row['pass']."</td><td>".$row['level']."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No Record Found";
}

?>