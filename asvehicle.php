<?php

	if($_POST['submit'])
	{
		$name = $_POST['search'];
		
		if($name)
		{
			$connect = mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("adbms") or die("no database found");
		}
		else
			die("Please provide vehicl name!");
		
		$query1 = mysql_query("SELECT * FROM twowheel where t_name = '$name'");
		$query2 = mysql_query("SELECT * FROM fourwheel where f_name = '$name'");
		
		$numrows1 = mysql_num_rows($query1);
		$numrows2 = mysql_num_rows($query2);
		
		echo "<table border = '1'>";
		if($numrows1 > 0)
		{
			echo "<tr><th>Model No</th><th>Gear Type</th><th>Name</th><th>Price</th><th>Color</th></tr>";
			while($rows1 = mysql_fetch_assoc($query1))
			{
				$modelNo = $rows1['t_modelNo'];
				$c_id = $rows1['c_id'];
				$gearType = $rows1['t_gearType'];
				$name = $rows1['t_name'];
				$price = $rows1['t_price'];
				$color = $rows1['t_color'];
				
				echo "<tr><td>$modelNo</td><td>$gearType</td><td>$name</td><td>$price</td><td>$color</td></tr>";
			}
		}
		else
			if($numrows2 > 0)
			{
				echo "<tr><th>Model No</th><th>Gear Type</th><th>Name</th><th>Price</th><th>Color</th></tr>";
				while($rows2 = mysql_fetch_assoc($query2))
				{
					$modelNo = $rows2['f_modelNo'];
					$c_id = $rows2['c_id'];
					$gearType = $rows2['f_gearType'];
					$name = $rows2['f_name'];
					$price = $rows2['f_price'];
					$color = $rows2['f_color'];
					
					echo "<tr><td>$modelNo</td><td>$gearType</td><td>$name</td><td>$price</td><td>$color</td></tr>";
				}
				echo "</table>";
			}
		else
			die("No results found!");
	}
	else
		die("Error!");

?>