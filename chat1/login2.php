<html>
<style type="text/css">
h1.serif{
font-family:"Courier New",Georgia,serif;
font-color: white;
font-variant: small-caps;
font-weight: bold;
text-align: center;
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
	height: 350px;
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
	width: 150px;
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

.invalid{
	padding 8px 20px;
	background-color:red;
}
</style>

<div class="register-form">
<h1>Login</h1>
<div class="rcorners">
<form action="" method="POST">
    <p><label>User Name : </label>
	<input id="username" type="text" name="username" placeholder="username" required=""/></p>
 
     <p><label>Password&nbsp;&nbsp; : </label>
	 <input id="password" type="password" name="password" placeholder="password" required=""/></p>
 
    <a class="btn" href="register.php">Signup</a>
    <input class="btn register" type="submit" name="submit" value="Login" />
    </form>
</div>
</div>

<?php
session_start();
if(isset($_COOKIE['user'])) {
	header("Location: chat.php");
}
$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('project');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
//session_start();
// require('connect.php');
if (isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST['username'];
$password = md5($_POST['password']);
$query = "SELECT * FROM users WHERE username='$username' and password='$password'";
 
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
echo $count;
if ($count == 1){
setcookie("user",$username,time()+86400);
header("Location: chat.php");
exit();
}else{
echo "Invalid Login Credentials";
}
}
 
?>
</html>
