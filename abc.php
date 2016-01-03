<?php

	if($_POST['submit'])
	{
		$name = $_POST['search'];
		
		if($name)
		{
			$connect = mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("we") or die("no database found");
		}
		else
			die("Please provide vehicl name!");
		
		$query1 = mysql_query("SELECT * FROM twowheel where name = '$name' UNION SELECT * FROM fourwheel where name = '$name'");
		
		$numrows1 = mysql_num_rows($query1);
		
		echo "<table border = '1'>";
		if($numrows1 > 0)
		{
			echo "<tr><th>Model No</th><th>Gear Type</th><th>Name</th><th>Price</th><th>Color</th></tr>";
			while($rows1 = mysql_fetch_assoc($query1))
			{
				$modelNo = $rows1['modelNo'];
				$c_id = $rows1['c_id'];
				$gearType = $rows1['gearType'];
				$name = $rows1['name'];
				$price = $rows1['price'];
				$color = $rows1['color'];
				
				echo "<tr><td>$modelNo</td><td>$gearType</td><td>$name</td><td>$price</td><td>$color</td></tr>";
			}echo "</table>";
		}
		else
			die("No results found!");
	}
	else
		die("Error!");

?>