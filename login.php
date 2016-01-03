<?php
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		session_start();
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		if($username && $password)
		{
			$connect = mysql_connect("localhost","root","") or die(mysql_error());
			mysql_select_db("we") or die("no database found");
		}
		else
			die("Please provide username/password!");
		
		$query = mysql_query("SELECT * FROM customer WHERE name = '$username'");
		$numrows = mysql_num_rows($query);
		
		if($numrows != 0)
		{
			while ($rows = mysql_fetch_assoc($query))
			{
				$dbusername = $rows['name'];
				$dbpassword = $rows['password'];
			}
			
			if($username == $dbusername && $password == $dbpassword)
			{
				echo "Welcome $username, you have successfully Logged in!<br><a href='vehicle.php'>Click here to have a look on our vehicles!</a>";
				$_SESSION['username'] = $username;
			}
			else
				die("Incorrect Password!");
		}
		else
			die("Username does not exists!");
	}
?>