<html>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="chat_style.css">
<div id='cssmenu'>
<ul>
   <li><a href='check.php'><img src="1.png" class="icon">Connecticon</a></li>
   <li><a href='channel.php'>Channels</a></li>
   <li><a href='issues.php'>Issues</a></li>
   <li><a href='127.0.0.1/news.php'>News</a></li>
   <li><a href='ideapage/index.html'>Ideas</a></li>
   <li><a href='#'>Radio</a></li>
   <li style="  padding-top: 13px; padding-left: 15px;"><i class="fa fa-bell-o" style="font-size:29px"></i></li>

   <li style="float:right;position:relative;"><a href='logout.php'>Log out</a></li>
   <li style="float:right;" id="wrap">
  <form action="" method ="POST">
  <input id="search" name="search" type="text" placeholder="Search ur channels">
  <input id="search_submit" value="search" type="submit">
  </form>
</li>
</ul>
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
$name = $_POST['search'];
if( $name != "")$sql = "SELECT * from channels where channel LIKE '%".$name."%'";
	$result = mysql_query($sql);
if(isset($_POST['search'])){
if(mysql_num_rows($result) == 0){
	echo "We Couldnt Find The exact Word Here Are Some Suggestions<br>";
	$output = shell_exec("python sql.py ".$name);
	echo $output;
}
}

while($row = mysql_fetch_array( $result ))
{

$tmp=$row['channel'];


?>

   <div class ="col-sm-6 col-md-6 hp-featured-item pnone">
	<div class="hp-fi-cover-img cubic-trans" style="background-image:url(div.jpg);">
	</div>

	<div class="hp-fi-cover cubic-trans">
	</div>

	<div class="hp-fi-desc">
            <form method="POST" action="chatdup.php">
       <input value="<?php echo $tmp;?>" type="hidden" name="search2"> 
           <h3><?php echo $tmp;?></h3>
            
	<input type="submit" class="hp-item-btn cubic-trans" value="Join">
               </form>
	</div>
</div>

<?php
}
?>

</html>
