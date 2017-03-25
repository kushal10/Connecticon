<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login & Sign Up Form Concept</title>
    
    
    
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

        <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

    <div class="cotn_principal">
<div class="cont_centrar">

  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
      <h2>LOGIN</h2>  
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> 
  <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>
<div class="col_md_sign_up">
  <h2>SIGN UP</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
<button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>
  </div>
       </div>

    
    <div class="cont_back_info">
       <div class="cont_img_back_grey">
       <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
       </div>
       
    </div>
<div class="cont_forms" >
    <div class="cont_img_back_">
       <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
       </div>
 <div class="cont_form_login">
<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
   <h2>LOGIN</h2>
 <input type="text" placeholder="Email" />
<input type="password" placeholder="Password" />
<button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>
  
   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
     <h2>SIGN UP</h2>
<input type="text" placeholder="Username" />
<input type="text" placeholder="Email" />
<input type="password" placeholder="Password" />
<button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP</button>

  </div>

    </div>
    
  </div>
 </div>
</div>
    
        <script src="js/index.js"></script>

    
    
    
  </body>
</html>

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



<?php

$flag = 1;
$message = "";
if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['roll']) and isset($_POST['department']) and isset($_POST['semester'])){
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
$roll = $_POST["roll"];
$department = $_POST["department"];
$semester = $_POST["semester"];

if($flag == 1){
	$query = "INSERT INTO users (username,email,password,roll,department,semester) VALUES ('$username','$email','$password','$roll','$department','$semester')";
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
