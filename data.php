<?php
// variable för att kunna koppla med mysql servern
$servername = "localhost";
$username = "root";
$password = "AntiDerivitive_42069!";
$database = "messaging_app";

// Skapar array där värdena kommer placeras i för att sen skickas till app.js
$temparray = array();
// Tar värdena hos columnerna i databasen och sorterar kopplar de ihop med author_id och user_id, sorterar efter tiden meddelandet skickades.
$sqlselect = "SELECT messagesent, users.username FROM `messages` JOIN `users` ON (users.user_id=author_id) ORDER BY time_msg DESC";

// Skapar koppling med mysqli servern
$conn = new mysqli($servername, $username, $password, $database);

$result = $conn->query($sqlselect);
if ($result->num_rows > 0){
  while($row = $result->fetch_assoc())
  {
    array_push($temparray, $row); //Sparar datan i en array
  }
}
echo json_encode($temparray);

?>