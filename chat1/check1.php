<?php
header("cache-Control: no-store, no-cache, must-revalidate");
header("cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

if(!isset($_COOKIE['user']))
  {
   Header("Location: index.php");
  }
?>


<!doctype html>
<html lang=''>

<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="chat_style.css">
  <link rel="shortcut icon" href="1.png" type="image/png"/> 
   <title>
	CONNECTICON
   </title>
   

</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='#'><img src="1.png" class="icon">Connecticon</a></li>
   <li><a href='channel.php'>Channels</a></li>
   <li><a href='issues.php'>Issues</a></li>
   <li><a href='news2.html'>News</a></li>
   <li><a href='ideapage/index.html'>Ideas</a></li>
   <li><a href='about.html'>About</a></li>
   <!--<li style="  padding-top: 13px; padding-left: 15px;"><i class="fa fa-bell-o" style="font-size:29px"></i></li>-->

   <li style="float:right;position:relative;"><a href='logout.php'>Log out</a></li>
   <li style="float:right;" id="wrap">
  <form action="search.php" method = "POST" autocomplete="on">
  <input id="search" name="search" type="text" placeholder="Search"><input id="search_submit" value="search" type="submit">
  </form>
</li>
</ul>
</div>


<?php
   require('database.php');


$result = mysql_query("SELECT * FROM channels") or die(mysql_error());
$count = 0;
while($row = mysql_fetch_array( $result ))
{
  $select = $count%4;
  switch($select){
	
	case 0,1:
		$img = "div.jpg";
		break;
	case 2,3:
		$img = "msg.png";
		break;
	default:	
		break;
  }
	
	
  $tmp = $row['channel'] ;
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
<!--<div class ="col-sm-6 col-md-6 hp-featured-item pnone">
	<div class="hp-fi-cover-img cubic-trans" style="background-image:url(div.jpg);">
	</div>

	<div class="hp-fi-cover cubic-trans">
	</div>

	<div class="hp-fi-desc">
		<h3>channel 2</h3>
		<a href="http://www.google.com" target="_blank"><p class="hp-item-btn cubic-trans">Join</p></a>
	</div>
</div>
<div class ="col-sm-6 col-md-6 hp-featured-item pnone">
	<div class="hp-fi-cover-img cubic-trans" style="background-image:url(div.jpg);">
	</div>

	<div class="hp-fi-cover cubic-trans">
	</div>

	<div class="hp-fi-desc">
		<h3>channel 3</h3>
		<a href="http://www.google.com" target="_blank"><p class="hp-item-btn cubic-trans">Join</p></a>
	</div>
</div>
<div class ="col-sm-6 col-md-6 hp-featured-item pnone">
	<div class="hp-fi-cover-img cubic-trans" style="background-image:url(div.jpg);">
	</div>

	<div class="hp-fi-cover cubic-trans">
	</div>

	<div class="hp-fi-desc">
		<h3>channel 4</h3>
		<a href="http://www.google.com" target="_blank"><p class="hp-item-btn cubic-trans">Join</p></a>
	</div>
</div>
!-->
</body>
<html>
























