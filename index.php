<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
 header("Location: home.php");
}
if(isset($_POST['btn-login']))
{
 $email = mysql_real_escape_string($_POST['email']);
 $upass = mysql_real_escape_string($_POST['pass']);
 $res=mysql_query("SELECT * FROM users WHERE email='$email'");
 $row=mysql_fetch_array($res);
 if($row['password']==md5($upass))
 {
  $_SESSION['user'] = $row['user_id'];
  header("Location: home.php");
 } 
 else
 {
  ?>
        <script>alert('wrong details');</script>
        <?php
 }
 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Awesome vision</title>
   
   
        <link rel="stylesheet" href="styles.css" />
        
       
    </head>
	
    
    <body>
	
	
	<div class="header1">
			<img src = "./images/logo.png" alt = "Drumcode - Header" />
		</div>
		
		<div id='cssmenu'>
			<ul>
				<li class='active'><a href='index.html'><span>Home</span></a></li>
				<li><a href='logout.php'><span>Log in</span></a></li>
				<li><a href='register.php'><span>Sign up</span></a></li>
				<li><a href='ourvision.html'><span>Our vision</span></a></li>
				<li class='last'><a href='#'><span>Contact</span></a></li>
			</ul>
		</div>
		
	<center>
<div id="login-form">
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="email" placeholder="Your Email" required /></td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="Your Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="btn-login">Sign In</button></td>
</tr>
<tr>
<td><a href="register.php">Sign Up Here</a></td>
</tr>
</table>
</form>
</div>
</center>
		
		
        
    </body>
</html>