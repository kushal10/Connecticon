<?php

	if(!isset($_COOKIE['user'])){
		header("Location: index.php");
	}
?>

<html>
	<head>
		<title>Chat</title>
		<style type="text/css" media="screen">
			body{
				background-image: url("bg.jpg");
				background-size:100%;
				background-repeat:no-repeat;
				opacity:0.7;
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
			var lastMessage = 0;
			var x= "<?php echo $_COOKIE['user']; ?>";
			var mTimer;
			//Function for initializating the page.
			function startChat() {
				//Set the focus to the Message Box.
				document.getElementById('txt_message').focus();
				//Start Recieving Messages.
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
					receiveReq.open("GET", 'getChat.php?chat=1&last=' + lastMessage, true);
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
					sendReq.open("POST", 'getChat.php?chat=1&last=' + lastMessage, true);
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
					var message_nodes = xmldoc.getElementsByTagName("message"); 
					var n_messages = message_nodes.length
					for (i = 0; i < n_messages; i++) {
						var user_node = message_nodes[i].getElementsByTagName("user");
						var text_node = message_nodes[i].getElementsByTagName("text");
						var time_node = message_nodes[i].getElementsByTagName("time");
	                                        chat_div.innerHTML += user_node[0].firstChild.nodeValue+  '&nbsp;';


						chat_div.innerHTML += '<font class="chat_time">' + time_node[0].firstChild.nodeValue + '</font><br />';
						chat_div.innerHTML += text_node[0].firstChild.nodeValue + '<br />';
						chat_div.scrollTop = chat_div.scrollHeight;
						lastMessage = (message_nodes[i].getAttribute('id'));
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
					sendReq.open("POST", 'getChat.php?chat=1&last=' + lastMessage, true);
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
	<body onload="javascript:startChat();">
		Discussion Channel #1
		<div id="div_chat" style="height: 300px; width: 500px; overflow: auto; background-color: #CCCCCC; border: 1px solid #555555;">
			
		</div>
		<form id="frmmain" name="frmmain" onsubmit="return blockSubmit();">
			<input type="button" name="btn_get_chat" id="btn_get_chat" value="Refresh Chat" onclick="javascript:getChatText();" />
			<input type="button" name="btn_reset_chat" id="btn_reset_chat" value="Reset Chat" onclick="javascript:resetChat();" /><br />
			<input type="text" id="txt_message" name="txt_message" style="width: 447px;" />
			<input type="button" name="btn_send_chat" id="btn_send_chat" value="Send" onclick="javascript:sendChatText();" />
		</form>
		<form action="" method = "POST">
		<input type = "submit" name = "logout" value = "logout">
		</form> 
		<?php
			if(isset($_POST['logout'])){

					setcookie("user",time()-1);
					header("Location: login2.php");
			}
		?>
	</body>
</html>
