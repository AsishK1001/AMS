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
if(!isset($_SESSION['id'])) {
    echo "<script>alert('You are not logged-in');window.location.href = '../login.html';</script>";
} else {
    $name = $_SESSION['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./admin2.css">
    <link rel="icon" href="../img/logo.jpg">
</head>
<body>
    <div class="top">
        Welcome <?php echo $name ?>
        <a href="../logout.php">Log-out</a>
    </div>
    <table class="dash">
        <tr>
            <td id="left">
                <ul>Dashboard
                    <li onclick="viewTeacher()">View Teacher</li>
                    <li onclick="viewStudent()">View Student</li>
                    <li onclick="viewFeedback()">View Feedback</li>
                </ul>
                <ul>Manage Teacher
                    <li onclick="addTeacher()">Add Teacher</li>
                    <li onclick="editTeacher()">Edit Teacher</li>
                    <li onclick="removeTeacher()">Remove Teacher</li>
                </ul>
                <ul>Manage Student
                    <li onclick="addStudent()">Add Student</li>
                    <li onclick="editStudent()">Edit Student</li>
                    <li onclick="removeStudent()">Remove Student</li>
                </ul>
            </td>
            <td id="right">
                <div class="view1">
                    <div onclick="viewTeacher()" class="view">View Teacher</div>
                    <div onclick="viewStudent()" class="view">View Student</div>
                    <div onclick="viewFeedback()" class="view">View Feedback</div>
                </div>
            </td>
        </tr>
    </table>
</body>
<script>
function viewStudent() {
    const res='<?php $que = "SELECT * FROM `students_list` ORDER BY `Year`";$res = mysqli_query($con,$que);$num = mysqli_num_rows($res);if($num > 0) {echo "<table><tr><th>Name</th><th>Roll No</th><th>DOB</th><th>Year</th></tr>";while($row = mysqli_fetch_array($res)) {echo "<tr><td>".$row['Name']."</td><td>".$row['Roll_no']."</td><td>".$row['Dob']."</td><td>".$row['Year']."</td></tr>";}echo "</table>";} else {echo "No Record Found";} ?>';
    document.getElementById('right').innerHTML = res;
}
function viewTeacher() {
    const res='<?php $que = "SELECT * FROM `admin` ORDER BY `level`";$res = mysqli_query($con,$que);$num = mysqli_num_rows($res);if($num > 0) {echo "<table><tr><th>Name</th><th>Id</th><th>Password</th><th>Access</th></tr>";while($row = mysqli_fetch_array($res)) {echo "<tr><td>".$row['Name']."</td><td>".$row['userid']."</td><td>".$row['pass']."</td><td>".$row['level']."</td></tr>";}echo "</table>";} else {echo "No Record Found";} ?>';
    document.getElementById('right').innerHTML = res;
}
function viewFeedback() {
    const res='<?php $que1 = "SELECT * FROM `feedback`";$res1 = mysqli_query($con,$que1);$num1 = mysqli_num_rows($res1);if($num1 > 0) {echo "<table><tr><th>Name</th><th>Email</th><th>Feedback</th><th>Date & Time</th></tr>";while($row = mysqli_fetch_array($res1)) {echo "<tr><td>".$row['Name']."</td><td>".$row['Mail']."</td><td>".$row['Message']."</td><td>".$row['D&T']."</td></tr>";}echo "</table>";} else {echo "No Record Found";} ?>';
    document.getElementById('right').innerHTML = res;
}
function addTeacher(){
    const res='<form action="./addTeacher.php" method="post">Name : <input type="text" name="name" required> <br>User id : <input type="text" name="id" required> <br>Password : <input type="text" name="pass" required> <br><button type="submit" name="submit">Add</button></form>';
    document.getElementById('right').innerHTML = res;
}
function editTeacher(){
    const res='<form action="./editTeacher.php" method="post">User id : <input type="text" name="id" required> <br>Name : <input type="text" name="name"> <br>Password : <input type="text" name="pass"> <br>Grant Access : <select name="lev"><option value=""></option><option value="A">YES</option><option value="D">NO</option></select> <br><button type="submit" name="submit">Submit</button></form>';
    document.getElementById('right').innerHTML = res;
}
function removeTeacher(){
    const res='<form action="./removeTeacher.php" method="post">User id : <input type="text" name="id" required> <br><button type="submit" name="submit">Remove</button></form>';
    document.getElementById('right').innerHTML = res;
}
function addStudent() {
    const res='<form action="./addStudent.php" method="post">Name : <input type="text" name="name" required> <br>Roll no : <input type="text" name="rolln" required> <br>Date of Birth : <input type="date" name="dob" required> <br>Year : <select name="year" required><option value="null">--Select--</option><option value="1">BCA 1st Year</option><option value="2">BCA 2nd Year</option><option value="3">BCA 3rd Year</option></select> <br><button type="submit" name="submit">Add</button></form>';
    document.getElementById('right').innerHTML = res;
}
function editStudent() {
    const res='<form action="./editStudent.php" method="post">Roll no : <input type="text" name="rolln" required> <br>Name : <input type="text" name="name" required> <br>Date of Birth : <input type="date" name="dob" required> <br>Year : <select name="year" required><option value="null">--Select--</option><option value="1">BCA 1st Year</option><option value="2">BCA 2nd Year</option><option value="3">BCA 3rd Year</option></select> <br><button type="submit" name="submit">Add</button></form>';
    document.getElementById('right').innerHTML = res;
}
function removeStudent() {
    const res='<form action="./removeStudent.php" method="post">Roll no : <input type="text" name="rolln" required> <br><button type="submit" name="submit">Remove</button></form>';
    document.getElementById('right').innerHTML = res;
}
</script>
</html>