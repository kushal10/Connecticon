<html>
<div class="register-form">
<h1>Login</h1>
<form action="" method="POST">
    <p><label>User Name : </label>
	<input id="username" type="text" name="username" placeholder="username" required=""/></p>
 
     <p><label>Password&nbsp;&nbsp; : </label>
	 <input id="password" type="password" name="password" placeholder="password" required=""/></p>
 
    <a class="btn" href="register.php">Signup</a>
    <input class="btn register" type="submit" name="submit" value="Login" />
    </form>
</div>

<?php
session_start();
if(isset($_COOKIE['user'])) {
	setcookie('user',$_COOKIE['user'],time()-1);
}
$connection = mysql_connect('localhost', 'root', 'itashisasuke');

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
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE username='$username' and password='$password'";
 
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
echo $count;
if ($count == 1){
setcookie("user",$username,time()+86400);
header("Location: welcome.php");
exit();
}else{
echo "Invalid Login Credentials.";
}
}
 
?>
</html>
