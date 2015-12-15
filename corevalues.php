<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: corevalues.php");
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

<style type="text/css">
input[type="text"]{height:20px; vertical-align:top;}
.field_wrapper div{ margin-bottom:10px;}
.add_button{ margin-top:10px; margin-left:10px;vertical-align: text-bottom;}
.remove_button{ margin-top:10px; margin-left:10px;vertical-align: text-bottom;}
</style>


<script src="./js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var maxField = 10; //Input fields increment limitation
	var addButton = $('.add_button'); //Add button selector
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="./images/remove-icon.png"/></a></div>'; //New input field html 
	var x = 1; //Initial field counter is 1
	$(addButton).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); // Add field html
		}
	});
	$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
		e.preventDefault();
		$(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});
});
</script>

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
			<img src = "./images/cv.png" alt = "Drumcode - Header" />
		</div>
		<div id='cssmenu2'>
			<ul>
				<li class='active'><a href='home.php'><span>Home</span></a></li>
				<li><a href='createteam.php'><span>Create team</span></a></li>
				<li><a href='corevalues.php'><span>Core Values</span></a></li>
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<form name="codexworld_frm" action="" method="post">
<div class="field_wrapper">
	<div>
    	<input type="text" name="field_name[]" value=""/>
        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="./images/add-icon.png"/></a>
    </div>
</div>
<input type="submit" name="submit" value="SUBMIT"/>
</form>

<?php

if(isset($_REQUEST['submit'])){
	$field_values_array = $_REQUEST['field_name'];

	print '<pre>';
	print_r($field_values_array);
	print '</pre>';

	foreach($field_values_array as $value){
	$values = mysql_real_escape_string($value);
	$query = mysql_query("INSERT INTO corevalues (cname) VALUES ('$values')");
}
	}

?>





<?php
$res2 = mysql_query("SELECT cname FROM corevalues ORDER BY cid DESC LIMIT 4") or die(mysql_error());
$Row2=mysql_fetch_array($res2);

if(mysql_num_rows($res2) > 0): ?>
<table>
    <tr>
        <th>CoreValue 1</th>
        <th>CoreValue 2</th>
        <th>CoreValue 3</th>
        <th>CoreValue 4</th>
    <tr>
    <?php while($row2 = mysql_fetch_assoc($res2)): ?>
    <tr>
        <td><?php echo $row2['cname']; ?></td>
        <td><?php echo $row2['cname']; ?></td>
        <td><?php echo $row2['cname']; ?></td>
        <td><?php echo $row2['cname']; ?></td>
        
    </tr>
    <?php endwhile; ?>
</table>
<?php endif; ?>



</center>

</body>
</html>