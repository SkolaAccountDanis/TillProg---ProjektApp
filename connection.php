<?php
$db_servername = "localhost";
$db_username = "root";
$db_password = "AntiDerivitive_42069!";
$database = "messaging_app";


if(!$con = mysqli_connect($db_servername,$db_username,$db_password,$database))
{

	die("failed to connect!");
}



?>