<!DOCTYPE html>
<?php
   header("cache-Control: no-store, no-cache, must-revalidate");
header("cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

   $connection = mysql_connect('localhost', 'root', 'spiderman');

if (!$connection){
    die("Database Connection Failed" . mysql_error());
}

$select_db = mysql_select_db('project');
if (!$select_db){
    die("Database Selection Failed" . mysql_error());
}
   if( isset($_COOKIE['user']))
          { 
              $abc = $_COOKIE['user'] ;
             $que = "SELECT * FROM users where username='$abc'";
             $res = mysql_query($que);
             $cnt = mysql_num_rows($res);
             if( $cnt == 1 ) {
             header("Location: check.php");
                              }
          }
?>
<html>

  <body background="1.jpg">
  <head>
    <meta charset="UTF-8">
  <link rel="shortcut icon" href="1.png" type="image/png"/> 
    <title>CONNECTICON | Login</title>
    
    
    
    <link rel="stylesheet" href="style1.css">

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
<form action="" method="POST">
 <div class="cont_form_login">
<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
   <h2>LOGIN</h2>
 <input type="text" name = "user" placeholder="Username" />
<input type="password" name = "pass" placeholder="Password" />
<input class="btn_login" type="submit" value="LOGIN" name="login">
</form>
</div>
  
<form action="" method="POST">
   <div class="cont_form_sign_up">
<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
     <h2>SIGN UP</h2>
<input type="text" name="username" placeholder="Username" />
<input type="text" name="email" placeholder="Email" />
<input type="password" name = "password" placeholder="Password" />
<input class="btn_sign_up" type="submit" name="signup" value="SIGN UP">
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
//require '/var/www/html/chat/PHPMailer/PHPMailerAutoload.php';
require_once 'class.user.php';
$reg_user = new USER() ;
?>

<?php
$flag = 1;
$message = "";
if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email']) and isset($_POST['signup'])){
$username = $_POST["username"];
$password = $_POST["password"];
$password = md5($password);
if(strlen($username) < 5){
	echo "username should be of minimum 5 characters<br>";
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
$email = $_POST['email'];
$query = "select * from users where email='$email'";
$result = mysql_query($query);
if(mysql_num_rows($result) >= 1){
	echo "Email Already Exists<br>";
	$message .= "The Email Adress Exists<br>";
	$flag = 0;
}
if(strlen($password) < 8){
        echo "Password should be of minimum 8 characters<br>";
	$message .= "check password Length\n";
        $flag = 0;
}

$activation = md5($email.time());

if($flag == 1){
	$query = "INSERT INTO users (username,email,password,activation,code) VALUES ('$username','$email','$password','$activation','N')";
//echo $query;

	$result = mysql_query($query);
	$message = "Registration successful";
        echo   "<script type = 'text/javascript'>alert($message);</script>";

        $msg2 = "Hello $username, Please click the below link to activate your account
                  http://172.16.149.240/chat/verify.php?id=$username&code=$activation
               ";
        $subject = "Connecticon verification";
        $reg_user->send_mail($email,$msg2,$subject);
}
else {
	echo "Registration Unsuccessful<br>";
	echo "<script type='text/javascript'>alert('Registration Unsuccessful.');</script>";
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
$res2 = mysql_fetch_assoc(mysql_query($query)) or die(mysql_error());
$count = mysql_num_rows($result);
$req = "Y";
if ($count == 1 ){
$query = "SELECT * FROM loggedin where username='$username'";
$res = mysql_query($query);
if(mysql_num_rows($res) < 1){
	$query = "INSERT INTO loggedin (username,logtime) VALUES ('$username',NOW())";
	mysql_query($query);
}
if($res2['code'] == $req ) {
setcookie("user",$username,time()+3600);
header("Location: check.php");
exit();
}
else { echo "<script type='text/javascript'>alert('Your account is not still activated');</script>"; }
}
else{
echo "<script type='text/javascript'>alert('Wrong Credentials');</script>";
}
}
?>

