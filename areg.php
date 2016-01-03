<?php
	$connect = mysql_connect("localhost","root","") or die(mysql_error());
	mysql_select_db("adbms") or die("no database found");
	
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$a=$b=$c=$d=$e=$f=true;
		//validating username
		$len = strlen($_POST['username']);
		if($_POST['username'] == "" || $len < 5 || !preg_match("/^[a-zA-Z ]*$/",$_POST['username']))
		{
			echo "<br>Username cannot be empty or less then 5 characters and should begin with letters only!";
			$a = false;
		}
		else
			$username = $_POST['username'];
			
		//validating password
		if($_POST['password1'] != $_POST['password2'] || strlen($_POST['password1']) < 3)
		{
			echo "<br><br>password mismatch!<br>please reenter the password!<br>password should be more than 3 characters!";
			$b = false;
		}
		else
			$password = $_POST['password2'];
			
		//validating email
		if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$_POST['email']))
		{
			echo "<br><br>Invalid email!";
			$c = false;
		}
		else
			$email = $_POST['email'];
			
		//validating contact no
		if($_POST['contact'] =="")
		{
			echo "<br><br>Invalid contact number";
			$d = false;
		}
		else
			$contact = $_POST['contact'];
			
		//validating date
		if($_POST['date'] == "")
		{
			echo "<br><br>Please enter your birthdate";
			$e = false;
		}
		else $dob = $_POST['date'];
		
		//validating address
		if($_POST['address'] == "")
		{
			echo "<br><br>Please enter your address";
			$f = false;
		}
		else $address = $_POST['address'];
		
		if($a == true && $b == true && $c == true && $d == true && $e == true && $f == true)
		{
			$query = "INSERT INTO customer VALUES ('','".$username."','".$password."','".$email."','.$contact.','".$dob."','".$address."')";
			$result = mysql_query($query) or die("Query Failed  ".mysql_error());
			echo "<br><br>Welcome $username, You have been registered Successfully!";
		}
		else
			echo "<br><br>Please Re-register!";	
	}
?>