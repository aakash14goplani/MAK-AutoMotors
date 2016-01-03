<?php

if($_POST['submit'])
		{
			$min = $_POST['min'];
			$max = $_POST['max'];
			
			if($min && $max)
			{
				$connect = mysql_connect("localhost","root","") or die(mysql_error());
				mysql_select_db("adbms") or die("no database found");
			}
			else
				die("Please provide minimum and maximum price range!");
			
			$query1 = mysql_query("SELECT * FROM twowheel WHERE t_price BETWEEN $min AND $max UNION SELECT * FROM fourwheel WHERE f_price BETWEEN $min AND $max");
			
			$numrows1 = mysql_num_rows($query1);
			
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
					
					$modelNo = $rows1['f_modelNo'];
					$c_id = $rows1['c_id'];
					$gearType = $rows1['f_gearType'];
					$name = $rows1['f_name'];
					$price = $rows1['f_price'];
					$color = $rows1['f_color'];
					
					echo "<tr><td>$modelNo</td><td>$gearType</td><td>$name</td><td>$price</td><td>$color</td></tr>";
				}echo "</table>";	
			}
			else
				die("No results found!");
		}
		else
			die("Error!");
		
?>