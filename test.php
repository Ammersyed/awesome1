<?php
// Make a MySQL Connection
mysql_connect("####", "####", "####") or die(mysql_error());
mysql_select_db("####") or die(mysql_error());

// Get all the data from the "example" table
$result = mysql_query("SELECT * FROM pages") 
or die(mysql_error());  

?>
<p>Page title</p><br />
<?php echo"<input name=\"pagename\" type=\"text\" id=\"pagename\" value=\"" .$pagename. "\">"; ?>

<p>Keywords</p><br />
  <?php echo"<input name=\"pagekey\" type=\"text\" id=\"pagekey\" value=\"" .$pagekey. "\">"; ?>

<p>Description</p><br />
<?php echo"<input name=\"pagedesc\" type=\"text\" id=\"pagedesc\" value=\"" .$pagedesc. "\">"; ?>

<p>Content</p><br />
<?php echo "<textarea name=\"pagecont\" cols=\"120\" rows=\"20\" id=\"pagecont\" >".$pagecont."</textarea>";?>