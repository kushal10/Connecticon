<html>

<style type="text/css">
h1.serif{
font-family:"Courier New",Georgia,serif;
font-color: white;
font-variant: small-caps;
font-weight: bold;
text-align: center;
}
a:link, a:visited {
    border-radius: 25px;
    opacity:0.5;
    display: inline-block;
    background-color: #524949;
    color: white;
    padding: 30px 80px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    vertical-align:middle;
}

body{
background-image: url("123.jpg");
background-size:100%;
background-repeat:no-repeat;
opacity:0.7;
}
.rcorners{
	border-radius: 5px 50px;
	background: lightgrey;
	border:2px solid black;
	opacity:1;
	padding: 15px;
	width: 320px;
	height: 500px;
	margin: auto;
	animation: mymove 10s infinite;
}
@keyframes mymove {
	50%{border-bottom-left-radius: 5px;}
	50%{border-top-right-radius: 5px;}
	50%{border-top-left-radius: 50px;}
	50%{border-bottom-right-radius: 50px;}
}
input[type=text],input[type=password],input[type=email]{
	width: 200px;
	padding: 15px 12px;
	margin: 10px 0;
	box-sizing: border-box;
	font-size:20px;
	
	-webkit-transition:0.5s;
	transition: 0.5s;
	border-radius: 8px;
	background-color: black;
	
	color: white;
	transition:width 0.5s ease-in-out;
}
input[type=text]:focus,input[type=password]:focus,input[type=email]:focus{
	border: 3px solid white;
	width:100%;
}
input[type=button], input[type=reset]{
	background-color: purple;
	border: none;
	color: white;
	padding: 8px 20px;
	text-decoration: none;
	margin: 4px 2px;
	cursor: pointer;
	border-radius: 7px;
}

</style>

<a href="home.html">Return to Home</a>
<div class = "rcorners">

<form action = "" method = "POST">
<input type = "text" name = "username" placeholder = "username"required=""><br>
<input type = "password" name = "password" placeholder="password"required=""><br>
<input type = "email" name = "email" placeholder="email"required=""><br>
<input type = "submit" value="Sign Up.">
</form>
</div>

<?php

$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('project');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
$flag = 1;
$message = "";
if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email'])){
$username = $_POST["username"];
if(strlen($username) < 8){
	echo "username should be of minimum 8 characters<br>";
	$message .= "check username length\n";
	$flag = 0;
}
$query = "select * from users where username='$username'";
$result = mysql_query($query);
if(mysql_num_rows($result) >= 1) {
	echo "User Already Exists<br>";
	$message .= "User Exists\n";
	$flag = 0;
}
$password = md5($_POST["password"]);
if(strlen($password) < 8){
        echo "Password should be of minimum 8 characters<br>";
	$message .= "check password Length\n";
        $flag = 0;
}

$email = $_POST["email"];

if($flag == 1){
	$query = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
//echo $query;
	$result = mysql_query($query);
	$message = "Registration successful";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
else {
	echo "Registration Unsuccessful<br>";
	echo "<script type='text/javascript'>alert('Registration Unsuccessful');</script>";
}

}

?>
</html>
