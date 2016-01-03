<?php

if($_POST['submit'])
	{			
			$connect = mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("adbms") or die("no database found");
			
			echo "<center>";
			
		echo "<br><br><b>Details of customers in database</b><br><br>";	
		
		$query = "select * from customer";
				
		$result = mysql_query($query) or die("Cannot execute!");
		$numrows = mysql_num_rows($result);
			
		if($numrows > 0)
		{
			echo "<table border='1' cellspacing='4' cellpadding='4'>";
			echo "<tr><th>ID</th><th>Name</th><th>Contact</th><th>Address</th><th>Email</th></tr>";
			while($rows = mysql_fetch_assoc($result))
			{
					$c_id = $rows['c_id'];
					$c_name = $rows['c_name'];
					$c_contact = $rows['c_contact'];
					$address = $rows['address'];
					$email = $rows['email'];

					echo "<tr><td>$c_id</td><td>$c_name</td><td>$c_contact</td><td>$address</td><td>$email</td></tr>";	
			}
			echo "</table>";	
		}
		else
			die("No results found!!!!!");
			
		echo "<br><br>-----------------------------------------------------------------------------------------------------------------------<br><br>";
		
		echo "<br><br><b>Details of salespersons in database</b><br><br>";	
		
		$query = "select * from salesperson";
				
		$result = mysql_query($query) or die("Cannot execute!");
		$numrows = mysql_num_rows($result);
			
		if($numrows > 0)
		{
			echo "<table border='1' cellspacing='4' cellpadding='4'>";
			echo "<tr><th>ID</th><th>Name</th><th>Contact</th><th>Address</th><th>Target</th><th>Sales</th></tr>";
			while($rows = mysql_fetch_assoc($result))
			{
					$s_id = $rows['s_id'];
					$name = $rows['name'];
					$contact = $rows['contact'];
					$city = $rows['city'];
					$target = $rows['target'];
					$sales = $rows['sales'];
	
					echo "<tr><td>$s_id</td><td>$name</td><td>$contact</td><td>$city</td><td> $target</td><td>$sales</td></tr>";	
			}
			echo "</table>";	
		}
		else
			die("No results found!!!!!");
			
			echo "<br><br>-------------------------------------------------------------------------------------------------------------------<br><br>";
			
			echo "<br><br><b>Details of vehicles in database</b><br><br>";	
		
		$query = "select t.t_modelNo,t.t_name,t.t_price,f.f_modelNo,f.f_name,f.f_price from twowheel t cross join fourwheel f";
				
		$result = mysql_query($query) or die("Cannot execute!");
		$numrows = mysql_num_rows($result);
			
		if($numrows > 0)
		{
			echo "<table border='1' cellspacing='4' cellpadding='4'>";
			echo "<tr><th>Model No</th><th>Model Name</th><th>Model Price</th></tr>";
			while($rows = mysql_fetch_assoc($result))
			{
					$t_modelNo = $rows['t_modelNo'];
					$t_name = $rows['t_name'];
					$t_price = $rows['t_price'];
					$f_modelNo = $rows['f_modelNo'];
					$f_name = $rows['f_name'];
					$f_price = $rows['f_price'];
					
					echo "<tr><td>$t_modelNo</td><td>$t_name</td><td>$t_price</td></tr><tr><td>$f_modelNo</td><td>$f_name</td><td>$f_price</td></tr>";	
			}
			echo "</table>";	
		}
		else
			die("No results found!!!!!");
			
			echo "<br><br>-------------------------------------------------------------------------------------------------------------------<br><br>";
			
			echo "<br><b>Detail of customer regarding its purchases and salesperson associated with it :</b><br><br>";
			
			$query =  "select c.c_id,c.c_name,c.c_contact,c.address,s.s_id,s.name,s.city 
						from customer c, salesperson s
						where 
						c.c_id=s.c_id";
						
			$result = mysql_query($query) or die("Cannot execute!");
			$numrows = mysql_num_rows($result);
			
			if($numrows > 0)
			{
				echo "<table border='1' cellspacing='4' cellpadding='4'>";
				echo "<tr><th>Customer ID</th><th>Customer Name</th><th>Customer Contact</th><th>Customer City</th><th>Salesperson ID</th><th>Salesperson Name</th><th>Salesperson City</th></tr>";
				while($rows = mysql_fetch_assoc($result))
				{
					$c_id = $rows['c_id'];
					$c_name = $rows['c_name'];
					$c_contact = $rows['c_contact'];
					$address = $rows['address'];
					$s_id = $rows['s_id'];
					$name = $rows['name'];
					$city = $rows['city'];
										
					echo "<tr><td>$c_id</td><td>$c_name</td><td>$c_contact</td><td>$address</td><td>$s_id</td><td>$name</td><td>$city</td></tr>";	
				}	
				echo "</table>";
			}
			else
				die("No results found!!!!!");
				
		echo "<br><br>-----------------------------------------------------------------------------------------------------------------------<br><br>";
						
			echo "<br><br><b>Detail of customer who have done payment via loan :</b><br><br>";
			
			$query =  "select customer.c_id,customer.c_name,customer.c_contact,customer.address,payment.paytype 
						from customer, payment 
						where 
						customer.c_id=payment.c_id";
						
			$result = mysql_query($query) or die("Cannot execute!");
			$numrows = mysql_num_rows($result);
			
			if($numrows > 0)
			{
				echo "<table border='1' cellspacing='4' cellpadding='4'>";
				echo "<tr><th>ID : </th><th>Name : </th><th>Contact : </th><th>Address : </th><th>Paytype : </th></tr>";
				while($rows = mysql_fetch_assoc($result))
				{
					$c_id = $rows['c_id'];
					$c_name = $rows['c_name'];
					$c_contact = $rows['c_contact'];
					$address = $rows['address'];
					$paytype = $rows['paytype'];
										
					echo "<tr><td>$c_id</td><td>$c_name</td><td>$c_contact</td><td>$address</td><td>$paytype</td></tr>";	
				}	
				echo "</table>";
			}
			else
				die("No results found!!!!!");
				
		echo "<br><br>--------------------------------------------------------------------------------------------------------------------<br><br>";
						
			echo "<br><br><b>Details of customers who have purchased vehicles above in ascending order by thier price :</b><br><br>";
			
			$query = "select customer.c_id,customer.c_name,customer.c_contact,customer.address,twowheel.t_modelNo,twowheel.t_name, twowheel.t_price, fourwheel.f_modelNo,fourwheel.f_name,fourwheel.f_price 
						from customer, twowheel, fourwheel
						where 
						(customer.c_id=twowheel.c_id) or (customer.c_id=fourwheel.c_id)
						order by t_price ASC";
						
			$result = mysql_query($query) or die("Cannot execute!");
			$numrows = mysql_num_rows($result);
			
			if($numrows > 0)
			{
				echo "<table border='1' cellspacing='4' cellpadding='4'>";
				echo "<tr><th>Customer ID</td><th>Customer Name</td><th>Customer Contact</td><th>Customer Address</td><th>TwoWheel Model No</td>
				<th>TwoWheel Model Name</td><th>TwoWheel Model Price</td><th>FourWheel Model No</td><th>FourWheel Model Name</td><th>FourWheel Model Price</td></tr>";
				while($rows = mysql_fetch_assoc($result))
				{
					$c_id = $rows['c_id'];
					$c_name = $rows['c_name'];
					$c_contact = $rows['c_contact'];
					$address = $rows['address'];
					$t_modelNo = $rows['t_modelNo'];
					$t_name = $rows['t_name'];
					$t_price = $rows['t_price'];
					$f_modelNo = $rows['f_modelNo'];
					$f_name = $rows['f_name'];
					$f_price = $rows['f_price'];
										
					echo "<tr><td>$c_id</td><td>$c_name</td><td>$c_contact</td><td>$address</td><td>$t_modelNo</td><td>$t_name</td><td>$t_price</td><td>$f_modelNo</td><td>$f_name</td><td>$f_price</td></tr>";	
				}
					echo "</table>";				
			}
			else
				die("No results found!!!!!");
				
		echo "<br><br>-----------------------------------------------------------------------------------------------------------------------<br><br>";
				
		echo "<br><br><b>Give rating to salesperson according to thier sales</b><br><br>";

				$query = "select s_id,name,target,sales,
					case when sales > 5000 then 'A'
						 when sales > 2500 then 'B'
						 else 'C'
						 end as rating
				from salesperson";
				
		$result = mysql_query($query) or die("Cannot execute!");
		$numrows = mysql_num_rows($result);
			
		if($numrows > 0)
		{
			echo "<table border='1' cellspacing='4' cellpadding='4'>";
			echo "<tr><th>ID : </th><th>Name : </th><th>Target : </th><th>Sales : </th><th>Grade : </th></tr>";
			while($rows = mysql_fetch_assoc($result))
			{
					$s_id = $rows['s_id'];
					$s_name = $rows['name'];
					$target = $rows['target'];
					$sales = $rows['sales'];
					$grade = $rows['rating'];
										
					echo "<tr><td>$s_id</td><td>$s_name</td><td>$target</td><td>$sales</td><td>$grade</td></tr>";	
			}	
			echo "</table>";
		}
		else
			die("No results found!!!!!");
	}
	
		echo "<br><br>-----------------------------------------------------------------------------------------------------------------------<br><br>";
		
		echo "<br><br><b>Salesperson with highest sales</b><br><br>";

			$query = "select name,avg(sales) from salesperson s
			group by name
			having avg(sales)>(select avg(sales) 
			from salesperson)";
			
			$result = mysql_query($query) or die("Cannot execute!");
			$numrows = mysql_num_rows($result);
				
			if($numrows > 0)
			{
				echo "<table border='1' cellspacing='4' cellpadding='4'>";
				echo "<tr><th>Name : </th><th>Sales : </th></tr>";
				while($rows = mysql_fetch_assoc($result))
				{
						$s_name = $rows['name'];
						$sales = $rows['avg(sales)'];
											
						echo "<tr><td>$s_name</td><td>$sales</td></tr>";	
				}	
				echo "</table>";
			}
			else
				die("No results found!!!!!");
		
		echo "</center>";
		
?>