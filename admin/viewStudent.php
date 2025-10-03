<?php 

$server = "localhost";
$user = "root";
$passw = "";
$db = "ams";

$con = mysqli_connect($server,$user,$passw,$db);

if (!$con) {
    echo "Database Not Connected.";
}

$que = "SELECT * FROM `students_list`";
$res = mysqli_query($con,$que);

$num = mysqli_num_rows($res);
if($num > 0) {
    echo "<table><tr><th>Name</th><th>Roll No</th><th>DOB</th><th>Year</th></tr>";
    while($row = mysqli_fetch_array($res)) {
        echo "<tr><td>".$row['Name']."</td><td>".$row['Roll_no']."</td><td>".$row['Dob']."</td><td>".$row['Year']."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No Record Found";
}

?>
