<?php

	if($_POST['submit'])
	{
		$value = $_POST['spup'];
		
		if($value)
		{
			$connect = mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("adbms") or die("no database found");
		}
		else
			die("Please provide appropriate option!");
		
		echo " Query you entered is : <br>$value<br>";
		
		mysql_query("$value") or die("Cannot execute the Query");
	
		echo "<br>The Query is executed sucessfully<br> Have a look at your database!";
	
	}

?>