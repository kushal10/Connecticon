<!DOCTYPE html>
<html>

  <body background="1.jpg">
  <head>
    <meta charset="UTF-8">
    <title>Login & Sign Up Form Concept</title>
    
    
    
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:400,300'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

        <link rel="stylesheet" href="style.css">

    
    
    
  </head>


    <div class="cotn_principal">
<div class="cont_centrar">

  <div class="cont_login">
<div class="cont_info_log_sign_up">
      <div class="col_md_login">
      <h2>LOGIN</h2>  
  <p>Welcome to Connecticon!! If u have Signed up, Login here.</p> 
  <button class="btn_login" onclick="cambiar_login()">LOGIN</button>
  </div>
<div class="col_md_sign_up">
  <h2>SIGN UP</h2>
<p>Click Signup and Register here for Connecticon!!</p>
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
<form action="" method="POST">
 <input type="text" name = "user" placeholder="Username" />
<input type="password" name = "pass" placeholder="Password" />
<input class="btn_login" type="submit" value="Login" name="login">
</form>
  </div>
  
   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
     <h2>SIGN UP</h2>
<form action=""  method="POST">
<input type="text" name="username" placeholder="Username" />
<input type="text" name="email" placeholder="Email" />
<input type="password" name = "password" placeholder="Password" />
<input type="password" placeholder="Confirm Password" />
<input class="btn_login" type="submit" name="signup" value="SIGNUP">
</form>
  </div>

    </div>
    
  </div>
 </div>
</div>
    
        <script> 
                /* ------------------------------------ Click on login and Sign Up to  changue and view the effect
---------------------------------------
*/

function cambiar_login() {
  document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";  
document.querySelector('.cont_form_login').style.display = "block";
document.querySelector('.cont_form_sign_up').style.opacity = "0";               

setTimeout(function(){  document.querySelector('.cont_form_login').style.opacity = "1"; },400);  
  
setTimeout(function(){    
document.querySelector('.cont_form_sign_up').style.display = "none";
},200);  
  }

function cambiar_sign_up(at) {
  document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_sign_up";
  document.querySelector('.cont_form_sign_up').style.display = "block";
document.querySelector('.cont_form_login').style.opacity = "0";
  
setTimeout(function(){  document.querySelector('.cont_form_sign_up').style.opacity = "1";
},100);  

setTimeout(function(){   document.querySelector('.cont_form_login').style.display = "none";
},400);  


}    



function ocultar_login_sign_up() {

document.querySelector('.cont_forms').className = "cont_forms";  
document.querySelector('.cont_form_sign_up').style.opacity = "0";               
document.querySelector('.cont_form_login').style.opacity = "0"; 

setTimeout(function(){
document.querySelector('.cont_form_sign_up').style.display = "none";
document.querySelector('.cont_form_login').style.display = "none";
},500);  
  
  }          
        </script>

    
    
    
  </body>
</html>


<?php

$connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('project');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}?>

<?php
$flag = 1;
$message = "";
if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['signup'])){
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


<?php
//session_start();
// require('connect.php');
if (isset($_POST["user"]) and isset($_POST["pass"]) and isset($_POST["login"])){
$username = $_POST["user"];
$password = md5($_POST["pass"]);
$query = "SELECT * FROM users WHERE username='$username' and password='$password'";

$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
if ($count == 1){
setcookie("user",$username,time()+86400);
header("Location: chat.php");
exit();

}else{
echo "<script type = 'text/javascript'>alert('Wrong Credentials');</script>";
}
}

?>


