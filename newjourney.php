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
		<div class="header2">
			<img src = "./images/ct.png" alt = "Drumcode - Header" />
		</div>
		<div id='cssmenu2'>
			<ul>
				<li class='active'><a href='home.php'><span>Home</span></a></li>
				<li><a href='newjourney.php'><span>New journey</span></a></li>
				<li><a href='jointeam.php'><span>Join team</span></a></li>
				<li><a href='test1.html'><span>Your Journey</span></a></li>
				<li><a href='ourvision.html'><span>Our vision</span></a></li>
				<li class='last'><a href='#'><span>Contact</span></a></li>
			</ul>
		</div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>


<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="uname" placeholder="Team Name" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Description" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-signup">Create team</button></td>
</tr>
</table>
</form>
</div>
</center>

</body>
</html>