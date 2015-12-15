<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" href="styles.css" type="text/css" />
</head>
<body>
<div id="header">
 
    <div id="right">
     <div id="content">
         Welcome <?php echo $userRow['username']; ?>&nbsp;<a href="logout.php?logout">Sign Out</a>
        </div>
    </div>
	<br>
	<br>
	<br>
		<div class="header">
			<img src = "./images/header.png" alt = "Drumcode - Header" />
		</div>
		<div id='cssmenu2'>
			<ul>
				<li class='active'><a href='home.php'><span>Home</span></a></li>
				<li><a href='newjourney.php'><span>New journey</span></a></li>
				<li><a href='createteam.php'><span>Create Team</span></a></li>
				<li><a href='jointeam.php'><span>Join Team</span></a></li>
				<li><a href='corevalues.php'><span>Core Values</span></a></li>
				<li><a href='ourvision.html'><span>Our vision</span></a></li>
				<li class='last'><a href='#'><span>Contact</span></a></li>
			</ul>
		</div>
</div>

<script src="./js/addinput.js" language="Javascript" type="text/javascript"></script>
<form method="POST">
     <div id="dynamicInput">
          Core Value 1<br><input type="text" name="myInputs[]">
     </div>
     <input type="button" value="Add another Core Value" onClick="addInput('dynamicInput');">
</form>
</div>


</body>
</html>