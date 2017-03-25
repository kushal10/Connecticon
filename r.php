<html>


<form action = "" method = "POST">
Enter Username <input type = "text" name = "username" required=""><br>
Enter Password <input type = "password" name = "password" required=""><br>
Enter EMail    <input type = "email" name = "email" required=""><br>
Enter Roll No  <input type = "text" name = "roll" required=""><br>
ENter Department <input type = "text" name = "department" required=""><br>
Enter Semester   <input type = "text" name = "semester" required = ""><br>
<input type = "submit" value="Sign Up.">
</form>
</html>

<?php

$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('issues');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
$flag = 1;
if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['roll']) and isset($_POST['department']) and isset($_POST['semester'])){
$username = $_POST["username"];
if(strlen($username) < 8){
	echo "username should be of minimum 8 characters<br>";
	$flag = 0;
}
$query = "select * from users where username='$username'";
$result = mysql_query($query);
if(mysql_num_rows($result) >= 1) {
	echo "User Already Exists<br>";
	$flag = 0;
}
$password = $_POST["password"];
if(strlen($password) < 8){
        echo "Password should be of minimum 8 characters<br>";
        $flag = 0;
}

$email = $_POST["email"];
$roll = $_POST["roll"];
$department = $_POST["department"];
$semester = $_POST["semester"];

if($flag == 1){
	$query = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
//echo $query;
	$result = mysql_query($query);
	echo 'alert("Hello From the Other Side")';
}
else {
	echo "Registration Unsuccessful<br>";
}

}

?>
<a href="home.html">Return to Home</a>
</html>
