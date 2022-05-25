<?php 

session_start();
	// Inkluderar variabler samt funktioner från connection.php och functions.php
	include("connection.php");
	include("functions.php");

	// Kollar om det har varit en post
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//variabler som används för att få värdena hos username och password
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		//Om username och password inte är null
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//Letar efter värdena i databasen
			$query = "SELECT * FROM users WHERE username = '$user_name' AND password = '$password'";
			$result = mysqli_query($con, $query);

			if($result && mysqli_num_rows($result) > 0)
			{
				$user_data = mysqli_fetch_assoc($result);

				$_SESSION['user_id'] = $user_data['user_id'];
				header("Location: index.php");
				die;
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="css/main.css">

</head>
<body>


	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input class="text" type="text" name="user_name"><br><br>
			<input class="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>