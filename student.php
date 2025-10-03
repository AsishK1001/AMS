<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "ams";

$con = mysqli_connect($server,$user,$pass,$db);

if (!$con) {
    echo "Not Connected";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Sheet</title>
    <link rel="stylesheet" href="./css/student3.css">
    <link rel="icon" href="./img/logo.jpg">
</head>
<body>
    <div class="top">
        <div class="logo">
            <img src="./img/logo.jpg" height="90px" width="90px">
        </div>
        <div class="main">
            Attendence Management System
        </div>
        <div class="nav">
            <div><a href="./home.php">Home</a></div>
            <div><a href="./feedback.html">Feedback</a></div>
            <div style="border-bottom: 3px solid black;border-right: 3px solid black;"><a href="./student.php" href="./student.php">Student</a></div>
            <div><a href="./login.html">Admin</a></div>
        </div>
    </div>
    <div class="body">
        <div class="card">
        <h2>Attendance Sheet</h2>
        <form method="post" action="#t">
            <select name="Year" title="Year" id="branch" required>
                <option value="">--Select--</option>
                <option value="1">BCA 1st Year</option>
                <option value="2">BCA 2nd Year</option>
                <option value="3">BCA 3rd Year</option>
            </select>
            <input type="date" title="Date of Birth" name="Dob" required>
            <input type="text" placeholder="Roll Number" title="Roll Number" name="Roll_no" required>
            <div class="but"><button type="submit" name="submit">Submit</button></div>
        </form>
    </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['submit'])) {
        $dob = $_POST['Dob'];
        $rolln = $_POST['Roll_no'];
        $year = $_POST['Year'];
        

        $que = "SELECT * FROM `students_list` WHERE `Dob`='$dob' AND `Roll_no`='$rolln' AND `Year`='$year'";
        $ans = mysqli_query($con,$que);
        $que1 = "SELECT * FROM `date` WHERE `Roll_no`='$rolln'";
        $ans1 = mysqli_query($con,$que1);
        
        if (mysqli_num_rows($ans) >0){
            $t=0;
            $row = mysqli_fetch_array($ans);
            $row1 = mysqli_fetch_array($ans1);
            $date = (int)date('d');
            $a=($date<=7)?1:$date-7;
            for($i=$a;$i<=$date;$i+=1) {
                $att[$i]=$row1[$i];
            }
            echo "<br><table id='t'>
                <tr><th>Name</th><th>Roll No</th><th>Present : Last Month</th><th>Present : Current Month</th>";
            for($i=$a;$i<=$date;$i+=1) {
                echo "<th>".$i."</th>";
            }
            echo "</tr><tr><td>".$row['Name']."</td><td>".$row['Roll_no']."</td><td>".$row[(int)date('m')-1]."</td><td>".$row[(int)date('m')]."</td>";
            for($i=$a;$i<=$date;$i+=1) {
                echo "<td>".$row1[$i]."</td>";
            }
            echo "</tr><tr><th>Remark : </th><td colspan=".$date+4-$a.">".$row1['remark']."</td></tr></table>";
        }
        else {
            echo "<script>alert('No Record Found')</script>";
        }
    }
?>