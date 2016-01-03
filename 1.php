<?php

if($_POST['submit'])
		{
			$min = $_POST['min'];
			$max = $_POST['max'];
			
			if($min && $max)
			{
				$connect = mysql_connect("localhost","root","") or die(mysql_error());
				mysql_select_db("we") or die("no database found");
			}
			else
				die("Please provide minimum and maximum price range!");
			
			$query1 = mysql_query("SELECT * FROM twowheel WHERE price BETWEEN $min AND $max UNION SELECT * FROM fourwheel WHERE price BETWEEN $min AND $max");
			
			$numrows1 = mysql_num_rows($query1);
			
			echo "<table border='1'>";
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