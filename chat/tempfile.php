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

 if(!isset($_COOKIE['user'])){
                header("Location: index.php");
        }



                        if(isset($_POST['logout'])){
					$u = $_COOKIE['user'];
					$query = "DELETE from loggedin where id=3";
					mysql_query($query);
                                        unset($_COOKIE['user']);
                                        setcookie("user","",1);
                                        echo $_COOKIE['user'];
                                        header("Location: index.php");
                        }
                ?>





<html>
	<head>
<link rel="stylesheet" href="chat_style.css">
<link rel="stylesheet" href="chatstyle.css">
<link rel="stylesheet" href="chatreset.css">
<body onload="javascript:startChat();">


<div id='cssmenu'>
<ul>
 <style type="text/css">
	@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600);
* {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.myButton {
	-moz-box-shadow: 0px 0px 0px 2px #2b6ac9;
	-webkit-box-shadow: 0px 0px 0px 2px #2b6ac9;
	box-shadow: 0px 0px 0px 2px #2b6ac9;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #7892c2), color-stop(1, #476e9e));
	background:-moz-linear-gradient(top, #7892c2 5%, #476e9e 100%);
	background:-webkit-linear-gradient(top, #7892c2 5%, #476e9e 100%);
	background:-o-linear-gradient(top, #7892c2 5%, #476e9e 100%);
	background:-ms-linear-gradient(top, #7892c2 5%, #476e9e 100%);
	background:linear-gradient(to bottom, #7892c2 5%, #476e9e 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#7892c2', endColorstr='#476e9e',GradientType=0);
	background-color:#7892c2;
	-moz-border-radius:35px;
	-webkit-border-radius:35px;
	border-radius:35px;
	border:2px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:19px;
	padding:7px 17px;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #476e9e), color-stop(1, #7892c2));
	background:-moz-linear-gradient(top, #476e9e 5%, #7892c2 100%);
	background:-webkit-linear-gradient(top, #476e9e 5%, #7892c2 100%);
	background:-o-linear-gradient(top, #476e9e 5%, #7892c2 100%);
	background:-ms-linear-gradient(top, #476e9e 5%, #7892c2 100%);
	background:linear-gradient(to bottom, #476e9e 5%, #7892c2 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#476e9e', endColorstr='#7892c2',GradientType=0);
	background-color:#476e9e;
}
.myButton:active {
	position:relative;
	top:1px;
}

.usernameclass{
     color:red;
     text-color:red;
     text-decoration:underline;    
}
.textox {
   width: 296px;
   height: 28px;
   border: solid 2px #00E3E3;
   padding: 3px;
   border-radius: 5px;
   font-size: 16px;
   box-shadow: 7px 6px 4px 2px #9C9C9C;
   background-color: #FFFFFF;
   outline: none;
   color: #474747;
  }
.textox:focus  {
   border: solid 2px #00D43C;
   box-shadow: inset 0px 1px 2px 0px #9C9C9C;
  }
.textox:active  {
   border: solid 2px #0043EB;
  }


body {
  background-color: #f8f8f8;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-rendering: optimizeLegibility;
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 400;
  background-image: url("http://s17.postimg.org/fr01hfe33/image.jpg");
  background-size: cover;
  background-repeat: none;
}

.wrapper {
  position: relative;
  left: 50%;
  width: 1000px;
  height: 800px;
  -moz-transform: translate(-50%, 0);
  -ms-transform: translate(-50%, 0);
  -webkit-transform: translate(-50%, 0);
  transform: translate(-50%, 0);
}

.container {
  position: relative;
  top: 50%;
  left: 50%;
  width: 80%;
  height: 75%;
  background-color: #fff;
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.container .left {
  float: left;
  width: 37.6%;
  height: 100%;
  border: 1px solid #e6e6e6;
  background-color: #fff;
}
.container .left .top {
  position: relative;
  width: 100%;
  height: 96px;
  padding: 29px;
}
.container .left .top:after {
  position: absolute;
  bottom: 0;
  left: 50%;
  display: block;
  width: 80%;
  height: 1px;
  content: '';
  background-color: #e6e6e6;
  -moz-transform: translate(-50%, 0);
  -ms-transform: translate(-50%, 0);
  -webkit-transform: translate(-50%, 0);
  transform: translate(-50%, 0);
}
.container .left input {
  float: left;
  width: 188px;
  height: 42px;
  padding: 0 15px;
  border: 1px solid #e6e6e6;
  background-color: #eceff1;
  -moz-border-radius: 21px;
  -webkit-border-radius: 21px;
  border-radius: 21px;
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 400;
}
.container .left input:focus {
  outline: none;
}
.container .left a.search {
  display: block;
  float: left;
  width: 42px;
  height: 42px;
  margin-left: 10px;
  border: 1px solid #e6e6e6;
  background-color: #00b0ff;
  background-image: url("http://s11.postimg.org/dpuahewmn/name_type.png");
  background-repeat: no-repeat;
  background-position: top 12px left 14px;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}
.container .left .people {
  margin-left: -1px;
  border-right: 1px solid #e6e6e6;
  border-left: 1px solid #e6e6e6;
  width: -moz-calc(100% + 2px);
  width: -webkit-calc(100% + 2px);
  width: -o-calc(100% + 2px);
  width: calc(100% + 2px);
}
.container .left .people .person {
  position: relative;
  width: 100%;
  padding: 12px 10% 16px;
  cursor: pointer;
  background-color: #fff;
}
.container .left .people .person:after {
  position: absolute;
  bottom: 0;
  left: 50%;
  display: block;
  width: 80%;
  height: 1px;
  content: '';
  background-color: #e6e6e6;
  -moz-transform: translate(-50%, 0);
  -ms-transform: translate(-50%, 0);
  -webkit-transform: translate(-50%, 0);
  transform: translate(-50%, 0);
}
.container .left .people .person img {
  float: left;
  width: 40px;
  height: 40px;
  margin-right: 12px;
  -moz-border-radius: 50%;
  -webkit-border-radius: 50%;
  border-radius: 50%;
}
.container .left .people .person .name {
  font-size: 14px;
  line-height: 22px;
  color: #1a1a1a;
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 600;
}
.container .left .people .person .time {
  font-size: 14px;
  position: absolute;
  top: 16px;
  right: 10%;
  padding: 0 0 5px 5px;
  color: #999;
  background-color: #fff;
}
.container .left .people .person .preview {
  font-size: 14px;
  display: inline-block;
  overflow: hidden !important;
  width: 70%;
  white-space: nowrap;
  text-overflow: ellipsis;
  color: #999;
}
.container .left .people .person.active, .container .left .people .person:hover {
  margin-top: -1px;
  margin-left: -1px;
  padding-top: 13px;
  border: 0;
  background-color: #00b0ff;
  width: -moz-calc(100% + 2px);
  width: -webkit-calc(100% + 2px);
  width: -o-calc(100% + 2px);
  width: calc(100% + 2px);
  padding-left: -moz-calc(10% + 1px);
  padding-left: -webkit-calc(10% + 1px);
  padding-left: -o-calc(10% + 1px);
  padding-left: calc(10% + 1px);
}
.container .left .people .person.active span, .container .left .people .person:hover span {
  color: #fff;
  background: transparent;
}
.container .left .people .person.active:after, .container .left .people .person:hover:after {
  display: none;
}
.container .right {
  position: relative;
  float: left;
  width: 62.4%;
  height: 100%;
}
.container .right .top {
  width: 100%;
  height: 47px;
  padding: 15px 29px;
  background-color: #eceff1;
}
.container .right .top span {
  font-size: 15px;
  color: #999;
}
.container .right .top span .name {
  color: #1a1a1a;
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 600;
}
.container .right .chat {
  position: relative;
  display: none;
  overflow: hidden;
  padding: 0 35px 92px;
  border-width: 1px 1px 1px 0;
  border-style: solid;
  border-color: #e6e6e6;
  height: -moz-calc(100% - 48px);
  height: -webkit-calc(100% - 48px);
  height: -o-calc(100% - 48px);
  height: calc(100% - 48px);
  -webkit-justify-content: flex-end;
  justify-content: flex-end;
  -webkit-flex-direction: column;
  flex-direction: column;
}
.container .right .chat.active-chat {
  display: block;
  display: -webkit-flex;
  display: flex;
}
.container .right .chat.active-chat .bubble {
  -moz-transition-timing-function: cubic-bezier(0.4, -0.04, 1, 1);
  -o-transition-timing-function: cubic-bezier(0.4, -0.04, 1, 1);
  -webkit-transition-timing-function: cubic-bezier(0.4, -0.04, 1, 1);
  transition-timing-function: cubic-bezier(0.4, -0.04, 1, 1);
}
.container .right .chat.active-chat .bubble:nth-of-type(1) {
  -moz-animation-duration: 0.15s;
  -webkit-animation-duration: 0.15s;
  animation-duration: 0.15s;
}
.container .right .chat.active-chat .bubble:nth-of-type(2) {
  -moz-animation-duration: 0.3s;
  -webkit-animation-duration: 0.3s;
  animation-duration: 0.3s;
}
.container .right .chat.active-chat .bubble:nth-of-type(3) {
  -moz-animation-duration: 0.45s;
  -webkit-animation-duration: 0.45s;
  animation-duration: 0.45s;
}
.container .right .chat.active-chat .bubble:nth-of-type(4) {
  -moz-animation-duration: 0.6s;
  -webkit-animation-duration: 0.6s;
  animation-duration: 0.6s;
}
.container .right .chat.active-chat .bubble:nth-of-type(5) {
  -moz-animation-duration: 0.75s;
  -webkit-animation-duration: 0.75s;
  animation-duration: 0.75s;
}
.container .right .chat.active-chat .bubble:nth-of-type(6) {
  -moz-animation-duration: 0.9s;
  -webkit-animation-duration: 0.9s;
  animation-duration: 0.9s;
}
.container .right .chat.active-chat .bubble:nth-of-type(7) {
  -moz-animation-duration: 1.05s;
  -webkit-animation-duration: 1.05s;
  animation-duration: 1.05s;
}
.container .right .chat.active-chat .bubble:nth-of-type(8) {
  -moz-animation-duration: 1.2s;
  -webkit-animation-duration: 1.2s;
  animation-duration: 1.2s;
}
.container .right .chat.active-chat .bubble:nth-of-type(9) {
  -moz-animation-duration: 1.35s;
  -webkit-animation-duration: 1.35s;
  animation-duration: 1.35s;
}
.container .right .chat.active-chat .bubble:nth-of-type(10) {
  -moz-animation-duration: 1.5s;
  -webkit-animation-duration: 1.5s;
  animation-duration: 1.5s;
}
.container .right .write {
  position: absolute;
  bottom: 29px;
  left: 30px;
  height: 42px;
  padding-left: 8px;
  border: 1px solid #e6e6e6;
  background-color: #eceff1;
  width: -moz-calc(100% - 58px);
  width: -webkit-calc(100% - 58px);
  width: -o-calc(100% - 58px);
  width: calc(100% - 58px);
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
}
.container .right .write input {
  font-size: 16px;
  float: left;
  width: 347px;
  height: 40px;
  padding: 0 10px;
  color: #1a1a1a;
  border: 0;
  outline: none;
  background-color: #eceff1;
  font-family: 'Source Sans Pro', sans-serif;
  font-weight: 400;
}
.container .right .write .write-link.attach:before {
  display: inline-block;
  float: left;
  width: 20px;
  height: 42px;
  content: '';
  background-image: url("http://s1.postimg.org/s5gfy283f/attachemnt.png");
  background-repeat: no-repeat;
  background-position: center;
}
.container .right .write .write-link.smiley:before {
  display: inline-block;
  float: left;
  width: 20px;
  height: 42px;
  content: '';
  background-image: url("http://s14.postimg.org/q2ug83h7h/smiley.png");
  background-repeat: no-repeat;
  background-position: center;
}
.container .right .write .write-link.send:before {
  display: inline-block;
  float: left;
  width: 20px;
  height: 42px;
  margin-left: 11px;
  content: '';
  background-image: url("http://s30.postimg.org/nz9dho0pp/send.png");
  background-repeat: no-repeat;
  background-position: center;
}
.container .right .bubble {
  font-size: 16px;
  position: relative;
  display: inline-block;
  max-width:300px;
  word-wrap: break-word;
  clear: both;
  margin-bottom: 8px;
  padding: 13px 14px;
  vertical-align: top;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 10px;
}
.container .right .bubble:before {
  position: absolute;
  top: 19px;
  display: block;
  width: 8px;
  height: 6px;
  content: '\00a0';
  -moz-transform: rotate(29deg) skew(-35deg);
  -ms-transform: rotate(29deg) skew(-35deg);
  -webkit-transform: rotate(29deg) skew(-35deg);
  transform: rotate(29deg) skew(-35deg);
}
.container .right .bubble.you {
  float: left;
  margin:5px;
  color: #1a1a1a;
  background-color: #00FA9A;
  -webkit-align-self: flex-start;
  align-self: flex-start;
  -moz-animation-name: slideFromLeft;
  -webkit-animation-name: slideFromLeft;
  animation-name: slideFromLeft;
}
.container .right .bubble.you:before {
  left: -3px;

   background-color: #00FA9A;
}
.container .right .bubble.me {
  float: right;
  margin:5px;
  color: #fff;
  background-color: #00b0ff;
  -webkit-align-self: flex-end;
  align-self: flex-end;
  -moz-animation-name: slideFromRight;
  -webkit-animation-name: slideFromRight;
  animation-name: slideFromRight;
}
.container .right .bubble.me:before {
  right: -3px;
     background-color: #00b0ff;
 
}
.container .right .conversation-start {
  position: relative;
  width: 100%;
  margin-bottom: 27px;
  text-align: center;
}
.container .right .conversation-start span {
  font-size: 14px;
  display: inline-block;
  color: #999;
}
.container .right .conversation-start span:before, .container .right .conversation-start span:after {
  position: absolute;
  top: 10px;
  display: inline-block;
  width: 30%;
  height: 1px;
  content: '';
  background-color: #e6e6e6;
}
.container .right .conversation-start span:before {
  left: 0;
}
.container .right .conversation-start span:after {
  right: 0;
}

@keyframes slideFromLeft {
  0% {
    margin-left: -200px;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
    opacity: 0;
  }
  100% {
    margin-left: 0;
    filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
    opacity: 1;
  }
}
@-webkit-keyframes slideFromLeft {
  0% {
    margin-left: -200px;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
    opacity: 0;
  }
  100% {
    margin-left: 0;
    filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
    opacity: 1;
  }
}
@keyframes slideFromRight {
  0% {
    margin-right: -200px;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
    opacity: 0;
  }
  100% {
    margin-right: 0;
    filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
    opacity: 1;
  }
}
@-webkit-keyframes slideFromRight {
  0% {
    margin-right: -200px;
    filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
    opacity: 0;
  }
  100% {
    margin-right: 0;
    filter: progid:DXImageTransform.Microsoft.Alpha(enabled=false);
    opacity: 1;
  }
}
.credits {
  color: white;
  font-size: 11px;
  position: absolute;
  bottom: 10px;
  right: 15px;
}
.credits a {
  color: white;
  text-decoration: none;
}
</style>
   <li><a href='check.php'><img src="1.png" class="icon">Connecticon</a></li>
   <li><a href='channel.php'>Channels</a></li>
   <li><a href='issues.php'>Issues</a></li>
   <li><a href='news2.html'>News</a></li>
   <li><a href='ideapage/index.html'>Ideas</a></li>
   <li><a href='about.html'>About</a></li>
   <li style="  padding-top: 13px; padding-left: 15px;"><i class="fa fa-bell-o" style="font-size:29px"></i></li>

   <li style="float:right;position:relative;"><a href='logout.php'>Log out</a></li>
   <li style="float:right;" id="wrap">
  <form action="search.php" method ="POST" autocomplete="on">
  <input id="search" name="search" type="text" placeholder="Search"><input id="search_submit" value="search" type="submit">
  </form>
</li>
</ul>
</div>
<?php
    
?>
		<div class = "wrapper">
		<div class = "container">
		<div class = "left">
		<div class="top">
                <input type="text" />
                <a href="javascript:;" class="search"></a>
		
            	</div>
		<ul class="people">
		<?php
			$query = mysql_query("select * from loggedin");
			$result = mysql_fetch_assoc($query);
			while($result){
				$tmp = $result['username'];
		?>
                <li class="person" data-chat="person1">
                    <img src="37.gif" alt="" />
                    <span class="name"><?php echo $tmp; ?></span>
                    <span class="time">2:09 PM</span>
                    <span class="preview"><?php echo $desc; ?></span>
                </li>
		<?php
			$result = mysql_fetch_assoc($query);
			}	
		?>
		</div>
		<div class = "right">
		            <div class="top"><span>Channel Name :<span class="name"><?php echo $_POST['search2']; ?></span></span></div>

		<title>Chat</title>
		<style type="text/css" media="screen">
			body{
				background-size:100%;
				background-repeat:no-repeat;
	
			}
			.usercolor{
				font-color: red;
				font-style: bold;
			}	
			.chat_time {
				font-style: italic;
				font-size: 9px;
			}
		</style>
		<script language="JavaScript" type="text/javascript">
		var sendReq = getXmlHttpRequestObject();
			var receiveReq = getXmlHttpRequestObject();
			var receiveUser = getXmlHttp
			var lastMessage = 0;
			var x= "<?php echo $_COOKIE['user']; ?>";
			var mTimer;
			//Function for initializating the page.
			function startChat() {
				//Set the focus to the Message Box.
				document.getElementById('txt_message').focus();
				//Start Recieving Messages
				getUsers();
				getChatText();

				
			}		
			//Gets the browser specific XmlHttpRequest Object
			function getXmlHttpRequestObject() {
				if (window.XMLHttpRequest) {
					return new XMLHttpRequest();
				} else if(window.ActiveXObject) {
					return new ActiveXObject("Microsoft.XMLHTTP");
				} else {
					document.getElementById('p_status').innerHTML = 'Status: Cound not create XmlHttpRequest Object.  Consider upgrading your browser.';
				}
			}
			
			//Gets the current messages from the server
			function getChatText() {
				if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
					receiveReq.open("GET", 'getChat2.php?chat=1&last=' + lastMessage + '&chname=' +"<?php echo $_POST['search2'];?>" , true);
					receiveReq.onreadystatechange = handleReceiveChat;
					receiveReq.send(null);
				}			
			}
			function getUsers() {
				if (receiveReq.readyState == 4 || receiveReq.readyState == 0) {
					receiveReq.open("GET", 'getusers.php' , true);
					receiveReq.onreadystatechange = handleReceiveChat;
					receiveReq.send(null);
				}			
			}
			//Add a message to the chat server.
			function sendChatText() {
				if(document.getElementById('txt_message').value == '') {
					alert("You have not entered a message");
					return;
				}
				if (sendReq.readyState == 4 || sendReq.readyState == 0) {
					sendReq.open("POST", 'getChat2.php?chat=1&last=' + lastMessage + '&chname=' + "<?php echo $_POST['search2'];?>", true);
					sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					sendReq.onreadystatechange = handleSendChat; 
					var param = 'message=' + document.getElementById('txt_message').value;
					param += '&name=';
					param += x;
					param += '&chat=1';
					sendReq.send(param);
					document.getElementById('txt_message').value = '';
				}							
			}
			//When our message has been sent, update our page.
			function handleSendChat() {
				//Clear out the existing timer so we don't have 
				//multiple timer instances running.
				clearInterval(mTimer);
				getChatText();
			}
			//Function for handling the return of chat text
			function handleReceiveChat() {
				if (receiveReq.readyState == 4) {
					var chat_div = document.getElementById('div_chat');
					var xmldoc = receiveReq.responseXML;
                                          var xy = "<?php echo $_COOKIE['user']; ?>";

					var message_nodes = xmldoc.getElementsByTagName("message"); 
					var n_messages = message_nodes.length;
                                               chat_div.innerHTML += '<div id="chat">';
					for (i = 0; i < n_messages; i++) {
						
						var user_node = message_nodes[i].getElementsByTagName("user");
						var text_node = message_nodes[i].getElementsByTagName("text");
						var time_node = message_nodes[i].getElementsByTagName("time");

                                              if(user_node[0].firstChild.nodeValue == xy) {
							
						var el     = document.createElement('div');
						var username  = document.createElement('div');
						el.setAttribute("class","bubble me");
						username.setAttribute("class","usernameclass");
						
	                                        username.innerHTML += user_node[0].firstChild.nodeValue+  '&nbsp;';
						username.innerHTML += '<font class="chat_time">' + time_node[0].firstChild.nodeValue + '</font><br />';
						
						el.appendChild(username);
						el.innerHTML += text_node[0].firstChild.nodeValue + '<br />';
                                               
						el.innerHTML += '</div>';
						chat_div.appendChild(el);
						chat_div.innerHTML += '<br><br><br><br>';

						 }
                                               else {

						
						var el     = document.createElement('div');
						var username = document.createElement('div');
						el.setAttribute("class","bubble you");
						username.setAttribute("class","usernameclass");
	                                        username.innerHTML += user_node[0].firstChild.nodeValue+  '&nbsp;';
						username.innerHTML += '<font class="chat_time">' + time_node[0].firstChild.nodeValue + '</font><br />';

						el.appendChild(username);
						el.innerHTML += text_node[0].firstChild.nodeValue + '<br />';
                                               
						el.innerHTML += '</div>';
						chat_div.appendChild(el);
						chat_div.innerHTML += '<br><br><br><br>';
						}

						lastMessage = (message_nodes[i].getAttribute('id'));
						chat_div.scrollTop = chat_div.scrollHeight;
					}	
					mTimer = setTimeout('getChatText();',2000); //Refresh our chat in 2 seconds
				}
			}
			//This functions handles when the user presses enter.  Instead of submitting the form, we
			//send a new message to the server and return false.
			function blockSubmit() {
				sendChatText();
				return false;
			}
			//This cleans out the database so we can start a new chat session.
			function resetChat() {
				if (sendReq.readyState == 4 || sendReq.readyState == 0) {
					sendReq.open("POST", 'getChat2.php?chat=1&last=' + lastMessage + '&chname=' + "<?php echo $_POST['search2'];?>", true);
					sendReq.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
					sendReq.onreadystatechange = handleResetChat; 
					var param = 'action=reset';
					sendReq.send(param);
					document.getElementById('txt_message').value = '';
				}							
			}
			//This function handles the response after the page has been refreshed.
			function handleResetChat() {
				document.getElementById('div_chat').innerHTML = '';
				getChatText();
			}	
		</script>
	</head>
	
		<div class = "channels">
		</div>
		<div class = "dabba" style="background-color:white;">
		<div id="div_chat" style="height: 480px;width: 500px;overflow:auto;background-color: white; border: 1px;">
			
		</div>
		<br><br>
		
		<form id="frmmain" name="frmmain" onsubmit="return blockSubmit();">
			
			<div class="write">
                <a href="javascript:;" class="write-link attach"></a>
                <input  type="text" id="txt_message" name="txt_message" />
                <a href="javascript:;" class="write-link smiley"></a>
                <a href="javascript:;" class="write-link send" onclick="javascript:sendChatText();"></a>
         		</div>
		</form>
			<form action="" method = "POST">
			
		</form> 
		<?php
			if(isset($_POST['logout'])){
					$u = $_COOKIE['user'];
					$query = "DELETE from loggedin where username=$u";
					mysql_query($query);
					unset($_COOKIE['user']);
					setcookie("user","",1);
					echo $_COOKIE['user'];
					header("Location: index.php");
			}
		?>
		</div>
		

	</body>
</html>
