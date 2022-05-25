<?php
// Funktioner samt variabler tas från connection.php och login.php filerna
session_start();
include('connection.php');
include('login.php');

// variabler för att kunna koppla upp med databasen
$servername = "localhost";
$username = "root";
$password = "AntiDerivitive_42069!";
$database = "messaging_app";

//variabler som kommer skickas till databasen genom $messagesent 
$typingfield = $_POST["typingfield"];
$user_id = $_SESSION['user_id'];

// Skickar meddelandet till databasen
$messagesent = "INSERT INTO `messages` (messagesent, author_id) VALUES ('$typingfield', '$user_id')";

// Skapar kopplingen till en Mysql server
$conn = new mysqli($servername, $username, $password, $database);
// Kollar om man har kopplat till servern
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}  

// Kollar om meddelandet skickades, om den gjorde det så skickas man till index.php
if ($conn->query($messagesent) === TRUE) {
  echo "New messagesent created successfully";
  header("Location: index.php");
} else {
  echo "Error: " . $messagesent . "<br>" . $conn->error;
}

$conn->close();
?>
