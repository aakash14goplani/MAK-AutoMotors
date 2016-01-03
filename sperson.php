<?php

	if($_POST['submit'])
	{
		$city = $_POST['city'];
		
		if($city)
		{
			$connect = mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("we") or die("no database found");
		}
		else
			die("Please provide city!");
		
		$query = mysql_query("SELECT * FROM salesperson WHERE city = '$city'");
		
		$numrows = mysql_num_rows($query);
		
		if($numrows > 0)
		{
			echo "<table border='1' cellspacing='4' cellpadding='4'>";
			echo "<tr><th>s_id: </th><th>Name : </th><th>City : </th><th>Contact : </th></tr>";
			while($rows = mysql_fetch_assoc($query))
			{
				$s_id = $rows['s_id'];
				$c_id = $rows['c_id'];
				$name = $rows['name'];
				$city = $rows['city'];
				$contact = $rows['contact'];
				
				echo "<tr><td>$s_id</td><td>$name</td><td>$city</td><td>$contact</td></tr>";	
			}	
			echo "</table>";
		}
		else
			die("No Salesperson found!");
	}

?>