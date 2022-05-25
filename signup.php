<?php 
session_start();
	// Inkluderar variabler samt funktioner från connection.php och functions.php
	include("connection.php");
	include("functions.php");

	// Kollar om det har varit en post
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//variablerna med värdena username och password
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		// Kollar om variablerna inte är tomma samt att de inte är siffror
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//Använder random_num funktionen för att göra en user_id
			$user_id = random_num(20);
			// Skickar in värdena till relevanta kolumner i databasen
			$query = "INSERT INTO users (user_id, username, password) VALUES ('$user_id', '$user_name', '$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="css/main.css">

</head>
<body>

<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input class="text" type="text" name="user_name"><br><br>
			<input class="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>